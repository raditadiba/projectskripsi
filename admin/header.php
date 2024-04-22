<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include('../server/connection.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img{
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media(min-width: 768px){
            .bd-placeholder-img-lg{
                font-size: 3.5rem;
            }
        }
    </style>

  </head>
  <body>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Deden Siswanto</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <?php if(isset($_SESSION['admin_logged_in'])){ ?>
                <a class="nav-link px-3" href="logout.php?logout=1">Sign Out</a>
                <?php } ?>
            </div>
        </div>
    </header>