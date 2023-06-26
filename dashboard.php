<?php
include 'Backend/connection.php';

session_start();

if(!isset($_SESSION["login"]))
{
header("location: store_login.php");
exit();
}



$storeEmail = $_SESSION["login"];
print_r($storeEmail);
$store_qry = "SELECT * from store where store_email = '$storeEmail'" ;
$store_data = mysqli_query($db_connection, $store_qry);
$store_fetch = mysqli_fetch_assoc($store_data);
$storeWallet = $store_fetch['store_wallet'];



?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <h2>L1S21BSSE0042</h2>
    <h2>MIR FAHAD HASSAN</h2>
            <div class="screen-container">           
           
            <div class ="cash-bar-store"> Wallet <br> <?php echo $storeWallet ?>$ </div>
            
            
            
            <div class="container-widepannels">
                <a href = "store_logout.php"> <input type="button" class="logout-button"  value="Logout"> </a>
                </div> 
                  
                <div class="container-widepannels">
                    <div class="popup-banner-text">STORE ADMIN PANNEL</div>  
                </div>   

                <div class="container-widepannels">
                    <div ><a href="category_new.php"> <input class="wide-button" type="button" value="Add Category" /> </a></div>
            
                </div>
                <div class="container-widepannels">
                    <div ><a href="brand_new.php"> <input class="wide-button" type="button" value="Add Brand" /> </a></div>
                 
                </div>
                <div class="container-widepannels">
                    <div ><a href="product_new.php"> <input class="wide-button" type="button" value="Add Product" /> </a></div>
                </div>
                
                <div class="container-widepannels">
                    <div ><a href="editing_dashboard.php"> <input class="wide-button-blue" type="button" value="Editing Dashboard" /> </a></div>
                </div>

                <div class="container-widepannels">
                    <div ><a href="store_myorders.php"> <input class="wide-button-orange" type="button" value="Orders" /> </a></div>
                </div>


            </div>
</body>

</html>