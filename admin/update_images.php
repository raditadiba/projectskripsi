<?php

include('../server/connection.php');

if(isset($_POST['update_images'])){

    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];

    $image1 = $_FILES['image1']['tmp_name'];

    $image_name1 = basename($_FILES['image1']['name']);
    $image_extension1 = strtolower(pathinfo($image_name1, PATHINFO_EXTENSION));

    move_uploaded_file($image1, "../assets/img/" . $product_name . '1.' . $image_extension1);

    $stmt = $conn->prepare("UPDATE products SET  product_image=? WHERE product_id=?");

    $stmt->bind_param('si', $image_name1, $product_id);

    if($stmt->execute()){
        header('location: products.php?images_updated=Images has been updated successfully');
    }else{
        header('location: products.php?images_failed=Error occured, please try again');
    }
    $stmt->close();
}

?>