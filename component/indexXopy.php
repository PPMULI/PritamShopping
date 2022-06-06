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
        
        <title>Hello, world!</title>
    </head>
    <body>
        <?php
        include "component/_nav.php";
        ?>
        <?php
    //    print_r($_SESSION['cart']);
        ?>
        <h1>Hello, world!  scccess</h1>
        
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/Photo/clothes.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Nature</h5>
                  <p class="card-text">Rs. 450</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <input type = "hidden" name = "Item_Name" value = "nature"> 
                  <input type = "hidden" name = "price" value = "450"> 
                </div>
                
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/uploadnature.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Nature</h5>
                  <p class="card-text">Rs. 45000</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <input type = "hidden" name = "Item_Name" value = "nature3"> 
                  <input type = "hidden" name = "price" value = "45000"> 
                </div>
                
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/uploadnature.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Nature</h5>
                  <p class="card-text">Rs. 45</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <input type = "hidden" name = "Item_Name" value = "nature2"> 
                  <input type = "hidden" name = "price" value = "45"> 
                </div>
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/PRITAM/uploadnature.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">Nature</h5>
                  <p class="card-text">Rs. 4500</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <input type = "hidden" name = "Item_Name" value = "nature 1"> 
                  <input type = "hidden" name = "price" value = "4500"> 
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