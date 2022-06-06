<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel = "stylesheet" href = "/pritam/index2.css">
        <title>Hello, world!</title>
    </head>
    <body>
        <?php
        include "_nav.php";
        ?>
        <h1>Hello, world!  scccess</h1>
        
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/FullShirtPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/full-shirt.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Full-shirt</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/Half-shirtsPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/Half-shirts.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Half Shirts</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/T-shirtsPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/t-shirts.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">T-shirts</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/Womens_JeansPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/Womens_Jeans.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Womens Jeans</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>
            
            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/womesns_T-shirtsPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/womesns_T-shirts.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">womesns_T-shirts</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "/PRITAM/products/clothes/NightPantsPurchase.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/products/clothesPhoto/NightPantss.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">NightPants</h5>
                  <button type = "submit" name = "details" class = "btn btn-info">Details</button>
                  <input type = "hidden" name = "details" value = "nature">  
                </div>
              </div>
              </form>
            </div>

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
    <script src="js/sweetalert.min.js"></script>
  </body>
</html>