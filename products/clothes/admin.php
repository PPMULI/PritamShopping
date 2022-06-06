<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password  = "";
$database = "school";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
  die(mysqli_connect_error());
  echo "fail";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="container mt-4">
        <div class="col-lg-12">
            <table class="table table-striped table-hover">
                <?php
                 $servername = "localhost";
                 $username = "root";
                 $password  = "";
                 $database = "school";
               
                 $conn = mysqli_connect($servername, $username, $password, $database);
                ?>
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Orders</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "SELECT * FROM `order_manager`";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    while($res = mysqli_fetch_assoc($result1))
                    {

                        echo "<tr>
                                <th scope='row'>$res[order_id]</th>
                                <td>$res[full_name]</td>
                                <td>$res[mobile_number]</td>
                                <td>$res[address]</td>
                                <td>
                                
                                <table class='table table-stripped'>
                                    <thead>
                                    <tr>
                                        <th scope='col'>Item Name</th>
                                        <th scope='col'>Price</th>
                                        <th scope='col'>Quantity</th>
                                    </tr>
                                        </thead>
                                    <tbody>";

                                $query = "SELECT * FROM `user_orders` WHERE order_id = $res[order_id]";
                                $result2 = mysqli_query($conn, $query);

                                while($success = mysqli_fetch_assoc($result2))
                                {
                                    echo "<tr>
                                    <td>$success[Item_Name]</td>
                                    <td>$success[price]</td>
                                    <td>$success[Quantity]</td>
                                    <td>";
                                    echo "<br>";
                                    echo $success['Quantity'];
                                }
                                
                                echo"</tbody>
                                </table>    
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>