<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="h_style.css">
</head>
<body>
    <nav id="navbars">
        <div class="nav-block">
            <div class="user-div">
                <img src="login.png" alt="" id="logo">
                <h2 class="user"><?php echo "Welcome ".ucwords($_SESSION['name']);?></h2>
            </div>
            <div class="buttons">
                <a href="../records.php"><button class="btns">
                    Records
                </button></a>
               <a href="../logout.php"> <button class="btns">
                    Logout
                </button></a>
            </div>
        </div>
        <p id="para"><?php echo $_SESSION['username'];?></p>
    </nav>
    <div class="home">
        <h1 class="heading">TIC TAC TOE GAME</h1>
        <div class="circles">
            <div class="circle"><img src="register.svg" alt=""></div>
        </div>
        <div class="buttons">
            <a href="../welcome2.php"><button class="btn1">
                2 PLAYERS PLAY
            </button></a>
            <a href="../welcome.php"><button class="btn2" >
                PLAY WITH COMPUTER
            </button></a>
        </div>
    </div>
</body>
</html>