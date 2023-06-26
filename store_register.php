<?php
include 'Backend/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $storeEmail = $_POST['store_email'];
    $check_qry = "SELECT store_email from store where store_email = '$storeEmail' ";
    $check_run = mysqli_query($db_connection, $check_qry);
    
    if (mysqli_num_rows($check_run) > 0) 
    {
        echo "Email Already Exsists";
    }
    else 
    {
        $storeName = $_POST['store_name'];
        $storePassword = MD5($_POST['store_password']);
        $storeType= $_POST['store_type'];
        
        
        $qry = "INSERT INTO store (store_name,store_email,store_password,store_type) 
        VALUES ('$storeName','$storeEmail','$storePassword','$storeType')";
        $save = mysqli_query($db_connection, $qry);

        if($save)
        {
            echo "STORE REGISTERED";
        }
    }
}
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST">
        
        <div class="screen-container">

    
            <div class="container">
            <div > <a href = "admin_registeration.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">STORE REGISTER</div>  
            </div>   
            <div class="container">
            
        <div class="form-row">
            <div class="form-label">  <label for="store_name">STORE NAME</label> </div>
            <div class="form-input">  <input type="text" name="store_name" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="store_email">STORE EMAIL</label> </div>
            <div class="form-input">  <input type="email" name="store_email" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="store_password">STORE PASSWORD</label> </div>
            <div class="form-input">  <input type="password" name="store_password" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="store_type">STORE TYPE</label> </div>
            <div class="form-input">  <select name="store_type">
                   <option value="r" selected> Regular Seller </option>
                   <option value="w" selected> Whole Seller </option></select> 
            </div>
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

