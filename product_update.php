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



if($_SERVER["REQUEST_METHOD"] == "POST")   
{
    $newproductname = $_POST['product_name'];
    $newproductquantity = $_POST['product_quantity'];
    $newproductprice = $_POST['product_price'];
    $newproductcategory = $_POST['product_category'];
    $newproductbrand = $_POST['product_brand'];
    $newproductdetail = $_POST['product_detail'];

    $newproductimage_name = $_FILES['product_image']['name'];
    
    $path = 'Images/'.$newproductimage_name;

    $newproductimage_tempname = $_FILES['product_image']['tmp_name'];
    $productimage_extenstion_temp = explode('.', $newproductimage_name); 
    $productimage_extenstion = $productimage_extenstion_temp[1];

    if($productimage_extenstion == "jpge" or $productimage_extenstion =="jpg" )
    {
        $update_product_qury = ("UPDATE PRODUCT SET product_name = '$newproductname'  ,  
        product_quantity = '$newproductquantity'  ,product_price = '$newproductprice'  ,
        product_category = '$newproductcategory'  ,product_brand = '$newproductbrand'  ,
        product_detail = '$newproductdetail'  , product_image = '$newproductimage_name'
         where product_id = '$uid'");
        
        $run_update_product_qury = mysqli_query($db_connection, $update_product_qury);
        
        if($run_update_product_qury)
        {
            move_uploaded_file($newproductimage_tempname, "Images/".$newproductimage_name);
            header('location:editing_dashboard.php');
        }
    }
    else
    {
        echo "Wrong Extension..";
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
            <div > <a href = "editing_dashboard.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">UPDATE PRODUCT</div>  
            </div>   
            <div class="container-bigpannels">
            
        <div class="form-row-detail">
            <div class="form-label">  <label for="product_name">Poduct Name</label> </div>
            <div class="form-input">  <input type="text" name="product_name" value = <?php echo $temp_productname ?> reqired> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_quantity">Product Quantity</label> </div>
            <div class="form-input">  <input type="number" name="product_quantity" value = <?php echo $temp_productquantity ?> reqired> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_price">Product Price</label> </div>
            <div class="form-input">  <input type="number" name="product_price" value = <?php echo $temp_productprice ?> reqired> </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_category">Product Category</label> </div>
            <div class="form-input">  <select name="product_category" selected = <?php echo $temp_productcategory?>>
                        <?php
                        $i = 1;
                       while($category_fetch = mysqli_fetch_assoc($category_data))
                        { 
                             $temp_categoryname = $category_fetch['category_name'];
                        ?>
                        <option> <?php  echo $temp_categoryname?></option>
                        <?php
                        }
                        ?>
                </select>    
            </div>
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="brand_name">Product Brand</label> </div>
            <div class="form-input">  <select name="brand_name" selected = <?php echo $temp_productbrand?> >
                        <?php
                        while($brand_fetch = mysqli_fetch_assoc($brand_data))
                        { 
                             $temp_brandname = $brand_fetch['brand_name'];
                        ?>
                        <option> <?php  echo $temp_brandname?></option>
                        <?php
                        }
                        ?>
                </select>       
            </div>
        </div>


        <div class="form-row-detail">
            <div class="form-label">  <label for="product_image">Product Image</label> </div>
            <div class="form-input" >  <img src="<?php echo "Images/".$temp_productimage; ?>"width = 100px height = 100px >  <input type="file" name="product_image" > </div>
        
        </div>

        <div class="form-row-detail">
            <div class="form-label">  <label for="product_detail">Product Detail</label> </div>
            <div class="form-input">  <textarea type="text" name="product_detail" value = "<?php echo $temp_productdetail ?>"></textarea> </div>
   
        </div>

        <div class="form-row-detail">
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