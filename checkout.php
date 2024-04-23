<?php
    session_start();

    if(!empty($_SESSION['cart'])){

    }
    else{
      header('location: index.php');
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
            <a class="nav-link" href="contact.html">Contact Us</a>
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


    <!--Checkout-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="server/place_order.php" method="POST">
              <p class="text-center" style="color:red"><?php if(isset($_GET['message'])){echo $_GET['message'];} ?>
              <?php if(isset($_GET['message'])){ ?>
                  <a href="login.php"class="btn btn-primary">Login</a>
              <?php } ?>
              <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="checkout-name"  required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control"name="email" id="checkout-email"  required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="phone" id="checkout-password"  required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" name="city"id="checkout-city"  required>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="checkout-address"  required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: Rs <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" name="place_order" class="btn" id="checkout-btn" value="place_order">
                </div>
            </form>
        </div>
    </section>

  <!--Footer-->
  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <img class="logo"src="assets/imgs/logo.png" />
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
          <img src="assets/imgs/footer1.png" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/imgs/footer2.jpg" class="img-fluid w-25 h-100 m-2"/>
          <img src="assets/imgs/footer3.png" class="img-fluid w-25 h-100 m-2"/>
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

</body>

</html>