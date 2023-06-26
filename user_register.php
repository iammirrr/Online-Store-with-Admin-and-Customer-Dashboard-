<?php
include 'Backend/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $userEmail = $_POST['user_email'];
    $check_qry = "SELECT user_email from user where user_email = '$userEmail' ";
    $check_run = mysqli_query($db_connection, $check_qry);
    
    if (mysqli_num_rows($check_run) > 0) 
    {
        echo "Email Already Exsists";
    }
    else 
    {
        $userName = $_POST['user_name'];
        $userPassword = MD5($_POST['user_password']);
        $userWallet = $_POST['user_wallet'];
        
        
        $qry = "INSERT INTO user (user_name,user_email,user_password,user_wallet) 
        VALUES ('$userName','$userEmail','$userPassword','$userWallet')";
        $save = mysqli_query($db_connection, $qry);

        if($save)
        {
            echo "USER REGISTERED";
        }
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class = "body-user">

        <form method="POST">
        
        <div class="screen-container">

    
            <div class="container">
            <div > <a href = "user_registeration.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">USER REGISTER</div>  
            </div>   
            <div class="container">
            
        <div class="form-row">
            <div class="form-label">  <label for="user_name">USER NAME</label> </div>
            <div class="form-input">  <input type="text" name="user_name" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="user_email">USER EMAIL</label> </div>
            <div class="form-input">  <input type="email" name="user_email" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="user_password">USER PASSWORD</label> </div>
            <div class="form-input">  <input type="password" name="user_password" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="user_wallet">USER CASH</label> </div>
            <div class="form-input">  <input type="number" name="user_wallet" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label"></div>
            <div class="form-input form-buttons">  
                <input type="submit" value="REGISTER" name="save_button">
                <input type="reset" value="CLEAR" name="clear_button"> 
            </div>
        </div>
        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>

