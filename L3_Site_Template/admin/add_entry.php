
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

// Executes when submit button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Data retrieved from form
    $quote = mysqli_real_escape_string($dbconnect, $_POST['quote']);

    // Checks that the data is valid

    // Checks that the quote is not blank
    if ($quote == "Please type your quote here") {
        $has_errors = "yes";
        $quote_error = "error-text";
        $quote_field = "form-error";
    }
} // End of submit button if statement

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>

<h1>Add Quote...</h1>

<form autocomplete="off" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/add_entry"); ?>" enctype="multipart/form-data"> <!-- Paritally inspired by "[...]new_quote.php" -->
    
    <!-- Text area for quote -->
    <div class="<?php echo $quote_error; ?>">
        This field can not be blank
    </div>
    <textarea class="add-field <?php echo $quote_field ?>" name="quote" rows="6"><?php echo $quote; ?></textarea>
    <br /><br />
    
    <!-- Button to submit -->
    <p>
        <input type="submit" value="Submit" />
    </p>
    
</form>