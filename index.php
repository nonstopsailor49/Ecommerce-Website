<?php include('layouts/header.php');?>

  <!--Home-->
  <section id="home">
    <div class="container">
      <h5>NEW ARRIVALS</h5>
      <h1><span style="color: blue;">Best Deals</span> This week</h1>
      <p>"Empower Your Life, Explore Gadgets Galore with Gadgetsgrove!"</p>
      <button><a href="shop.php">Shop Now </a></button>
    </div>
  </section>


  <!--Brands-->
  <section id="brand" class="container">
    <div class="row">
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.png" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.png" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg" />
    </div>
  </section>

  <!--New-->
  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/1.jpg" />
        <div class="details">
          <h2>Gaming Desktops</h2>
          <button class="text-uppercase"><a href="shop.php">Shop Now </a></button>
        </div>
      </div>



      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/2.jpg" />
        <div class="details">
          <h2>Gaming Laptops</h2>
          <button class="text-uppercase"><a href="shop.php">Shop Now </a></button>
        </div>
      </div>

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/3.jpg" />
        <div class="details">
          <h2>Gaming Accessories</h2>
          <button class="text-uppercase"> <a href="shop.php">Shop Now </a></button>
        </div>
      </div>
    </div>
  </section>

  <!--Featured-->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Value For Money</h3>
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
    </div>
  </section>

  <!--Banner-->
  <section id="banner" class="my-5 py-5">
    <div class="container">
      <h4>New Year Deals</h4>
      <h1>By Brands <br> Upto 40% Off</h1>
      <button class="text-uppercase"><a href="shop.php">Buy Now </a></button>
    </div>
  </section>

  <?php include('layouts/footer.php');?>