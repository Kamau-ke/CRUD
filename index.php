<?php 
// WPUEGDHWJC6B9PPGXZH5E3KM --Recoverly
$pdo=new PDO('mysql:host=localhost; port=3306; dbname=jumia', 'root','');
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement=$pdo ->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <div class="container-fluid">

      <!--#################################### NAVIGATION BAR #####################-->

        <div class="row header-nav">
            
            <nav class="navbar navbar-expand-sm navbar-light ">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#" ><h4>W-shop</h4><span><i class="fas fa-shopping-cart fa-2x"></i></span></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <form class="d-flex me-5 ms-5" id="my-search">
                    <input class="form-control me-2" type="search" placeholder="Search products, brand and categories" aria-label="Search">
                    <button class="btn btn-warning" type="submit">Search</button>
                  </form>




                  <!-- drop down  -->
                  <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="fas fa-user fa-1x"></i></span> ACCOUNT
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown" style="width: 230px;">
                          <li><a class="btn btn-warning ms-4" href="signup.html" style="width: 150px;">SIGN IN</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-1x"></i> MY ACCOUNT</a></li>
                        </ul>
                      </li>


                      <li class="nav-item dropdown me-5 ms-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="fas fa-question fa-1x"></i></span> HELP
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                         
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>

                      <li class="nav-item dropdown me-5">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="fas fa-shopping-cart fa-1x"></i></span> CART
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>

                      
                    </ul>
                   
                  </div>


                  <!-- dropdown ends here   -->

                </div>
              </nav>

                                <!-- ############################# NAVIGATION BAR ##################### -->


        </div><!--end of row 1-->

        <div class="container">

        <div class="row middle-section">


             <!-- ############################# CAROUSEL ##################### -->

            <div class="col-12 image-section">
            
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./images/food.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/beer.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./images/tv.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          
          </div>
        </div>
        </div>

         <!-- ############################# CARD SECTION ##################### -->
    <div class="container">
        <div class="row cards">
          <div class="card-1">
            <div>
            <i class="fas fa-shopping-bag fa-2x" style="background-color: #6897bb; height: 50px;width: 50px; border-radius: 50%;"></i>
             <h4 style="padding-left: 5px; padding-top: 10px;">Official stores</h4>
            </div>
          </div>

          <div class="card-2">
            <div>
            <i class="fas fa-plane fa-2x  fa-rotate-270" style="background-color: #1471cd; height: 50px;width: 50px; border-radius: 50%;"></i>
             <h4 style="padding-left: 10px; padding-top: 10px;">W-shop Global</h4>
            </div>

          </div>

          <div class="card-3">
            <div>
            <i class="fas fa-utensils fa-2x" style="background-color: #e1bf14; height: 50px;width: 50px; border-radius: 50%;"></i>
             <h4 style="padding-left: 10px; padding-top: 10px;">W-shop Food</h4>
            </div>

          </div>

          <div class="card-4">

            <div>
              <i class="fas fa-mobile-alt fa-2x" style="background-color: #85ab03; height: 50px;width: 50px; border-radius: 50%;"></i>
               <h4 style="padding-left: 10px; padding-top: 10px;">Airtimes & Bills</h4>
              </div>
          </div>



        </div><!--end of row 3-->

    </div>




 <!-- ################################ ITEMS ON SALE ##################### -->
 
 <div class="container">
<div class="row">
  <div>
  <a href="create.php" class="btn btn-secondary mb-2">create new product</a>
  </div>
  <?php foreach ($products as $product): ?>
   
    <div class="card" style="width: 13rem; height: 280px; box-sizing:border-box; border-radius:opx">
  <img src="<?php echo $product['image'] ?>" class="card-img-top mt-2" alt="..." style="height: 100px; width:80px">
  
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['name'] ?></h5>
    <p class="card-text">Ksh: <?php echo $product['price'] ?></p>
    <p>
    <a href="update.php ?id=<?php echo $product['id']?>" class="btn btn-warning btn-sm">Edit</a>
    <form action="delete.php" method="POST">
      <input type="hidden" name="id"  value="<?php echo $product['id'] ?>">
      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
    </p>

  </div>
</div>

    
    
    <?php endforeach; ?>
  
</div>

</div>
        

     <!-- #################################### FOOTER ############################## -->

    <footer class="container-fluid mt-3">

<div class="row nav-area ">
  <div class="inner-nav container">

 
  <div class="jumia">

    <h4 style="display: inline; font-size: 30px; font-weight: bold;">W-shop</h4><span><i class="fas fa-shopping-cart fa-2x"></i></span>

  </div>

<div class="search-box">

  <h6>NEW TO W-shop?</h6>
  <p>Subscribe to our newsletter to get updates on our latest offers!</p>
  <form class="d-flex" id="my-search">
    <input class="form-control me-2"type="search" placeholder="Email us" aria-label="Search">
                    <button class="btn btn-outline-warning me-1" type="submit">MALE</button>
                    <button class="btn btn-outline-warning" type="submit">FEMALE</button>
                  </form>
</div>

<div class="download">

  <h6>download W-shop app</h6>
</div>

</div>
</div>
<div class="row content-area">

  <div class="help-you">
    <ul>
      <li><h5>LET US HELP YOU</h5></li>
      <li>Help Center</li>
      <li>How to shop on W-shop?</li>
      <li>Shipping and delivery</li>
      <li>Return Policy</li>
      <li>Corporate and Bulk Purchase</li>
      <li>COVID-19 Health Kit</li>
      <li>Advertise with W-shop</li>
      <li>W-shop Logistics Services</li>
      <li>Report a Product</li>
    </ul>
  </div>

  <div class="about-jumia">
    <ul>
      <li><h5>ABOUT W-shop</h5></li>
      <li>About us</li>
      <li>W-shop Careers</li>
      <li>W-shop Express</li>
      <li>Terms and Conditions</li>
      <li>Privacy & Cookie Notice</li>
      <li>W-shop Black Friday</li>
    </ul>
  </div>

  <div class="make-money">
    <ul>
      <li><h5>MAKE MONEY WITH W-shop</h5></li>
      <li>Sell on W-shop</li>
      <li>Become a Sales Consultant</li>
      <li>Become a Logistics Service Partner</li>
      <li>Jumia City Partner Program</li>
      <li>Order & Pick Up Point Application</li>
    </ul>
  </div>

  <div class="jumia-inter">
    <ul>
    <li><h5>W-shop INTERNATIONAL</h5></li>
    <li>Algeria</li>
    <li>Ivory Coast</li>
    <li>Egypt</li>
    <li>Ghana</li>
    <li>Morocco</li>
    <li>Nigeria</li>
    </ul>
  </div>

  <!-- responsive part -->
<div class="row res">
  <div class="make-money">
    <ul>
      <li><h5>MAKE MONEY WITH W-shop</h5></li>
      <li>Sell on W-shop</li>
      <li>Become a Sales Consultant</li>
      <li>Become a Logistics Service Partner</li>
      <li>W-shop City Partner Program</li>
      <li>Order & Pick Up Point Application</li>
    </ul>
  </div>

  <div class="W-shop-inter">
    <ul>
    <li><h5>W-shop INTERNATIONAL</h5></li>
    <li>Algeria</li>
    <li>Ivory Coast</li>
    <li>Egypt</li>
    <li>Ghana</li>
    <li>Morocco</li>
    <li>Nigeria</li>
    </ul>
  </div>

  </div>

</div>

    </footer>

   

    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
   
</html>
