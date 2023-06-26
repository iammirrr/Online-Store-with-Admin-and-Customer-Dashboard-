<?php
    
    session_start();

    if(!isset($_SESSION["login"]))
    {
    header("location: store_login.php");

    }


include 'Backend/connection.php';
$uid = $_GET['selected_id'];

$id_search_qry = "SELECT * from brand where brand_id = $uid";

$brand_data = mysqli_query($db_connection, $id_search_qry);
$brand_fetch = mysqli_fetch_assoc($brand_data);

$temp_brandname = $brand_fetch['brand_name'];
$temp_branddetails = $brand_fetch['brand_details'];
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $newbrandName = $_POST['brand_name'];
        $newbrandDetail = $_POST['brand_details'];
    
        $update_brand_qury = ("UPDATE BRAND SET brand_name = '$newbrandName'  ,  
        brand_details = '$newbrandDetail' where brand_id = '$uid'");
        
        $run_update_brand_qury = mysqli_query($db_connection, $update_brand_qury);
    
        if($run_update_brand_qury)
        {
            header('location:editing_dashboard.php');
        }
    
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST" >
        
        <div class="screen-container">

    
            <div class="container-bigpannels">
            <div > <a href = "editing_dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">UPDATE BRAND</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_name">Brand Name</label> </div>
            <div class="form-input">  <input type="text" name="brand_name" value ='<?php echo $temp_brandname?>'> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_details">Brand Details</label> </div>
            <div class="form-input">  <textarea input type="text" name="brand_details"><?php echo $temp_branddetails ?></textarea> </div>
        </div>

        <div class="form-row">
            <div class="form-label"></div>
            <div class="form-input form-buttons">  
                <input type="submit" value="UPDATE" name="save_button">
                <input type="reset" value="CLEAR" name="clear_button"> 
            </div>
        </div>
        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>


