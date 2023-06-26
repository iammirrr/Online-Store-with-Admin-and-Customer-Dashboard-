<?php
session_start();

if(!isset($_SESSION["login"]))
{
header("location: store_login.php");
exit();
}
include 'Backend/connection.php';

$uid = $_GET['selected_id'];

$id_search_qry = "SELECT * from category where category_id = $uid";

$category_data = mysqli_query($db_connection, $id_search_qry);
$category_fetch = mysqli_fetch_assoc($category_data);

$temp_categoryname = $category_fetch['category_name'];
$temp_categorydetails = $category_fetch['category_details'];

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $newcategoryName = $_POST['category_name'];
        $newcategoryDetail = $_POST['category_details'];
    
        $update_category_qury = ("UPDATE category SET category_name = '$newcategoryName'  ,  
        category_details = '$newcategoryDetail' where category_id = '$uid'");
        
        $run_update_category_qury = mysqli_query($db_connection, $update_category_qury);
    
        if($run_update_category_qury)
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
                <div class="popup-banner-text">UPDATE CATEGORY</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="category_name">Category Name</label> </div>
            <div class="form-input">  <input type="text" name="category_name" value ='<?php echo $temp_categoryname?>'> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="category_details">Category Details</label> </div>
            <div class="form-input">  <textarea input type="text" name="category_details"><?php echo $temp_categorydetails ?></textarea> </div>
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


