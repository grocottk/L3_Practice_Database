
<?php

// Checks that the user is logged in...
if (isset($_SESSION['admin'])) {

    // Gets authors from database
    $all_authors_sql = "SELECT * FROM `author` ORDER BY `author`.`Last_Name` ASC";
    $all_authors_query = mysqli_query($dbconnect, $all_authors_sql);
    $all_authors_rs = mysqli_fetch_assoc($all_authors_query);

    // Initialises author form
    $first = "";
    $middle = "";
    $last = "";

    // Executes when the below form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Values taken from form
    $author_ID = mysqli_real_escape_string($dbconnect, $_POST['author']);
    $_SESSION['Add_Quote']=$author_ID;
    header('Location: index.php?page=../admin/add_entry');

    } // End of submit button push if statement

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
        <select name="author">
            <!-- Default option is new author -->
            <option value="unknown" selected>New Author</option>
            <?php
            do {
                // Gets author's full name (last name, then first name)
                $author_full = $all_authors_rs['Last_Name'].", ".$all_authors_rs['First_Name']." ".$all_authors_rs['Middle_Name'];
            ?>
            <option value="<?php echo $all_authors_rs['Author_ID']; ?>">
                <?php echo $author_full; ?>
            </option>
            <?php
            } // End of author options do statement

            while($all_authors_rs=mysqli_fetch_assoc($all_authors_query))
            ?>
        </select>
        &nbsp;
        <input class="short" type="submit" name="quote_author" value="Next..." />
    </div>
</form>
&nbsp;