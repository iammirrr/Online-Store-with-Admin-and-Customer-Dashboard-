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

$id_search_qry = "SELECT * from category where category_id = $uid";

$category_data = mysqli_query($db_connection, $id_search_qry);
$category_fetch = mysqli_fetch_assoc($category_data);

$temp_categoryname = $category_fetch['category_name'];
$temp_categorydetails = $category_fetch['category_details'];

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
                <div class="popup-banner-text">CATEGORY DETAIL</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="category_name">Category Name</label> </div>
            <div class="form-input">  <?php echo $temp_categoryname; ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="category_details">Category Details</label> </div>
            <div class="form-input"> <?php echo $temp_categorydetails; ?> </div>
        </div>

        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>