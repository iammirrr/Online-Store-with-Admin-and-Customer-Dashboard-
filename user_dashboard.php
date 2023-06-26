<?php

   session_start();

   if(!isset($_SESSION["userlogin"]))
   {
   header("location: user_login.php");
   exit();
 }


include 'Backend/connection.php';




$user_email = $_SESSION["userlogin"];
$user_qry = "SELECT * from user where user_email = '$user_email'" ;
$user_data = mysqli_query($db_connection, $user_qry);
$user_fetch = mysqli_fetch_assoc($user_data);
$user_wallet = $user_fetch['user_wallet'];

print_r($user_email);

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

    <body class = "body-user">
    <div class="screen-container-listpannel">           

                <div class="container-listpannel ">
                    <div>
                    <a href= "user_addcash.php"> <input  class="add-cash" value="+"> <div class ="cash-bar"> <?php echo $user_wallet ?>$ </div></a>
                    </div>
                    <div class="popup-banner-text">PRODUCT DASHBOARD</div>  
                </div> 

            <div class="container-listpannel">
            
            <div class="left-center-right-container">

            <div class="center-text">
                PRODUCT LIST
            </div>

            </div>

            <div class="left-center-right-container">
 
                <div class="center-user">
               
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
                        <a href="user_order.php?selected_id=<?php echo $temp_productid; ?> "> <input class="product-button"  type="button" value="BUY"/> </a>
                    </div>
                </div>



                <?php 
                
                }   ?>
            </div>

            </div>
            
            <div class="space"></div>
            <a href = "user_myorders.php"> <input type="button" class="invoices-button"  value="My Orders"> </a>
            <div class="space"></div>
            <a href = "user_logout.php"> <input type="button" class="logout-button"  value="Logout"> </a>
        
        </div>
    

    </div>

       
    </body>
    
</html>


