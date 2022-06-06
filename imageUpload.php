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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href = "//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" >
        <script src = "//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js" ></script>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
   
        </script>
    
        <title>Hello, world!</title>
    </head>
    <body>
    
        <?php
        include "component/_nav.php";
       
        ?>
       <div class="container">
           <h1 class = "text-center text-white bg-dark">Your Register books: </h1>
           <br>
           <br>
       
           <div class = "table-responsive">
               <table class = "table table-bordered table-striped table-hover " id = "myTable">
                   <thead class="text-center">
                       <th>S.no</th>
                       <th>Full name</th>
                       <th>Profile photo</th>
                       <th>Aadhar Card</th>
                   </thead>
                   <tbody>
                       <?php
                       $servername = "localhost";
                       $username = "root";
                       $password  = "";
                       $database = "school";
                     
                       $conn = mysqli_connect($servername, $username, $password, $database);
                       if(isset($_POST['submit'])){
                           $fullname = $_POST['fullname'];
                           $address = $_POST['address'];
                           $mobilenumber = $_POST['mobilenumber'];
                           $files = $_FILES['file'];
                           $files2 = $_FILES['imgfile'];

                           print_r($files2);
                           $filename = $files['name'];
                           $fileerror = $files['error'];
                           $fileTemp = $files['tmp_name'];
                          /* print_r($filename);
                           echo "<br>";
                           print_r($filename2);
                           echo "<br>";/*/
                          
                           $filename2 = $files2['name'];
                           $fileerror2 = $files2['error'];
                           $fileTemp2 = $files2['tmp_name'];

                           
                           echo "<br>";
                          // echo $fileTemp2;

                           $fileext = explode('.', $filename);
                           $fileext2 = explode('.', $filename2);

                           $filecheck = strtolower(end($fileext));
                           $filecheck2 = strtolower(end($fileext2));

                           $fileextStore = array('png', 'jpg', 'jpeg', 'pdf');

                           if(in_array($filecheck, $fileextStore) && in_array($filecheck2, $fileextStore)){
                               $destination = 'upload/'. $filename;
                               $destination2 = 'upload/'. $filename2;
                               move_uploaded_file($fileTemp, $destination);
                               move_uploaded_file($fileTemp2, $destination2);

                            /*  $sql3 = "SELECT * FROM `user_login` WHERE full_name = '$fullname' AND mobile_number = '$mobilenumber'";
                               $result3 = mysqli_query($conn, $sql3);
                               $num3 = mysqli_num_rows($result3);
                               //echo $sql3;
                               //echo "<br>";
                               //echo $num3;
                               if($num3 > 0){
                              /*  echo '<div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Alert! </h4>
                                        <p>This book is already present in yhe library with this title and book.</p>
                                        <p>For more information please connect to the administration block of the library</p>
                                        <hr>
                                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                                        </div>
                                    </div>';

                                    echo '    <script>
                                    window.alert("You are already register for the app");
                                    window.location.href = "welcome.php";
                                </script>';

                              
                               }
                               else{*/
                               $sql = "INSERT INTO `user_login` (`full_name`, `address`, `mobile_number`, `Profile_photo`, `aadhar_card`) VALUES ('$fullname', '$address', '$mobilenumber', '$destination', '$destination2')";
                               echo $sql; 
                               $result = mysqli_query($conn, $sql);
                                 $sql2 = "SELECT * FROM `user_login`";
                                 echo $sql2;
                                 $result2 = mysqli_query($conn, $sql2);
 
                                 //$row = mysqli_num_rows($result2);
                                 echo '    <script>
                                            window.alert("You data is saved successfully");
                                        </script>';

                                 while( $result1 = mysqli_fetch_assoc($result2)){
                                   ?>

                                   <tr>
                                       <td> <?php echo $result1['ID']; ?>  </td>
                                       <td> <?php echo $result1['full_name']; ?> </td>
                                       <td> <img src = "<?php echo $result1['Profile_photo']; ?>" hight = "50px", width = "50px">  </td>
                                       <td> <img src = "<?php echo $result1['aadhar_card']; ?>" hight = "50px", width = "50px">  </td>
                                      <?php
                                      
                                      // echo "<td> <a href = 'edit.php?rn = $result1[ID] & title = $result1[title] & author = $result1[author]  & image = $result1[image] & country = $result1[country] & state = $result1[state] & city = $result1[city]'>Edit</a> <a href = 'delete.php? rn = $result1[ID] & tit = $result1[title] & author = $result1[author]  & image = $result1[image]  & country = $result1[country] & state = $result1[state] & city = $result1[city]'>Delete</a>"
                                       ?>
                                       </tr>
                                   <?php
                                  }
                                }
                           }
                      //  }
                       
                       ?>
                           <?php   echo $result1['full_name'];
                           echo "<br>";
                           echo $_SESSION['name'];
                           echo "<br>";
                           $_SESSION['fullname'] = $fullname;
                           echo $_SESSION['fullname'];
           ?>
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