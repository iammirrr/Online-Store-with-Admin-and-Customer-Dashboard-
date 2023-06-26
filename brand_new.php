<?php


session_start();

if(!isset($_SESSION["login"]))
{
header("location: store_login.php");
exit();
}



include 'Backend/connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $brandName = $_POST['brand_name'];
    $brandDetail = $_POST['brand_details'];

    $qry = "INSERT INTO brand (brand_name,brand_details) 
    VALUES ('$brandName','$brandDetail')";
    $save = mysqli_query($db_connection, $qry);

    if($save)
    {
        echo "BRAND DATA ADDED";
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

    
            <div class="container-bigpannels">
            <div > <a href = "dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">NEW BRAND</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row">
            <div class="form-label">  <label for="brand_name">Brand Name</label> </div>
            <div class="form-input">  <input type="text" name="brand_name"> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="brand_details">Brand Details</label> </div>
            <div class="form-input"> <textarea input type="text" name="brand_details"></textarea> </div>
        </div>

        <div class="form-row">
            <div class="form-label"></div>
            <div class="form-input form-buttons">  
                <input type="submit" value="ADD" name="save_button">
                <input type="reset" value="CLEAR" name="clear_button"> 
            </div>
        </div>
        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>
