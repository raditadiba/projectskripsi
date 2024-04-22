<?php include('layouts/header.php');  ?>

<?php


if(isset($_POST['order_pay_btn']) ){
 $order_status =  $_POST['order_status'];
 $order_total_price =  $_POST['order_total_price'];
}




?>


      <!--Payment-->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container text-center">

    <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
      <?php $amount = strval( $_POST['order_total_price']); ?>
      <?php $order_id = $_POST['order_id']; ?>
      <p>Total payment: Rp. <?php echo $_POST['order_total_price']; ?></p>
      <div class="d-flex justify-content-center">
      <button id="pay-button">Pay!</button>

    <?php }else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
      <?php $amount = strval( $_SESSION['total']); ?>
      <?php $order_id = $_SESSION['order_id']; ?>
      <p>Total payment: Rp. <?php echo $_SESSION['total']; ?></p>
      <div class="d-flex justify-content-center">
      <button id="pay-button">Pay!</button>
    </div>
    
  
    
    </div>
   <?php } else{ ?>
    <p>You don't have an order</p>
    <?php } ?>


    </div>
  </section>
  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
      // Also, use the embedId that you defined in the div above, here.
      window.snap.embed('YOUR_SNAP_TOKEN', {
        embedId: 'snap-container'
      });
    });
  </script>
  
<?php include('layouts/footer.php');  ?>