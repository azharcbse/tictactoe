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
    <title>Document</title>
    <link rel="stylesheet" href="r_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav id="navbars">
        <div class="nav-block">
            <div class="user-div">
                <img src="homepage/login.png" alt="" id="logo">
                <h2 class="user"><?php echo "Welcome ".ucwords($_SESSION['name'])?></h2>
            </div>
            <div class="buttons">
                <a href="homepage/home.php"><button class="btns">
                    Home
                </button></a>
                <a href="logout.php"><button class="btns">
                    Logout
                </button></a>
            </div>
        </div>
    </nav>
    <section id="body-section">
        <p id="para"><?php echo $_SESSION['username'];?></p>
        <div class="headings glow">
            <h1>Records</h1>
        </div>
        <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">Result</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'config.php';
                    $id = $_SESSION["id"];
                    $selectquery = "select * from records where user_id = $id";
                    $query = mysqli_query($conn,$selectquery);
                    $i=1;
                    $num = mysqli_num_rows($query);
                    while($res = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo strtoupper($res['result']); ?></td>
                    <td><?php echo $res['game_date']; ?></td>
                    <td><?php echo $res['game_time']; ?></td>
                </tr>
                <?php
                        $i++;
                    }
                ?>
            </tbody>
        </table>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>

</html>