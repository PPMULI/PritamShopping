<?php
$conform = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $servername = "localhost";
  $username = "root";
  $password  = "";
  $database = "school";

  $conn = mysqli_connect($servername, $username, $password, $database);
  if(!$conn){
    die(mysqli_connect_error());
    echo "fail";
  }
  else{
    echo "scr";
    $email = $_POST['email'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $length = strlen($pass);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $number    = preg_match('@[0-9]@', $pass);
    $specialChars = preg_match('@[^\w]@', $pass);

    echo $pass; 
    if($pass == $cpass && ($cpass = $pass != null)){
      if($email ==null || $name == null){
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>emil or username should not be null</p>
        <hr>';
      }
      else{
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8){
          echo '<div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          <p>Password should contain minimum one upper case, Lower case, one number and one special charactor.</p>
          <p>Length of password should be greater than 8. </p>       
         </div>';
          
        }
        else{
          $sql1 = "SELECT * FROM `student_login` WHERE email = '$email' AND name = '$name'";
          $result1 = mysqli_query($conn, $sql1);
          $num1 = mysqli_num_rows($result1);
          echo "<br>";

          if($num1 > 0){
            echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>You are already signup. </p>
           </div>';
          } 
          else{
          $sql = "INSERT INTO `student_login` (`email`, `name`, `pass`, `DateTime`) VALUES ('$email', '$name', '$pass', current_timestamp())";
          $result = mysqli_query($conn, $sql);
    
          if($result){
            echo  '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>You are at last step. Please set the username.</p>
            <hr>
            </div>';
             $conform = true;
          }
          else{
          echo '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
           </div>';
          }
        }
       }
      }
  }
    else{
      echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Alert</h4>
        <p>Password should be match</p>
        <hr>';
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
      include "component/_nav.php";
      ?>
      <div class="container">
    <form action = "signup.php" method = "POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="container">
      <div class="mb-3">
    <label for="name" class="form-label">username: </label>
    <input type="text" class="form-control" id="name" name = "name" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name = "pass">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Conform Password</label>
    <input type="password" class="form-control" id="cpass" name = "cpass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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