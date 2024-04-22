<?php include('layouts/header.php'); ?>

<?php


    if(isset($_POST['add_to_cart'])){

        //if user has already added a product to cart
        if(isset($_SESSION['cart'])){

            $products_array_ids = array_column($_SESSION['cart'], "product_id");//[2,3,4 dll]
           //if product has already been added to cart or not
            if(!in_array($_POST['product_id'], $products_array_ids) ){

                $product_id = $_POST['product_id'];
    
                $product_array = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_image' => $_POST['product_image'],
                    'product_quantity' => $_POST['product_quantity']
                );
    
                $_SESSION['cart'][$product_id] = $product_array;
                
            //product has already been added    
            }else{
                echo '<script>alert("Product was already to cart");</script>';
            }

        //if this is the first product    
        }else{

            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            );

            $_SESSION['cart'][$product_id] = $product_array;
            //[ 2=>[], 3=>[], 5=>[] ]

        }

        //calculate total
        calculateTotalCart();

    //remove product from cart
    }else if(isset($_POST['remove_product'])){
        
        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);

        //calculatetotal
        calculateTotalCart();
    
}else if(isset($_POST['edit_quantity'])){

    //we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    //get the prodcut array from the session
    $product_array = $_SESSION['cart'][$product_id];

    //update product quantity
    $product_array['product_quantity'] = $product_quantity;

    //return array back its place
    $_SESSION['cart'][$product_id] = $product_array;

    //calculatetotal
    calculateTotalCart();

}else{
        //header('location: index.php');
    }

    function calculateTotalCart(){

        $total_price = 0;
        $total_quantity = 0;

        foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];

            $price = intval(str_replace('.', '', $value['product_price']));
            $quantity = $value['product_quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity +$quantity;
        }

        $_SESSION['total'] = $total_price;
        $_SESSION['quantity'] = $total_quantity;

    }

?>



    <!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
    </div>
    <table class="mt-5 pt-5">
        <tr>
           <th>Product</th> 
           <th>Quantity</th> 
           <th>Subtotal</th> 
        </tr>

        <?php if(isset($_SESSION['cart'])){ ?>

        <?php 
        $subtotal = 0;
        foreach($_SESSION['cart'] as $key => $value) { 
            
            $price = (int)str_replace('.', '', $value['product_price']);
            $subtotal += $value['product_quantity'] * $price;

            ?>

        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/img/<?php echo $value['product_image']; ?>">
                    <div>
                        <p><?php echo $value['product_name']; ?></p>
                        <small><span>Rp.</span><?php echo $value['product_price']; ?></small>
                        <br>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                        <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                        </form>
                    </div>
                </div>
            </td>
            <td>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">    
                    <input type="submit" class="edit-btn" value="edit" name="edit_quantity" />
                </form>
            </td>
            <td>
                <span>Rp.</span>
                <span class="product-price">
                <?php 
                $price = intval(str_replace('.', '', $value['product_price']));
                $total_price = $value['product_quantity'] * $price;
                echo ' ' . number_format($total_price, 0, ',', '.');
                ?></span>

            </td>
        </tr>

            <?php } ?>

            <?php } ?>

             <!-- After listing items, display the subtotal -->
             <?php
$subtotal = 0; // initialize the subtotal variable
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key => $value) { 
        $price = (int)str_replace('.', '', $value['product_price']);
        $subtotal += $value['product_quantity'] * $price;
        ?>
        <!-- your table rows here -->
    <?php }
}
?>

<!-- After listing items, display the subtotal -->
<tr>
    <td colspan="2" align="right">Subtotal</td>
    <td><span>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></span></td>
</tr>

    </table>

    <div class="checkout-container">
        <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
    </div>
</section>



  <?php include('layouts/footer.php');  ?>