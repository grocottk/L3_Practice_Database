
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {
    echo "you are logged in";

    // Gets authors from database
    $all_authors_sql = "SELECT * FROM `author` ORDER BY `author`.`Last_Name` ASC";
    $all_authors_query = mysqli_query($dbconnect, $all_authors_sql);
    $all_authors_rs = mysqli_fetch_assoc($all_authors_query);

    // Initialises author form
    $first = "";
    $middle = "";
    $last = "";

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>

<h1>Add a quote</h1>
<p><i>
    To add a quote, first select the author, then press the 'next' button.
</i></p>

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/new_quote");?>"> <!-- Sourced from support files (possibly originally from W3 Schools) -->
    <div>
        <b>Quote Author:</b> &nbsp;
    </div>
</form>