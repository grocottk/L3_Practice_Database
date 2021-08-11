<!DOCTYPE HTML>

<?php

session_start();
include("config.php");
include("functions.php");

// Connect to database...
$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_errno()) {
    echo "Connection failed:".mysqli_connect_error();
    exit;
} // Checking for issues

?>

<html lang="en">

<?php include("content/head.php"); ?>
    
<body>
    
    <div class="wrapper">

            <?php include("content/heading_navigation.php") ?>
        
        <div class="box main">

            <?php

            if(!isset($_REQUEST['page'])) {
                include("content/home.php");
            } // This is the end that includes the home page

            else {
                // This prevents users from navigating through [a] file system
                $page=preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']);
                include("content/$page.php");
            } // This is the end that includes the user's requested content

            ?>
                    
        </div>    <!-- / main -->
        
        <?php include("content/footer.php"); ?>
    
    </div>  <!-- / wrapper  -->
    
</body>
