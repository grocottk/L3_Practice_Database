
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {
    echo "you are logged in";
    
    $quote_ID = $_REQUEST['ID'];

    $deletequote_sql = "SELECT * FROM `quotes` WHERE `ID` =".$_REQUEST['ID'];
    $deletequote_query = mysqli_query($dbconnect, $deletequote_sql);
    $deletequote_rs = mysqli_fetch_assoc($deletequote_query);

    ?>

<h2>Quote Deletion Confirmation</h2>

<p>Can you confirm that you want to delete the following quote:<br /><i><?php echo $deletequote_rs['Quote']; ?></i></p>

<p>
    <a href="index.php?page=../admin/deletequote&ID=<?php echo $_REQUEST['ID']; ?>">Yes, Delete it</a>
    <a href="index.php">No, take me to the home page</a>
</p>

<?php

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>