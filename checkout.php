<?php include('layouts/header.php'); ?>

<?php


if(!empty($_SESSION['cart']) ){

}else{
  header('location: index.php');
}

?>


      <!--Checkout-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-wheight-bold">Check Out</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">
            <p class="text-center" style="color: red;">
            <?php if(isset($_GET['message'])){echo $_GET['message']; } ?>
            <?php if(isset($_GET['message'])) { ?>

                <a href="login.php" class="btn btn-primay">Login</a>

                <?php } ?>

            </p>
            <div class="form-group checkout-small-element">
                <label>Username</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Masukkan username anda">
            </div>
            <div class="form-group checkout-small-element">
                <label>Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Masukkan email anda">
            </div>
            <div class="form-group checkout-small-element">
                <label>Phone</label>
                <input type="password" class="form-control" id="checkout-phone" name="phone" placeholder="Masukkan no handphone anda">
            </div>
            <div class="form-group checkout-small-element">
                <label>Kota</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Masukkan nama kota anda">
            </div>
            <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Masukkan alamat anda">
            </div>
            <div class="form-group checkout-btn-container">
                <p>Total Jumlah: Rp. <?php echo $_SESSION['total']; ?></p>
                <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
            </div>
        </form>
    </div>
  </section>


<?php  include('layouts/footer.php');   ?>