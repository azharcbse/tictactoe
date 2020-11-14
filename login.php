<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_SESSION['username']))
{
    header("location: homepage/home.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
    $err = "Email and Password cannot be blank";
  }
  else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }
  if(empty($err))
  {
    $sql = "SELECT id, name, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1){
        mysqli_stmt_bind_result($stmt, $id,$name, $username, $hashed_password);
        if(mysqli_stmt_fetch($stmt)){
          if(password_verify($password, $hashed_password)){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["name"]=$name;
            $_SESSION["loggedin"] = true;
            header("location: homepage/home.php");    
          }
          else{
            $err="Password doesn't matched";
          }
        }
        else{
          $err="something went wronge1";
        }
      }
      else{
        $err="Email doesn't exist";
      }
    }
    else{
      $err="Email doesn't exist";
    }
  }
  else{
    $err="something went wornge3";
  }    
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="styleh.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="login.php" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="username" placeholder="Email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <p style="color: red;"><?php echo $err; ?></p>
            <input type="submit" value="Login" class="btn solid" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Registation</h3>
            <p>
              If your are visiting first time then you have to register here for getting our services and playing game.
            </p>
            <a href="registation.php"><button class="btn playAgain" id="sign-up-btn">
              Sign up
            </button></a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>
