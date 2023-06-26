<?php
    session_start();

   if(!isset($_SESSION["login"]))
   {
   header("location: store_login.php");
   exit();
   }

include 'Backend/connection.php';

$category_get_qry = "SELECT category_name FROM category ";
$category_data = mysqli_query($db_connection, $category_get_qry);


$brand_get_qry = "SELECT brand_name from  brand";
$brand_data = mysqli_query($db_connection, $brand_get_qry);


if($_SERVER ["REQUEST_METHOD"] == "POST" )
{
    $productname = $_POST['product_name'];
    $productquantity = $_POST['product_quantity'];
    $productprice = $_POST['product_price'];
    $productcategory = $_POST['product_category'];
    $productbrand = $_POST['product_brand'];
    $productdetail = $_POST['product_detail'];

    //handling name ...
    
    //store file original name
    $productimage_name = $_FILES['product_image']['name'];
    
    //store destination path
    $path = 'Images/' . $productimage_name;

    //store file original destination
    $productimage_tempname = $_FILES['product_image']['tmp_name'];

    //breaking the file extenstion
    $productimage_extenstion_temp = explode('.', $productimage_name); // returns array
    $productimage_extenstion = $productimage_extenstion_temp[1];

    if($productimage_extenstion == "jpge" or $productimage_extenstion =="jpg")
    {
        $product_qry = "INSERT INTO product (product_name,product_quantity,
        product_price,product_category,product_brand,product_detail,product_image) 
        VALUES ('$productname','$productquantity','$productprice','$productcategory',
        '$productbrand','$productdetail','$productimage_name')";
        
        $product_data = mysqli_query($db_connection, $product_qry);
        
        if($product_data)
        {
            move_uploaded_file($productimage_tempname, "Images/".$productimage_name);
        }
    }
    else
    {
        echo "wrong extension..";
    }
        
   
    
}



?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <form method="POST" enctype="multipart/form-data">
        
        <div class="screen-container">

    
            <div class="container-bigpannels">
            <div > <a href = "dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">ADD NEW PRODUCT</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row">
            <div class="form-label">  <label for="product_name">Poduct Name</label> </div>
            <div class="form-input">  <input type="text" name="product_name" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="product_quantity">Product Quantity</label> </div>
            <div class="form-input">  <input type="number" name="product_quantity" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="product_price">Product Price</label> </div>
            <div class="form-input">  <input type="number" name="product_price" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="product_category">Product Category</label> </div>
            <div class="form-input">  <select name="product_category">
                                
                        <?php  //php starts
                        if (!$category_data) 
                        {
                        } 
                        else
                        while ($category_fetch = mysqli_fetch_assoc($category_data)) 
                         { //loop starts
                         $temp_categoryname = $category_fetch['category_name'];
                        //php ends ?>
                         <option> <?php echo $temp_categoryname; ?> </option>
                         <?php //php starts
                        } //loop bracket
                        //php ends ?>
                </select>    
            </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="product_brand">Product Brand</label> </div>
            <div class="form-input">  <select name="product_brand">
                                
                        <?php  //php starts
                        if (!$brand_data) 
                        {
                        } 
                        else
                        while ($brand_fetch = mysqli_fetch_assoc($brand_data)) 
                         { //loop starts
                         $temp_brandname = $brand_fetch['brand_name'];
                        //php ends ?>
                         <option> <?php echo $temp_brandname; ?> </option>
                         <?php //php starts
                        } //loop bracket
                        //php ends ?>
                </select>       
            </div>
        </div>


        <div class="form-row">
            <div class="form-label">  <label for="product_image">Product Image</label> </div>
            <div class="form-input">  <input type="file" name="product_image" reqired> </div>
        </div>

        <div class="form-row">
            <div class="form-label">  <label for="product_detail">Product Detail</label> </div>
            <div class="form-input">  <textarea type="text" name="product_detail"></textarea> </div>
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