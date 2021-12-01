<?php 
$pdo=new PDO('mysql:host=localhost; port=3306; dbname=jumia', 'root','');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$errors=[];
$name='';
$price='';
$category='';


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
  $imagepath='';
  $image=$_FILES['image'] ?? null;
  if($image && $image['tmp_name']){

    $imagepath='images/'.randomString(8).'/'.$image['name'];
    mkdir(dirname($imagepath));
    move_uploaded_file($image['tmp_name'], $imagepath);
  }
$statement=$pdo ->prepare("INSERT INTO products (image,name, price, create_date,category)
 VALUES (:image, :name, :price, :date,:category)"); 
 $statement ->bindValue(':image', $imagepath);
 $statement ->bindValue(':name', $name);
 $statement ->bindValue(':price', $price);
 $statement->bindValue(':date',$date);
 $statement->bindValue(':category',$category);

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
    <link rel="stylesheet" href="createstyle.css">
    <title>Document</title>
</head>
<body>
<?php if(!empty($errors)) : ?>
<div class="container alert alert-danger">
    <?php foreach ($errors as $error): ?>
      <div><?php echo $error ?></div>
      <?php endforeach ?>
    
  </div>
  <?php endif ?>
<form action="" method="POST" class="container mt-5" enctype="multipart/form-data"> 
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