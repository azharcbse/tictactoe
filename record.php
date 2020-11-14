<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_GET['result'])
  {
    require_once "config.php";
    $sql = "INSERT INTO records (user_id, result, game_date, game_time) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "isss",$param_user_id , $param_result, $param_game_date, $param_game_time);
        $date = date_default_timezone_set('Asia/Kolkata');

        $param_user_id = $_SESSION['id'];
        $param_result = $_GET['result'];
        $param_game_date = date("d-m-Y");
        $param_game_time = date("h:i:sa");

        if (!mysqli_stmt_execute($stmt))
        {
            echo "Something went wrong...";
        }
    }
    mysqli_stmt_close($stmt);
    echo "successfull";
  }
else{
    header("location: login.php");
}
?>