<?php
session_start();

if(!(isset($_SESSION['loggedin'])) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}
?>
<!--  window.location.href = 'clothe.php; -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "school";

$conn = mysqli_connect($servername, $username, $password, $database);
if(mysqli_connect_error())
{
  echo "failed";
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['purchase']))
  {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $mobilenumber = $_POST['mobilenumber'];
    $paymode = $_POST['paymode'];
    $sql = "INSERT INTO `order_manager` (`full_name`, `address`, `mobile_number`, `Pay_Mode`) VALUES ('$fullname','$address', '$mobilenumber', '$paymode')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $order_id = mysqli_insert_id($conn);
      $sql1 = "INSERT INTO `user_orders`(`order_id`, `Item_name`, `price`, `Quantity`) VALUES (?,?,?,?)";
      echo $sql1;
      $stmt = mysqli_prepare($conn, $sql1);
      if($stmt)
      {
        $sq =  mysqli_stmt_bind_param($stmt, "isii", $order_id, $Item_Name, $price, $Quantity);      
        foreach($_SESSION['cart'] as $key => $value)
        {
          $Item_Name = $value['Item_Name'];
          $price = $value['price'];
          $Quantity = $value['Quantity'];
          mysqli_stmt_execute($stmt);
        }
        unset($_SESSION['cart']);
        echo "<script>
          alert('order placed');
          windows.location.href = 'index.php'
        </script>";
      }
      else
      {
        echo "SQL prepare error";
      }
    }
  }
  else
  {
    echo "error";
  }
}
?>