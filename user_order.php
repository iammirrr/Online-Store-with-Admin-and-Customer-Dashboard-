<?php
session_start();

if(!isset($_SESSION["userlogin"]))
{
header("location: store_login.php");
exit();
}

include 'Backend/connection.php';

    $uid = $_GET['selected_id'];
    $id_search_qry = "SELECT * from product where product_id = $uid";
    $product_data = mysqli_query($db_connection, $id_search_qry);
    $product_fetch = mysqli_fetch_assoc($product_data);
    $product_name = $product_fetch['product_name'];
    $product_quanity = $product_fetch['product_quantity'];
    $product_price = $product_fetch['product_price'];
    $productImage_name = $product_fetch['product_image'];

if($_SERVER["REQUEST_METHOD"] == "POST")   
{

    $order_quantity = $_POST['order_quantity'];
    if( $product_quanity >= $order_quantity )
    {

        $user_email = $_SESSION["userlogin"];
        $user_qry = "SELECT * from user where user_email = '$user_email'" ;
        $user_data = mysqli_query($db_connection, $user_qry);
        $user_fetch = mysqli_fetch_assoc($user_data);
        $user_wallet = $user_fetch['user_wallet'];


        $sum_price = $order_quantity * $product_price;

        if($user_wallet >= $sum_price)
        {

            $newcash = $user_wallet - $sum_price;

            $newquanity = $product_quanity - $order_quantity;
            $product_qry = ("UPDATE PRODUCT SET product_quantity = '$newquanity' where product_id = '$uid'");
            $product_data = mysqli_query($db_connection, $product_qry);
            
            $user_qry = ("UPDATE user SET user_wallet = '$newcash' where user_email = '$user_email'");
            $user_data = mysqli_query($db_connection, $user_qry);
    
            $date = date('Y-m-d H:i:s');
           
           $order_qry = "INSERT INTO orders (order_product_quantity,order_price,order_date,order_product_name,order_user_email) 
            VALUES ('$order_quantity','$sum_price','$date','$product_name','$user_email')";
            $order_data = mysqli_query($db_connection, $order_qry);

            if($order_data)
            {
                header('location:user_dashboard.php');
            }
    
        }
        else
        {
            echo "Recharge Your Wallet ..";
        }
            
    }
    else
    {
        echo "Not Enough Stock ..";
    }
           
}

?>



<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body class = "body-user">

        <form method="POST" enctype="multipart/form-data">
        
        <div class="screen-container">

    
            <div class="container-bigpannels">
            <div > <a href = "user_dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">PLACE ORDER</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="product_image">Product Image</label> </div>
            <div class="form-input" >  <img src="<?php echo "Images/".$productImage_name; ?>"width = 150px height = 150px >  </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_name">Product Name</label> </div>
            <div class="form-input">  <?php echo $product_name ?></div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_price">Product Price</label> </div>
            <div class="form-input">  <?php echo $product_price ?> </div>
        </div>


        <div class="form-row-detail">
            <div class="form-label">  <label for="product_quantity">Product Quantity</label> </div>
            <div class="form-input">  <?php echo $product_quanity ?> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="order_quantity">Buying Quantity</label> </div>
            <div class="form-input">  <input type="number" name="order_quantity" reqired> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label"></div>
            <div class="form-input form-buttons">  
                <input type="submit" value="PLACE ORDER" name="save_button">
            </div>
        </div>
        
        </div>
        </div>
        </form>
      
       
    </body>
    
</html>