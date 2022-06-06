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
        <link rel = "stylesheet" href = "/PRITAM/signup.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <title>welcome - <?php $_SESSION['email'] ?></title>
    </head>
    <body>
      <?php
      include "component/_nav.php";
    
      ?>
      <div class="container mt-4">
      <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">     welcome - <?php echo $_SESSION['name'] ?></h4>
            <p>You are logged in</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
          </div>
      </div>

      <div class="container">
        <h1>Register your book here: </h1>
      <form action = "imageUpload.php" method = "POST" enctype = "multipart/form-data">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name: </label>
          <input type="text" class="form-control" id="fullname" name = "fullname" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address: </label>
          <input type="text" class="form-control" id="address" name = "address">
        </div>
        <div class="mb-3">
          <label for="mobilenumber" class="form-label">Mobile Number</label>
          <input type="text" class="form-control" id="mobilenumber" name = "mobilenumber">
        </div>
        <div class="mb-3">
          <label for="file" class="form-label">Profile Photo:  </label>
          <input type="file" class="form-control" id="file" name = "file">
        </div>
        <div class="mb-3">
          <label for="file" class="form-label">Aadhar Card: </label>
          <input type="file" class="form-control" id="imgfile" name = "imgfile">
        </div>
        
        <div class="mb-3">
          <label for="state" class="form-label">State: </label>
          <input type="text" class="form-control" id="state" name = "state">
        </div>
        <button type="submit" name = "submit" value = "Submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/sweetalert.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>