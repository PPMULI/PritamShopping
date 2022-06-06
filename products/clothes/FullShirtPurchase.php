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
        <style>
            img{
                height: 400px;
                width : 100px;
            }
        </style>
    </head>
    <body>
        <?php
        include "_nav.php";
        echo $_SESSION['fullname'];
        ?>
        <?php
    //    print_r($_SESSION['cart']);
        ?>
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/Pritam/products/clothesPhoto/fullShirt/ChexShgirt.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">ChexShirt</h5>
                  <p class="card-text">Rs. 450</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <!--<button type = "submit" name = "Add_To_favourite" class = "btn btn-info">Add to Favourite</button> -->
                  <input type = "hidden" name = "Item_Name" value = "ChexShirt"> 
                  <input type = "hidden" name = "price" value = "450">
                  <form action = "favourite_cart.php" method = "POSt">
                  <button type = "submit" name = "Add_To_favourite" class = "btn btn-info">Add to Favourite</button>                    
                  </form> 
                </div>
                
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/Pritam/products/clothesPhoto/fullShirt/formalShirt.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">formalShgirt</h5>
                  <p class="card-text">Rs. 500</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <button type = "submit" name = "Add_To_favourite" class = "btn btn-info">Add to Favourite</button>
                  <input type = "hidden" name = "Item_Name" value = "formalShirt"> 
                  <input type = "hidden" name = "price" value = "500"> 
                </div>
                
              </div>
              </form>
            </div>

            <div class="col-lg-4">
              <form action = "manage_cart.php" method = "POST">
              <div class="card">
                <img src="/Pritam/products/clothesPhoto/fullShirt/formalShirt2.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <h5 class="card-title">formalShirt2</h5>
                  <p class="card-text">Rs. 600</p>
                  <button type = "submit" name = "Add_To_Cart" class = "btn btn-info">Add to cart</button>
                  <input type = "hidden" name = "Item_Name" value = "formalShirt2"> 
                  <input type = "hidden" name = "price" value = "600"> 
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