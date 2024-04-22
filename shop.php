<?php include('layouts/header.php'); ?>

<?php

include('server/connection.php');

//use the search section
if(isset($_POST['search'])){

    //determine page no
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        //if user has already entered page then page number is the one that they selected
        $page_no = $_GET['page_no'];
    }else{
        //if user just entered the page then default page is 1
        $page_no = 1;
    }

    $category = $_POST['category'];
    $price = $_POST['price'];

    //return number of products 
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price <=? ");
    $stmt1->bind_param('si', $category, $price);
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no +1;

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

      //get all products

      $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
      $stmt2->bind_param('si', $category,$price);
      $stmt2->execute();
      $products = $stmt2->get_result();


//return all product    
}else{

    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        //if user has already enter page then page number is the one that the selected
        $page_no = $_GET['page_no'];

    }else{
        //if user just entered the page the default page is 1
        $page_no = 1;
    }

    //return number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    //product per page
    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no +1;

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //get all products

    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();


}
 
?>




       <!-- Shop -->
       <section id="featured" class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
           <h3>OUR PRODUCT</h3>
           <hr>
           <p>Deden Siswanto - Mymd Collection's </p>
        </div>
        <div class="row mx-auto container">

        <?php while($row = $products->fetch_assoc()) { ?>
           <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
               <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">Beli Sekarang</a>
           </div>

           <?php } ?>


                            <nav aria-label="Page navigation example" class="mx-auto">
                                <ul class="pagination mt-5 mx-auto">
                                    <li class="page-item <?php if($page_no <=1){echo 'disabled';} ?>">
                                        <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
                                    </li>

                                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                                    <?php if($page_no >=3) { ?>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no ?></a></li>
                                    <?php } ?>

                                    <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';} ?>">
                                    <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else{echo "?page_no=".($page_no+1);} ?>">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            
        </div>
       </section>


<?php include('layouts/footer.php'); ?>