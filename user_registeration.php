<?php
    static $login = false;
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
<body class = "body-user">

            <div class="screen-container">           
                <div class="container">
                <div > <a href = "index.php"> <input class="close-button" value="X"> </a> </div>
                <div class="popup-banner-text">WELCOME USER!</div>  
                </div>   

                <div class="container-bigbutton">
                    <div ><a href="user_register.php"> <input class="big-button-user" type="button" value="USER REGISTER" /> </a>
                    <a href="user_login.php"> <input class="big-button-user" type="button" value="USER LOGIN" /> </a> </div>
                </div>
            </div>
</body>

</html>