<?php
include 'Backend/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $userEmail = $_POST['user_email'];
    $userPassword = MD5($_POST['user_password']);

    $qry = "SELECT * FROM user where user_email = '$userEmail'";
    $data = mysqli_query($db_connection, $qry);
    $user_data = mysqli_fetch_assoc($data);
    
    $tempEmail = $user_data['user_email'];
    $tempPassword = $user_data['user_password'];

    if ($tempEmail != NULL) 
    {
        if ($userPassword == $tempPassword) 
        {
            session_start();
            $_SESSION["userlogin"] = $tempEmail;
            $login = true;
            header('location:user_dashboard.php');
        }
        else 
        {
            echo "Wrong Passwrod";
        }  
    }

    else
    {
        echo "No Email Found ..";
    }
}
    
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class = "body-user">
        <table>
            <form method="POST">

                <div class="screen-container">

                    
                <div class="container">
                <div > <a href = "user_registeration.php"> <input class="close-button" value="X"> </a> </div>
                    <div class="popup-banner-text">USER LOGIN</div>  
                </div>   
                <div class="container">

                <div class="form-row">
                <div class="form-label">  <label for="user_email">USER EMAIL</label> </div>
                <div class="form-input">  <input type="email" name="user_email" reqired> </div>
                </div>

                <div class="form-row">
                <div class="form-label">  <label for="user_password">USER PASSWORD</label> </div>
                <div class="form-input">  <input type="password" name="user_password" reqired> </div>
                </div>

                <div class="form-row">
                <div class="form-label"></div>
                <div class="form-input form-buttons">  
                    <input type="submit" value="LOGIN" name="save_button">
                    <input type="reset" value="CLEAR" name="clear_button"> 
                </div>
                </div>

                </div>
                </div>
       
            </form>
        </table>
    </body>
</html>
