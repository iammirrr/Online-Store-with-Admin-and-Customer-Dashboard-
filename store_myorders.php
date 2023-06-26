<?php

   session_start();

   if(!isset($_SESSION["login"]))
   {
   header("location: store_login.php");
   exit();
   }


include 'Backend/connection.php';
    print_r($_SESSION["login"]);
    $order_qry = "SELECT * from orders" ;
    $order_data = mysqli_query($db_connection, $order_qry);
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
                    <div class="popup-banner-text">ORDERS</div>  
                </div> 

            <div class="container-listpannel">

            <div class="left-center-right-container">
 
                <div class="center-user">
               
               <?php
                
                if(!$order_data)
                {
                   echo 'No Orders..';
                } else
                    while ($order_fetch = mysqli_fetch_assoc($order_data)) 
                {
                    $orderId = $order_fetch['order_id'];
                    $orderProductQuantity = $order_fetch['order_product_quantity'];
                    $orderPrice = $order_fetch['order_price'];
                    $orderDate= $order_fetch['order_date'];
                    $orderproductName = $order_fetch['order_product_name'];
                    $orderUserEmail = $order_fetch['order_user_email'];
                    
                ?>
               
                <div class="order-section">
                  
                    <div class="product-name"> Order Invoice</div>
                    <div class="order-image"> 
                    <div class="product-price">Product Name   : <?php echo $orderproductName; ?></div><br>
                    <div class="product-price">Sum Total      :<?php echo $orderPrice; ?></div> <br>
                    <div class="product-price">Order Quantity :   x<?php echo $orderProductQuantity; ?></div><br>
                    <div class="product-price">Order Date     : <?php echo $orderDate; ?></div><br>
                    <div class="product-price">User Email     : <?php echo $orderUserEmail; ?></div><br>
                    
                    </div>


                

                    <a href="store_fullfillorder.php?selected_id=<?php echo $orderId; ?> "> <input class="order-button"  type="button" value="FULLFILL"/> </a>


                
                
                </div>


               
                <?php 
               
                }   
                
                ?>
            </div>

            </div>

        </div>
    

    </div>

       
    </body>
    
</html>


