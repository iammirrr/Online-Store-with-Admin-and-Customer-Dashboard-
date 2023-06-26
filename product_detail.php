<?php
session_start();

if(!isset($_SESSION["login"]))
{
header("location: store_login.php");
exit();
}
include 'Backend/connection.php';

    $uid = $_GET['selected_id'];

    $id_search_qry = "SELECT * from product where product_id = $uid";

    $product_data = mysqli_query($db_connection, $id_search_qry);
    $product_fetch = mysqli_fetch_assoc($product_data);

    $temp_productname = $product_fetch['product_name'];
    $temp_productquantity = $product_fetch['product_quantity'];
    $temp_productprice = $product_fetch['product_price'];
    $temp_productcategory = $product_fetch['product_category'];
    $temp_productbrand = $product_fetch['product_brand'];
    $temp_productdetail = $product_fetch['product_detail'];
    $temp_productimage = $product_fetch['product_image'];


    $category_get_qry = "SELECT category_name FROM category ";
    $category_data = mysqli_query($db_connection, $category_get_qry);


    $brand_get_qry = "SELECT brand_name from  brand";
    $brand_data = mysqli_query($db_connection, $brand_get_qry);
?>




<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST" enctype="multipart/form-data">
        
        <div class="screen-container">
            <div class="container-bigpannels">
            <div > <a href = "editing_dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">PRODUCT DETAIL</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="product_name">Product Name</label> </div>
            <div class="form-input">  <?php echo $temp_productname ?></div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_quantity">Product Quantity</label> </div>
            <div class="form-input">  <?php echo $temp_productquantity ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_price">Product Price</label> </div>
            <div class="form-input">  <?php echo $temp_productprice ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_category">Product Category</label> </div>
            <div class="form-input">  <?php echo $temp_productcategory ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_name">Product Brand</label> </div>
            <div class="form-input">  <?php echo $temp_productbrand ?> </div>
        </div>


        <div class="form-row-detail">
            <div class="form-label">  <label for="product_image">Product Image</label> </div>
            <div class="form-input" >  <img src="<?php echo "Images/".$temp_productimage; ?>"width = 150px height = 150px >  </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_detail">Product Detail</label> </div>
            <div class="form-input">  <?php echo $temp_productdetail ?> </div>
   
        </div>
        
        </div>
        </div>
        </form>
    </body>
</html>