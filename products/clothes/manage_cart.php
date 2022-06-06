<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
       
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if(in_array($_POST['Item_Name'], $myitems)){
                echo '<div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <p>Item already added</p>
                <hr>';
              //  header("location: index.php");
            }
            else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('Item_Name' => $_POST['Item_Name'], 'price'=> $_POST['price'], 'Quantity' =>1);
            echo '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Alert</h4>
            <p>Item added successfully.</p>
            <hr>';
            }
        }
        else
        {
            $_SESSION['cart'][0] = array('Item_Name' => $_POST['Item_Name'], 'price' => $_POST['price'], 'Quantity' => 1);
            echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <p>Item added successfully.</p>
                <hr>';
            
        }
    }
    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key => $value)
        { 
            if($value['Item_Name'] == $_POST['Item_Name'])
            {
               
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo 'Success';
            }
        }
    }

    if(isset($_POST['mod_quantity']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        { 
            if($value['Item_Name'] == $_POST['Item_Name'])
            {
               
                $_SESSION['cart'][$key]['Quantity'] = $_POST['mod_quantity'];
                echo $_SESSION['cart'][$key]['Quantity'];
                echo "<br>";
               echo $_POST['mod_quantity'];
               echo '<script>
                        window.location.href = "mycart.php";
                </script>';
            }
        }
    }
   
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
        include "_nav.php";
        ?>
     <!--   <h1>Hello, world!  scccess</h1>-->
        
      
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