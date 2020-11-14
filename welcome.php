<?php

session_start();
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PHP login system!</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
      <canvas id="Canvas"></canvas>
<nav id="navbars">
        <div class="nav-block">
            <div class="user-div">
                <a href=""> <img src="homepage/login.png" alt="" id="logo"></a>
                <h2 class="user"><?php echo "Welcome ".ucwords($_SESSION['name'])?></h2>
            </div>
            <div class="buttons">
                <a href="homepage/home.php"><button class="btns">
                    Home
                </button></a>
                <a href="records.php"><button class="btns">
                    Records
                </button></a>
                <a href="logout.php"><button class="btns">
                    Logout
                </button></a>
            </div>
        </div>
        <p id="para"><?php echo $_SESSION['username'];?></p>
    </nav>

    
<center>
        <h1 class="head"><span id="span1">TIC-</span><span id="span2"> TAC- </span><span id="span3"> TOE </span></h1>
        <div class="neonText">
            <h2 id="player" class="neon" data-text="[Lets_Play]">[Lets_Play]</h2>
        </div>

<table >
     
    <tr>
        <td id="r1" onclick="printx('1')"></td>
        <td id="r2" onclick="printx('2')"></td>
        <td id="r3" onclick="printx('3')"></td>
    </tr>
    <tr  >
        <td id="r4" onclick="printx('4')"></td>
        <td id="r5" onclick="printx('5')"></td>
        <td id="r6" onclick="printx('6')"></td>
    </tr>
     <tr>
        <td id="r7" onclick="printx('7')"></td>
        <td id="r8" onclick="printx('8')"></td>
        <td id="r9" onclick="printx('9')"></td>
    </tr>
    
</table>
<a href="#" id="playAgain"><span class="inner">Play Again</span></a>
<div class="neon_btn">
<a href="#" id="playAgain2" onclick="eraseValues()">
    <span class="outter"></span>
    <span class="outter"></span>
    <span class="outter"></span>
    <span class="outter"></span>
    Play Again
</a>
</div>
</center>
<script type="text/javascript" src="jsgame.js"></script>
</body>
</html>
