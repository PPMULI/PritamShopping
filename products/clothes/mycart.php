<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>
<?php
  include "_nav.php";

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
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody class = "text-center">
 
    <?php
   // $total = 0;
    if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $key => $value)
      {
        $sr = $key + 1;
       //  $total = $total + $value['price'] ;

        echo "<tr>
        <td>$sr</td>
        <td>$value[Item_Name]</td> 
        <td>$value[price] <input type='hidden' class='iprice' value ='$value[price]'></td>
        <td >
        <form action = 'manage_cart.php' method = 'POST'>
          <input type = 'number' class = 'iquantity' value = '$value[Quantity]' name = 'mod_quantity' onchange = 'subTotal()' min = '1' max = '10'>
          <input type = 'hidden' name = 'Item_Name' value = '$value[Item_Name]'>
        </form>
          </td>
        <td class = 'itotal'></td>
        <td>
        <form action = 'manage_cart.php' method = 'POST'>
        <button name = 'Remove_Item' class = 'btn btn-outline-danger'>Remove</button>
        <input type = 'hidden' name = 'Item_Name' value = '$value[Item_Name]'>
        </form>
        </td>
        </tr>";
      }
    }
    ?>
  <div class="col-lg-4">
    <div class="container">
      <h2>Grand Total</h2>
      <div class="jumbotron">
        <h5 class = "text-right" id="gtotal"> <?php echo $total; ?> </h5>
      </div>
    </div>
    <br>
    <br>
    <?php
    if(isset($_SESSION['cart']) && count(($_SESSION['cart'])) > 0)
    {
    ?>
    <form action = "purchaseProduct.php" method="POST">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control" require id="fullname" name = "fullname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" require id="address" name = "address">
        </div>
        <div class="mb-3">
          <label for="mobilenumber" class="form-label">Mobile Number</label>
          <input type="text" class="form-control" require id="mobilenumber" name = "mobilenumber">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymode" id="paymode" value="COD" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Cash on delivery
          </label>
        </div>
        <button class = "btn btn-primary btn-block" name="purchase">Make purchase</button>
    </form>
    <?php
    }
    ?>
  </div>
  </div>
  </tbody>
</table>
            </div>
        </div>
        
        <script>
          //var iprice = document.gerElementByClassName('iprice');
          var iprice = document.getElementsByClassName('iprice');
          var iquantity = document.getElementsByClassName('iquantity');
          var itotal = document.getElementsByClassName('itotal');
          var gt = 0;
          var gtotal = document.getElementById('gtotal');
          console.log(iprice);

          function subTotal()
          {gt = 0;
            for(i=0; i<iprice.length; i++)
            {
              gt = gt + (iprice[i].value)*(iquantity[i].value);
              itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
             
            }
            gtotal.innerText = gt;
            console.log(gt);
          }

          subTotal();
        </script>
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