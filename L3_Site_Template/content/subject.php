
<!-- Much of this file is recycled from "[...]quick_search.php" -->

<?php

$subject_to_find = $_REQUEST['subjectID'];

// Subject ID finding
$subject_sql = "SELECT * FROM `subject` WHERE `Subject_ID` = $subject_to_find";
$subject_query = mysqli_query($dbconnect, $subject_sql);
$subject_rs = mysqli_fetch_assoc($subject_query);

?>

<h2>Subject Results (<?php echo $subject_rs['Subject']?>)</h2>

<?php

// Get quotes (Partially from "[...]quick_search.php")
$find_sql = "SELECT * FROM `quotes`
JOIN author ON (`author`.`Author_ID` = `quotes`.`Author_ID`)
WHERE `Subject_1_ID` = $subject_to_find
OR `Subject_2_ID` = $subject_to_find
OR `Subject_3_ID` = $subject_to_find
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);

if($count > 0) {

// Loop through results and display them...
do {
    $quote = preg_replace('/[^A-Za-z0-9.,?\s\'\-]/', ' ', $find_rs['Quote']); // From ""[...]useful_code.txt""
    include("get_author.php");
    ?>
<div class="results">
    <p>
        <?php echo $quote; ?><br />
        <!-- Displays author name -->
        <a href="index.php?page=author&Author_ID=<?php echo $find_rs['Author_ID']; ?>">
        <?php echo $full_name; ?>
        </a> <!-- Author name -->
    </p>
    <?php include("show_subjects.php"); ?>
</div>
<br />
<?php

} // End of the do command for display results

while($find_rs = mysqli_fetch_assoc($find_query));
    } // Ends if results exist

else {
    // If no results exist, display an error
?>

<h2>Sorry, no results to show</h2>
    <div class="error">
        Sorry, there are no quotes that match the search term <i><b><?php echo $quick_find ?></b></i>. Please try again.
    </div>
<p>&nbsp;</p>

<?php
}
?>
