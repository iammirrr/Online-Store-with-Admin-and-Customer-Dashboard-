<?php

   session_start();

   if(!isset($_SESSION["userlogin"]))
   {
   header("location: user_login.php");
   exit();
}


include 'Backend/connection.php';




    $user_email = $_SESSION["userlogin"];
    $order_qry = "SELECT * from orders where order_user_email = '$user_email'" ;
    $order_data = mysqli_query($db_connection, $order_qry);


    print_r($user_email);

?>






<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class = "body-user">
    <div class="screen-container-listpannel">           

                <div class="container-listpannel ">
                    <div>
                    <a href="user_dashboard.php">
                        <input class="close-button" value="X">
                    </a>
                    </div>
                    <div class="popup-banner-text">MY ORDERS</div>  
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


                    <div class="order-buttons"> Preparing...</div>
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


