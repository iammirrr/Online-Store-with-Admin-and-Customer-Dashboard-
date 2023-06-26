<?php
include 'Backend/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $storeEmail = $_POST['store_email'];
    $storePassword = MD5($_POST['store_password']);

    $qry = "SELECT * FROM store where store_email = '$storeEmail'";
    $data = mysqli_query($db_connection, $qry);
    $store_data = mysqli_fetch_assoc($data);
    
    $tempEmail = $store_data['store_email'];
    $tempPassword = $store_data['store_password'];

    if ($tempEmail != NULL) 
    {
        if ($storePassword == $tempPassword) 
        {
            session_start();
            $_SESSION["login"] = $tempEmail;
            $login = true;
            header('location:dashboard.php');
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
    <body>
        <table>
            <form method="POST">

                <div class="screen-container">

                    
                <div class="container">
                <div > <a href = "admin_registeration.php"> <input class="close-button" value="X"> </a> </div>
                    <div class="popup-banner-text">STORE LOGIN</div>  
                </div>   
                <div class="container">

                <div class="form-row">
                <div class="form-label">  <label for="store_email">STORE EMAIL</label> </div>
                <div class="form-input">  <input type="email" name="store_email" reqired> </div>
                </div>

                <div class="form-row">
                <div class="form-label">  <label for="store_password">STORE PASSWORD</label> </div>
                <div class="form-input">  <input type="password" name="store_password" reqired> </div>
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
