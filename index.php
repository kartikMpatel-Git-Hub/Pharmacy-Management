<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pharmacy Management - Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
  </head>
  <body>

  <?php

//import database
include("php/connection.php");


    session_start();

    $_SESSION["user"] = "";
    $_SESSION["usertype"] = "";


if($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $error = '<label for="promter" class="form-label"></label>';

    $result = $database->query("select * from user where username='$username'");
    if($result->num_rows == 1) {
        $utype = $result->fetch_assoc()['type'];
        if ($utype == 'A') {

            
            $checker = $database->query("select * from user where username='$username' and password='$password'");

            if ($checker->num_rows == 1) {


                //   Patient dashbord
                $_SESSION['user'] = "Admin";
                $_SESSION['usertype'] = 'A';

                header('location: User/Admin/index.php');

            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        } elseif($utype == 'C') {

          $checker = $database->query("select * from user where username='$username' and password='$password'");

          if ($checker->num_rows == 1) {


              //   Patient dashbord
              $_SESSION['user'] = "Customer";
              $_SESSION['usertype'] = 'C';

              header('location: User/Customer/index.php');

          } else {
              $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
          }

        } elseif($utype == '') {

            
            $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
            if ($checker->num_rows == 1) {


                //   doctor dashbord
                $_SESSION['user'] = $email;
                $_SESSION['usertype'] = 'd';
                header('location: doctor/index.php');

            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
            }

        }

    } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
    } 
    } else {
        $error = '<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>

    <div class="container">
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" method="post">
            <div class="logo">
        			<img src="images/prof.jpg" class="profile"/>
        			<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="username" onkeyup="validate();" required>
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="password" onkeyup="validate();" required>
            </div> <!-- input-group class -->
            <div class="form-group">
              <input type="submit" class="btn btn-default btn-block btn-custom" value="Login" style="background-color:#ff5252;">
              <!-- <button class="btn btn-default btn-block btn-custom">Login</button> -->
            </div>
          </form><!-- form close -->
        </div> <!-- cord-body class -->
        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" href="#">Forgot password?</a>
          </div>
        </div> <!-- cord-footer class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
