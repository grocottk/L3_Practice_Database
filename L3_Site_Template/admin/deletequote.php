
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {
    echo "you are logged in";

    // Quote deleting (inspired by "[...]deletequote_confirm.php")
    $deletequote_sql = "DELETE FROM `quotes` WHERE `quotes`.`ID` =".$_REQUEST['ID'];
    $deletequote_query = mysqli_query($dbconnect, $deletequote_sql);

?>

<h1>Delete Success</h1>

<p>The quote has been deleted</p>

<?php

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>