<?php

   session_start();

   if(!isset($_SESSION["login"]))
   {
   header("location: store_login.php");
   exit();
 }


include 'Backend/connection.php';

$brand_qry = "SELECT * from brand";
$brand_data = mysqli_query($db_connection, $brand_qry);


$category_qry = "SELECT * from category";
$category_data = mysqli_query($db_connection, $category_qry);

$product_qry = "SELECT * from product";
$product_data = mysqli_query($db_connection, $product_qry);


?>






<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
    <div class="screen-container-listpannel">           

                <div class="container-listpannel ">
                    <div>
                    <a href="dashboard.php">
                        <input class="close-button" value="X">
                    </a>
                    </div>
                    <div class="popup-banner-text">EDTING DASHBOARD</div>  
                </div> 

            <div class="container-listpannel">
            
            <div class="left-center-right-container">
            <div class="left-text">
                BRANDS LIST
            </div>
            <div class="center-text">
                PRODUCT LIST
            </div>
            <div class="right-text">
                CATEGORY LIST
            </div>
            </div>

            <div class="left-center-right-container">
            <div class="left">
            
                    <?php 

                    while ($brand_fetch = mysqli_fetch_assoc($brand_data)) 
                    {
                    

                    $temp_brandid = $brand_fetch['brand_id'];
                    $temp_brandname = $brand_fetch['brand_name'];?>
                    <div class="left-items">
                    <div >  <?php echo $temp_brandname; ?>     </div>
                     <a href="brand_detail.php?selected_id='<?php echo $temp_brandid; ?>'"> 
                    <input class="edit-button" type="button" value="Details"/> </a> 



                    <a href="brand_update.php?selected_id=<?php echo $temp_brandid; ?> ">
                    <input class="edit-button" type="button" value="Update"/> </a> 
                    </div>
                    <?php

                    }  

                    //loop Ends Here
                    //Php Ends ?>


            </div>

                <div class="center">
               
               <?php  //php starts
                
                if(!$product_data)
                {
                    echo 'List Empty';
                } else
                    while ($product_fetch = mysqli_fetch_assoc($product_data)) 
                {
                //loop Starts Here
                $temp_productimage = $product_fetch['product_image'];
                $temp_productid = $product_fetch['product_id'];
                $temp_productname = $product_fetch['product_name'];
                $temp_productquantity = $product_fetch['product_quantity'];
                $temp_productprice = $product_fetch['product_price'];
                $temp_productcategory = $product_fetch['product_category'];
                $temp_productbrand = $product_fetch['product_brand'];
                $temp_productdetail = $product_fetch['product_detail'];
                ?>
               
                <div class="product-section">
                  
                    <div class="product-name"> <?php  echo $temp_productname; ?> </div>
                    <div class="product-image">
                    <img src="<?php echo "Images/".$temp_productimage; ?>"width = 150px height = 150px > 
                    </div>
                    
                    <div class="product-details">
                    
                    <div class="product-price">Price : <?php echo $temp_productprice; ?></div>
                   
                    </div>

                    <div class="product-buttons">
                        <a href = "product_detail.php?selected_id=<?php echo $temp_productid?>"><input class="product-button" type = "button" value="Detail"> </a>
                        <a href="product_update.php?selected_id=<?php echo $temp_productid; ?> "> <input class="product-button"  type="button" value="Update"/> </a>
                    </div>
                </div>



                <?php //Notice while covering whole html at same time not distrubing its actual progression 
                
                }  

                //loop Ends Here
                //Php Ends ?>
            </div>
            <div class="right">
           
           <?php  //php starts
                
                if(!$category_data)
                {
                    echo 'List Empty';
                } else
                    while ($data_fetch = mysqli_fetch_assoc($category_data)) 
                {
                    $temp_categoryid = $data_fetch['category_id'];
                    $temp_categoryname = $data_fetch['category_name'];?>

                    
                    <?php echo $temp_categoryname; ?> 
                    <div class="left-items">
                    <a href="category_detail.php?selected_id='<?php echo $temp_categoryid; ?>'"> 
                    <input class="edit-button" type="button" value="Details"/> </a> 
                
                    <a href="category_update.php?selected_id=<?php echo $temp_categoryid; ?> ">
                    <input class="edit-button" type="button" value="Update"/> </a>
                    </div>

               
                <?php 
                
                }  ?>
            </div>
            </div>
        </div>
        </div>

       
    </body>
    
</html>


