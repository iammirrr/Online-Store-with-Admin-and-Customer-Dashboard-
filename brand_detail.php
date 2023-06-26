<?php

session_start();

if(!isset($_SESSION["login"]))
{
header("location: store_login.php");
exit();
}


include 'Backend/connection.php';
//this is same id from brandlist href="brand_detail.php?detailid = <?php $temp_brandid;
$uid = $_GET['selected_id'];

$id_search_qry = "SELECT * from brand where brand_id = $uid";

$brand_data = mysqli_query($db_connection, $id_search_qry);
$brand_fetch = mysqli_fetch_assoc($brand_data);

$temp_brandname = $brand_fetch['brand_name'];
$temp_branddetails = $brand_fetch['brand_details'];
// as we know id of this we simply run fetch assoc from the database

?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST">
        
        <div class="screen-container">

    
            <div class="container-bigpannels">
            <div > <a href = "editing_dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">BRAND DETAIL</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_name">Brand Name</label> </div>
            <div class="form-input">  <?php echo $temp_brandname; ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_details">Brand Details</label> </div>
            <div class="form-input"> <?php echo $temp_branddetails; ?> </div>
        </div>

        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>