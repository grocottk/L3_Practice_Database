
<?php

$quick_find = mysqli_real_escape_string($dbconnect, $_POST['quick_search']);

// Subject ID finding
$subject_sql = "SELECT * FROM `subject` WHERE `Subject` LIKE '%$quick_find%'";
$subject_query = mysqli_query($dbconnect, $subject_sql);
$subject_rs = mysqli_fetch_assoc($subject_query);

$subject_count = mysqli_num_rows($subject_query);

if ($subject_count > 0) {
    $subject_ID = $subject_rs['Subject_ID'];
}

else
{
    // If this query is not entered, the below code breaks...
    // ... Also, if the query is set to zero (0), any quote... 
    // ... which has less than three subjects will be displayed.
    $subject_ID = "-1";
}

$find_sql = "SELECT * FROM `quotes`
JOIN author ON (`author`.`Author_ID` = `quotes`.`Author_ID`)
WHERE `Last_Name` LIKE '%$quick_find%'
OR `First_Name` LIKE '%$quick_find%'
OR `Subject_1_ID` = $subject_ID
OR `Subject_2_ID` = $subject_ID
OR `Subject_3_ID` = $subject_ID
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);
$count = mysqli_num_rows($find_query);

?>

<h2>Quick Search Results for the search term <?php echo $quick_find ?></h2>

<?php

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
