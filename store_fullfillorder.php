<?php

include 'Backend/connection.php';
   session_start();
   if(!isset($_SESSION["login"]))
   {
   header("location: store_login.php");
   exit();
   }

   
    $uid = $_GET['selected_id'];
    $storeEmail = $_SESSION["login"];
    print_r($storeEmail);
    $order_qry = "SELECT * from orders where order_id = '$uid'" ;
    $order_data = mysqli_query($db_connection, $order_qry);
    $order_fetch = mysqli_fetch_assoc($order_data);
    $orderPrice = $order_fetch['order_price'];

    $store_qry = "SELECT * from store where store_email = '$storeEmail'" ;
    $store_data = mysqli_query($db_connection, $store_qry);
    $store_fetch = mysqli_fetch_assoc($store_data);
    $storeWallet = $store_fetch['store_wallet'];
    
    if( $order_fetch != NULL)
    {
   
        $reveune =  $storeWallet +  $orderPrice ;
      
        $order_delete_qry = "DELETE from orders where order_id = '$uid'" ;
        $order_delete_data = mysqli_query($db_connection, $order_delete_qry);

        $store_update_qry = ("UPDATE store SET store_wallet = '$reveune' where store_email = '$storeEmail'");
        $store_update_run = mysqli_query($db_connection, $store_update_qry);

        header("location: store_myorders.php");
    }
    else
    {
    echo 'Order Not Found...';
    header("location: store_myorders.php");
    }


?>