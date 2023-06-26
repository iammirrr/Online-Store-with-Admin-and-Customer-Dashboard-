<?php
session_start();

    if(!isset($_SESSION["login"]))
    {
    header("location: store_login.php");

    }


include 'Backend/connection.php';
if($_SERVER ['REQUEST_METHOD'] == "POST" )
{
   $categoryName = $_POST['category_name'];
   $categoryDetails = $_POST['category_details'];

   $qry = "INSERT INTO category(category_name,category_details)
   VALUES ('$categoryName','$categoryDetails')";

    $save = mysqli_query($db_connection, $qry);
    if($save)
    {
        echo "DATA SAVED";
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
                <div class="popup-banner-text">NEW CATEGORY</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row">
            <div class="form-label">  <label for="category_name">Category Name</label> </div>
            <div class="form-input">  <input type="text" name="category_name" required> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="category_details">Category Details</label> </div>
            <div class="form-input"> <textarea input type="text" name="category_details"></textarea> </div>
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


