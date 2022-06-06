<?php
  $login = false;
  $showerror = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $servername = "localhost";
  $username = "root";
  $password  = "";
  $database = "school";

  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn){
    die(mysqli_connect_error());
  }
  else {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `student_login` WHERE  name ='$name' AND pass = '$pass'";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo $pass;
    echo "<br>";
    echo $num;
    if($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $name;
      echo "well done";
      header("location: welcome.php");
    }
    else{
      echo "Invalid credidatels";
      $showerror = true;
  //    header("location: signup.php");
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
        
        <title>Login</title>
    </head>
    <body>
      <?php
      include "component/_nav.php";
   
      ?>

      <?php
      if($login){
        echo "You are loggedin";
      }
      if($showerror){
        echo "Invalid credidates";
      }
      ?>
      <div class="container">
    <form action = "/pritam/login.php" method = "POST">
  <div class="container">
      <div class="mb-3">
    <label for="name" class="form-label">username: </label>
    <input type="text" class="form-control" id="name" name = "name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name = "pass">
  </div>
 
  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="/pritam/js/sweetalert.min.js"></script>

    <script>
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      });
    </script>
  </body>
</html>