<h2>All Results</h2>

<?php

$find_sql = "SELECT * FROM `Quotes`
JOIN author ON (`author`.`Author_ID` = `quotes`.`Author_ID`) ORDER BY `quotes`.`ID` ASC
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);

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

while($find_rs = mysqli_fetch_assoc($find_query))

?>
