<?php

include('server/connection.php');
if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  $stmt = $conn->prepare("SELECT * FROM products where product_id=? ");
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
    
    $product = $stmt->get_result();
}
else{
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top">
    <div class="container">
      <img class="logo" src="assets/imgs/logo.png" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="account.php"><i class="fas fa-user"></i></a>
          </li>
          <li class="nav-item">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <!--Single Product-->
  <section class="container single-product my-5 pt-5">
    <div class="row mt-5">
      <?php while($row =$product->fetch_assoc()){ ?>
        
          <div class="col-lg-5 col-md-6 col-sm-12">
        <img class="img-fluid w-100 pb-1" id="mainImg" src="assets/imgs/<?php echo $row['product_image']; ?>">
        <div class="small-image-group">
          <div class="small-image-col">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-image">
          </div>
          <div class="small-image-col">
            <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-image">
          </div>
          <div class="small-image-col">
            <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-image">
          </div>
          <div class="small-image-col">
            <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-image">
          </div>
        </div>
      </div>
     
      <div class="col-lg-6 col-md-12 col-sm-12">
        <br>
        <br>
        <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
        <h2><?php echo $row['product_price']; ?></h2>

        <form method="POST" action="cart.php">
          <input type="hidden" name="product_id" Value="<?php echo $row['product_id']; ?>"/>
          <input type="hidden" name="product_image" Value="<?php echo $row['product_image']; ?>"/>
          <input type="hidden" name="product_name" Value="<?php echo $row['product_name']; ?>"/>
          <input type="hidden" name="product_price" Value="<?php echo $row['product_price']; ?>"/>
          <input type="number" name="product_quantity" value="1">
          <button class="buy-btn" type="submit" name="add_to_cart">Add to Cart</button>
      </form>

        
        <h4 class="mt-5 mb-5">Product Details</h4>
        <span>
        <?php echo $row['product_description']; ?>
        </span>
      </div>

    
      <?php } ?>
    </div>
  </section>

  <!--Related Products-->
  <section id="realted-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Similiar Products</h3>
      <hr>
    </div>
    <div class="row mx-auto container-fluid">

<?php include'server/get_featured_products.php'; ?>
  
<?php while($row= $featured_products->fetch_assoc()){  ?>
  <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" />
    <div class="star">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
    </div>
    <h5 class="p-name"> <?php echo $row['product_name'];?></h5>
    <h4 class="p-price">Rs.<?php echo $row['product_price'];?></h4>
    <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
  </div>
  <?php } ?>
  </section>





  <!--Footer-->
  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo" src="assets/imgs/logo.png" />
        <p class="pt-3"> We Provide the best products for most affordable prices.</p>
      </div>

      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Best Laptops </h5>
        <ul class="" text-uppercase>
          <li><a href="#">Under Rs.60,000</a></li>
          <li><a href="#">Under Rs.80,000</a></li>
          <li><a href="#">Under Rs.1,00,000</a></li>
          <li><a href="#">Under Rs.1,50,000</a></li>
          <li><a href="#">Under Rs.2,00,000</a></li>
        </ul>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Contact Us</h5>
        <div>
          <h6 class="text-uppercase">
            Address
          </h6>
          <p>Patitar,Boudha-06,Kathmandu</p>
        </div>
        <div>
          <h6 class="text-uppercase">
            Phone
          </h6>
          <p>01-23456789,986412370</p>
        </div>
        <div>
          <h6 class="text-uppercase">
            Email
          </h6>
          <p>gadgetsgrove007@gmail.com</p>
        </div>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">We Accept</h5>
        <div class="row">
          <img src="assets/imgs/footer1.png" class="img-fluid w-25 h-100 m-2" />
          <img src="assets/imgs/footer2.jpg" class="img-fluid w-25 h-100 m-2" />
          <img src="assets/imgs/footer3.png" class="img-fluid w-25 h-100 m-2" />
        </div>
      </div>
    </div>

    <div class="copyright mt-5">
      <div class="row container mx-auto">
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
          <p style="text-align: center;"> eCommerce @2024 All Rights Reserved!</p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>

    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-image");

    for (let i = 0; i < 4; i++) {
      smallImg[i].onclick = function () {
        mainImg.src = smallImg[i].src;
      }
    }

  </script>

</body>

</html>