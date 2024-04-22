<?php

include('../server/connection.php');

if(isset($_POST['create_product'])){

    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_color = $_POST['color'];

    $image1 = $_FILES['image1']['tmp_name'];
    //$file_name = $_FILES['image1']['name'];

    $image_name1 = $_FILES['image1']['name'];

    move_uploaded_file($image1, "assets/img/". $image_name1);

    $stmt = $conn->prepare("INSERT INTO products  (product_name, product_description, product_price,
                            product_special_offer, product_image, product_category, product_color)
                            VALUES (?,?,?,?,?,?,?)");

    $stmt->bind_param('sssssss', $product_name,$product_description,$product_price,$product_special_offer,
                        $image_name1, $product_category, $product_color);

    if($stmt->execute()){
        header('location: products.php?product_created=Product has been created successfully');
    }else{
        header('location: products.php?product_failed=Error occured, please try again');
    }
}

?>