
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
    $notes = mysqli_real_escape_string($dbconnect, $_POST['notes']);
    $tag_1 = mysqli_real_escape_string($dbconnect, $_POST['Subject_1']);
    $tag_2 = mysqli_real_escape_string($dbconnect, $_POST['Subject_2']);
    $tag_3 = mysqli_real_escape_string($dbconnect, $_POST['Subject_3']);

    // Checks that the data is valid

    // Checks that the quote is not blank
    if ($quote == "Please type your quote here") {
        $has_errors = "yes";
        $quote_error = "error-text";
        $quote_field = "form-error";
    }

    // Checks that the first subject has been filled in
    if ($tag_1 == "") {
        $has_errors = "yes";
        $tag_1_error = "error-text";
        $tag_1_field = "tag-error";
    }

    if($has_errors != "yes") {
        // Gets subject IDs from the get_ID function...
        $subjectID_1 = get_ID($dbconnect, 'subject', 'Subject_ID', 'Subject', $tag_1);
        $subjectID_2 = get_ID($dbconnect, 'subject', 'Subject_ID', 'Subject', $tag_2);
        $subjectID_3 = get_ID($dbconnect, 'subject', 'Subject_ID', 'Subject', $tag_3);

        // Adds entry to the database
        $addentry_sql = "INSERT INTO `quotes` (`ID`, `Author_ID`, `Quote`, `Notes`, `Subject_1_ID`, `Subject_2_ID`, `Subject_3_ID`) VALUES (NULL, '$author_ID', '$quote', '$notes', '$subjectID_1', '$subjectID_2', '$subjectID_3');";
        $addentry_query = mysqli_query($dbconnect, $addentry_sql);

        // Finds the quote ID for next page
        $get_quote_sql = "SELECT * FROM `quotes` WHERE `Quote` = '$quote'";
        $get_quote_query = mysqli_query($dbconnect, $get_quote_sql);
        $get_quote_rs = mysqli_fetch_assoc($get_quote_query);

        $quote_ID = $get_quote_rs['ID'];
        $_SESSION['Quote_Success']=$quote_ID;

        // Directions to success page...
        header('Location: index.php?page=quote_success');

    } // End of add entry to database if statment

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

        <input class="add-field <?php echo $notes; ?>" type="text" name="notes" value="<?php echo $notes; ?>" placeholder="Notes (optional)..."/>
    
    <br /> <br />

    <div class="<?php echo $tag_1_error ?>">
        Please enter one subject tag at minimum
    </div>

    <div class="autocomplete">
        <input class="<?php echo $tag_1_field; ?>" id="subject1" type="text" name="Subject_1" placeholder="Subject 1 (start typing)...">
    </div>

    <br /><br />

    <div class="autocomplete">
        <input id="subject2" type="text" name="Subject_2" placeholder="Subject 2 (start typing, optional)...">
    </div>

    <br /><br />

    <div class="autocomplete">
        <input id="subject3" type="text" name="Subject_3" placeholder="Subject 3 (start typing, optional)...">
    </div>

    <br /><br />

    <!-- Button to submit -->
    <p>
        <input type="submit" value="Submit" />
    </p>
    
</form>

<!-- Script to allow autocomplete to function -->
<script>
    <?php include("autocomplete.php"); ?>

    /* Arrays that contain lists */
    var all_tags = <?php print("$all_subjects"); ?>;
    autocomplete(document.getElementById("subject1"), all_tags);
    autocomplete(document.getElementById("subject2"), all_tags);
    autocomplete(document.getElementById("subject3"), all_tags);

</script>