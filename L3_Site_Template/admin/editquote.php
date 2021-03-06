
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {

    // Finds ID
    $ID = $_REQUEST['ID'];

    // Gets author ID
    $find_sql = "SELECT * FROM `quotes`
    JOIN author ON (`author`.`Author_ID` = `quotes`.`Author_ID`) WHERE `quotes`.`ID` = $ID
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);

    // Finds author ID
    $author_ID = $find_rs['Author_ID'];
    $first = $find_rs['First_Name'];
    $middle = $find_rs['Middle_Name'];
    $last = $find_rs['Last_Name'];

    $current_author = $last.", ".$first." ".$middle;

    // Get subject and/or topic list from database
    $all_tags_sql = "SELECT * FROM `subject` ORDER BY `subject`.`Subject` ASC";
    $all_subjects = autocomplete_list($dbconnect, $all_tags_sql, 'Subject');

    // Initialise form variables for quote
    $quote = $find_rs['Quote'];
    $notes = $find_rs['Notes'];

    // Get Subjects to populate tags...
    $subjectID_1 = $find_rs['Subject_1_ID'];
    $subjectID_2 = $find_rs['Subject_2_ID'];
    $subjectID_3 = $find_rs['Subject_3_ID'];

    // Set subject tags to blank at the start...
    $tag_1 = $tag_2 = $tag_3 = "";

    // Find subject names from subject table...
    $tag_1_rs = get_rs($dbconnect, "SELECT * FROM `subject` WHERE Subject_ID = $subjectID_1");
    $tag_1 = $tag_1_rs['Subject'];

    // Reccomended addition from GC, which checks for subject tags, helping to avoid errors...

    if ($subjectID_2 > 0)
    {
    $tag_2_rs = get_rs($dbconnect, "SELECT * FROM `subject` WHERE Subject_ID = $subjectID_2");
    $tag_2 = $tag_2_rs['Subject'];
    };

    if ($subjectID_3 > 0)
    {
    $tag_3_rs = get_rs($dbconnect, "SELECT * FROM `subject` WHERE Subject_ID = $subjectID_3");
    $tag_3 = $tag_3_rs['Subject'];
    };

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
    // $author_ID = mysqli_real_escape_string($dbconnect, $_POST['Author_ID']);
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

        // Edits database entry
        $editentry_sql = "UPDATE `quotes` SET `Author_ID` = '$author_ID', `Quote` = '$quote', `Notes` = '$notes', `Subject_1_ID` = '$subjectID_1', `Subject_2_ID` = '$subjectID_2', `Subject_3_ID` = '$subjectID_3' WHERE `quotes`.`ID` = $ID;";
        $editentry_query = mysqli_query($dbconnect, $editentry_sql);

        // Finds the quote ID for next page
        $get_quote_sql = "SELECT * FROM `quotes` WHERE `Quote` = '$quote'";
        $get_quote_query = mysqli_query($dbconnect, $get_quote_sql);
        $get_quote_rs = mysqli_fetch_assoc($get_quote_query);

        $quote_ID = $get_quote_rs['ID'];

        // Go to success page...
        header('Location: index.php?page=editquote_success&quote_ID='.$quote_ID);

    } // End of add entry to database if statment

} // End of submit button if statement

} // End of user logged in if statement

else {
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
} // End of user logged in else statement

?>

<h1>Edit Quote...</h1>

<form autocomplete="off" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/editquote&ID=$ID"); ?>" enctype="multipart/form-data"> <!-- Paritally inspired by "[...]new_quote.php" -->
        <select class="adv gender" name="author">
            <!-- Default option is new author -->
            <option value="<?php echo $author_ID; ?>" selected>
                <?php echo $current_author; ?>
            </option>
            <?php

        // Get authors from database
        $all_authors_sql = "SELECT * FROM `author` ORDER BY `Last_Name` ASC";
        $all_authors_query = mysqli_query($dbconnect, $all_authors_sql);
        $all_authors_rs = mysqli_fetch_assoc($all_authors_query);

            do {
            $author_ID = $all_authors_rs['Author_ID'];
            $first = $all_authors_rs['First_Name'];
            $middle = $all_authors_rs['Middle_Name'];
            $last = $all_authors_rs['Last_Name'];
            $author_full = $last.", ".$first." ".$middle;
            ?>
            <option value="<?php echo $author_ID; ?>">
                <?php echo $author_full; ?>
            </option>
            <?php
            } // End of author options do statement

            while($all_authors_rs=mysqli_fetch_assoc($all_authors_query))
            ?>
        </select>

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
        <input class="<?php echo $tag_1_field; ?>" id="subject1" type="text" name="Subject_1" placeholder="Subject 1 (start typing)..." value="<?php echo $tag_1; ?>">
    </div>

    <br /><br />

    <div class="autocomplete">
        <input id="subject2" type="text" name="Subject_2" placeholder="Subject 2 (start typing, optional)..." value="<?php echo $tag_2; ?>">
    </div>

    <br /><br />

    <div class="autocomplete">
        <input id="subject3" type="text" name="Subject_3" placeholder="Subject 3 (start typing, optional)..." value="<?php echo $tag_3; ?>">
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