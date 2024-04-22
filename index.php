<?php include('layouts/header.php'); ?>

      <!--Halaman Home-->
      <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Collection's</span> <br>Deden Siswanto</h1>
            <a href="shop.php"><button><i class="fa-solid fa-bag-shopping"></i > Shopping Now </button></a>
        </div>
      </section>

      <!-- Brand -->
<section id="brand" class="container">
        <div class="row">
            <hr>
            <img class="img-fluid col-lg-3 col-md-3 col-sm-12" src="assets/img/logo2.png">
            <img class="img-fluid col-lg-3 col-md-3 col-sm-12" src="assets/img/mymd.png">
            <img class="img-fluid col-lg-3 col-md-3 col-sm-12" src="assets/img/mymd.png">
            <img class="img-fluid col-lg-3 col-md-4 col-sm-13" src="assets/img/logo2.png">        
            <hr>
        </div>
</section>

        <!-- Featured -->
        <section id="featured" class="my-5 pb-5">
         <div class="container text-center mt-5 py-5">
            <h3>NEW PRODUCT</h3>
            <hr>
            <p>MYMD Collection's</p>
         </div>

         <div class="row mx-auto container">
            <?php include('server/get_featured_products.php');  ?>

            <?php while($row= $featured_products->fetch_assoc()){ ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 container" src="assets/img/<?php echo $row['product_image']; ?>">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">Rp. <?php echo $row['product_price']; ?></h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Beli Sekarang</button></a>
            </div>

            <?php } ?>
         </div>
        </section>
        
        <!-- Collection 2-->
        <section id="featured" class="my-5 pb-5">
            <div class="container text-center mt-5 py-5">
               <h3>BEST SELLER</h3>
               <hr>
               <p>MYMD Collection's</p>
            </div>
            <div class="row mx-auto container">
                <?php  include('server/get_coats.php') ?>

                <?php while($row=$coats_products->fetch_assoc()){ ?>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>">
                   <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                   <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">Rp. <?php echo $row['product_price']; ?></h4>
                   <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Beli Sekarang</button></a>
               </div>
               <?php } ?>
            </div>
           </section>

        <!--Banner Sale-->
        <section id="banner" class="my-5 py-5">
            <div class="container">
                <h4>NEW YEAR SALE <i class="fa-solid fa-bell"></i></h4>
                <h1>DISCOUNT <i class="fa-solid fa-tag"></i><br> <span>UP TO 50% OFF</h1>
                <a href="shop.php"><button class="text-uppercase">Belanja Sekarang</button></a>
            </div> 
        </section>
        
        <!-- Cloth section-->
        <section id="featured" class="my-5">
            <div class="container text-center mt-5 py-5">
               <h3>KARYA KREATIF INDONESIA 2023</h3>
               <hr>
               <p>DEDEN SISWANTO X TAMA MULTI SANDANG</p>
            </div>
            <div class="row mx-auto container-fluid">
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model1.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model2.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model7.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model5.jpg">
               </div>
            </div>
           </section>

           <!-- Cloth Section 2-->
           <section id="featured" class="my-5">
            <div class="container text-center mt-5 py-5">
               <h3>JAKARTA FASHION WEEK</h3>
               <hr>
               <p>DEDEN SISWANTO - KAGIRINAKU INDONESIA </p>
            </div>
            <div class="row mx-auto container-fluid">
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model12.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model13.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model14.jpg">
               </div>
               <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                   <img class="img-fluid mb-3" src="assets/img/model15.jpg">
               </div>
                </div>
            </section>
           </section>

           
<?php include('layouts/footer.php'); ?>