<?php

session_start();

if(!isset($_SESSION["userlogin"]))
{
header("location: user_login.php");
exit();
}


include 'Backend/connection.php';


$user_email = $_SESSION["userlogin"];
$user_qry = "SELECT * from user where user_email = '$user_email'" ;
$user_data = mysqli_query($db_connection, $user_qry);
$user_fetch = mysqli_fetch_assoc($user_data);
$user_wallet = $user_fetch['user_wallet'];
$cash = 500;

$newcash = $user_wallet + $cash;

$user_qry = ("UPDATE user SET user_wallet = '$newcash' where user_email = '$user_email'");
$user_data = mysqli_query($db_connection, $user_qry);




header("Location: user_dashboard.php");
?>
