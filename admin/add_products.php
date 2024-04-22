
<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>

            <h2>Create Product</h2>
            <div class="table-responsive">
            
            <div class="mx-auto container">
                <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php" >
                    <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>
                    <div class="form-group mt-2">
                        <label>Title</label>
                        <input type="text" class="form-control" name="name" id="product-name"  placeholder="Product Title">
                    </div>
                    <div class="form-group mt-2">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="product-desc"  placeholder="Product Description">
                    </div>
                    <div class="form-group mt-2">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" id="product-price"  placeholder="Product Price">
                    </div>
                    <div class="form-group mt-2">
                        <label>Special Offer/Sale</label>
                        <input type="number" class="form-control"  name="offer" id="product-offer" placeholder="Discount%">
                    </div>
                    <div class="form-group mt-2">
                        <label>Category</label>
                        <select class="form-select" required name="category">
                            <option value="set">Set</option>
                            <option value="best">Best</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Color</label>
                        <input type="text" class="form-control"  name="color" id="product-color" placeholder="Product Color">
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control"  name="image1" id="image1" placeholder="Image 1">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="create_product" value="Create">
                    </div>
                </form>
            </div>
            </div>
        </main>
    </div>
</div>