<?php 
  session_start();
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
            <a href="cart.php"><i class="fas fa-shopping-cart">
              <?php if(isset($_SESSION['quantity'])&&($_SESSION['quantity'] !=0)) { ?>
                  <span class="cart-quantity"><?php echo $_SESSION['quantity'];  ?></span>
              <?php } ?>
            </i></a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

