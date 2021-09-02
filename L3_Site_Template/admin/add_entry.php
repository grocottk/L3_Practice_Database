
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {
    echo "you are logged in";

    $author_ID = $_SESSION['Add_Quote'];
    echo "Author_ID: ".$author_ID;

    // Get subject and/or topic list from database
    $all_tags_sql = "SELECT * FROM `subject` ORDER BY `subject`.`Subject` ASC";
    $all_subjects = autocomplete_list($dbconnect, $all_tags_sql, 'Subject');

    // Initialise form variables for quote
    $quote = "Please type your quote here";
    $notes = "";
    $tag_1 = "";
    $tag_2 = "";
    $tag_3 = "";

// Initialise tag IDs
$tag_1_ID = $tag_2_ID = $tag_3_ID = 0;

$has_errors = "no";

// Set up error fields and/or visibility
$quote_error = $tag_1_error = "no-error";
$quote_field = "form-ok";
$tag_1_field = "tag-ok";

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>

<h1>Add Quote...</h1>

<form>

</form>