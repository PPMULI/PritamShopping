<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>
<?php
  include "component/_nav.php";

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
        
        <div class="container">
          <div class="row">
            <div class="col-lg-12"><h1>Cart</h1> </div>

            <div class="div-lg-8">
            <table class="table table-striped table-hover">
      <thead class = "text-center">
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Items Name</th>
      <th scope="col">Items Price</th>
      <th scope="col">Quality</th>
    </tr>
  </thead>
  <tbody class = "text-center">
    <?php
    $total = 0;
    if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $key => $value)
      {
        $sr = $key + 1;
        $total = $total + $value['price'];
        echo "<tr>
        <td>$sr</td>
        <td>$value[Item_Name]</td> 
        <td>$value[price]</td>
        <td><input type = 'number' value = '$value[Quantity]' min = '1' max = '10'></td>

        <td>
        <form action = 'manage_cart.php' method = 'POST'>
        <button name = 'Remove_Item' class = 'btn btn-outline-danger'>Remove</button>
        <input type = 'hidden' name = 'Item_Name' value = '$value[Item_Name]'>
        </form>
        </td>
        </tr>";
 
      }
      echo $total;
    }
    ?>
  <div class="col-lg-4">
    <h2>Total</h2>
    <br>
    <h5 class = "text-right"> <?php echo $total; ?> </h5>
    <br>
    <form>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Cash on delivery
          </label>
        </div>
        <button class = "btn btn-primary btn-block">Make purchase</button>
    </form>
  </div>
  </div>
  </tbody>
</table>
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