<?php 
$pdo=new PDO('mysql:host=localhost; port=3306; dbname=jumia', 'root','');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id=$_GET['id'] ?? null;
if(!$id){
    header('Loation: index.php');
    exit;
}
$statement=$pdo->prepare('SELECT * FROM products WHERE id=:id');
$statement->bindValue(':id',$id);
$statement->execute();
$product=$statement->fetch(PDO::FETCH_ASSOC);

$errors=[];
$name=$product['name'];
$price=$product['price'];
$category=$product['category'];


if($_SERVER['REQUEST_METHOD']==='POST'){

$name=$_POST['name'];
$price=$_POST['price'];
$category=$_POST['category'];
$date=date('Y-m-d H:i:s');

if(!$name){

  $errors[]='product name is required';
}
if(!$category){

  $errors[]='category name is required';
}
if(!$price){

  $errors[]='product price is required';
}
if(!is_dir('images')){
  mkdir('images');
}

if(empty($errors)){
  $imagepath=$product['image'];

 
  $image=$_FILES['image'] ?? null;
  if($image && $image['tmp_name']){

    if($product['image']){
      unlink($product['image']);
    }
    $imagepath='images/'.randomString(8).'/'.$image['name'];
    mkdir(dirname($imagepath));
    move_uploaded_file($image['tmp_name'], $imagepath);
  }
$statement=$pdo->prepare("UPDATE products  SET image=:image,name=:name,price=:price,category=:category WHERE id=:id"); 
 $statement ->bindValue(':image', $imagepath);
 $statement ->bindValue(':name', $name);
 $statement ->bindValue(':price', $price);
 $statement->bindValue(':category',$category);
 $statement->bindValue(':id',$id);
 $statement ->execute();
 header('Location:index.php');
}
}

function randomString($n){
  $characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str='';
  for($i=0;$i<$n;$i++){
    $index=rand(0,strlen($characters)-1);
    $str .=$characters[$index];
  }
  return $str;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="update-style.css">
    <title>Document</title>
</head>
<body>
  <h1 style="padding-left: 100px;">Update <b><?php echo $product['name'] ?></b> </h1>
<?php if(!empty($errors)) : ?>
<div class="container alert alert-danger">
    <?php foreach ($errors as $error): ?>
      <div><?php echo $error ?></div>
      <?php endforeach ?>
    
  </div>
  <?php endif ?>
  <a href="index.php" class="btn btn-warning mt-3 ms-5 mb-3">Back to main page</a>
<form action="" method="POST" class="container mt-5" enctype="multipart/form-data"> 

  <?php if($product['image']): ?>
    <img src="<?php echo $product['image'] ?>"style="width:150px">
    <?php endif; ?>
<div class="mb-3">
    <label class="form-label">product image</label>
    <br>
    <input type="file" name="image"> 
    
  </div>
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    
  </div>

  <div class="mb-3">
    <label class="form-label">Category</label>
    <input type="text" class="form-control" name="category" value="<?php echo $category ?>">
    
  </div>

  <div class="mb-3">
    <label class="form-label">Price</label>
    <input type="number"  step='0.01' class="form-control" name="price" value="<?php echo $price ?>">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
