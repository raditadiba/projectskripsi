<?php include('header.php'); ?>

<?php


include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");
  $stmt->bind_param('ss', $email, $password);

  if($stmt->execute()){
    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
    $stmt->store_result();

    if($stmt->num_rows() == 1){
      $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: index.php?login_success= logged in successfully');
    
    }else{
      header('location: login.php?error=could not verify your account');
    }
  }else{
    header('location: login.php?error=something went wrong');
  }
}



?>

   

    <div class="container-fluid">
        <div class="" style="min-height: 1000px">
            <main class="col-md-6 mx-auto col-lg-6 px-md-4 text-center">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2"></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">

                        </div>
                    </div>
                </div>

                <h2>Login</h2>
                <div class="mx-auto container">
                <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
                    <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" class="form-control" id="product-name" name="email" placeholder="Masukkan email admin">
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control" id="product-desc" name="password" placeholder="Masukkan password admin">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="login_btn" value="Login" class="btn btn-primary">       
                        <a class="nav-link" href="../index.php">Back to Home</a>
                    </div>
                </form>
    </div>
            </main>
        </div>
    </div>

   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>