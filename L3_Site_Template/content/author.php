<?php

if(!isset($_REQUEST['Author_ID'])) {
    header('Location: index.php');
}

$author_to_find = $_REQUEST['Author_ID'];

$find_sql = "SELECT * FROM `Quotes`
JOIN Author ON (`Author`.`Author_ID` = `Quotes`.`Author_ID`) WHERE `Quotes`.`Author_ID` = $author_to_find
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);

$country_1 = $find_rs['Country_1_ID'];
$country_2 = $find_rs['Country_2_ID'];

$job_1 = $find_rs['Job_1_ID'];
$job_2 = $find_rs['Job_2_ID'];

include("get_author.php"); // Gets author name

?>
<br />
<div class="about">
    <h2>
        <?php echo $full_name ?> - About
    </h2>
    <p><b>Born:</b> <?php echo $find_rs['Born']; ?> </p>
    <p> <?php // Show countries...
    country_job($dbconnect, $country_1, $country_2, "Country", "Countries", "Countries", "Country_ID", "Country")
    ?> </p> <!-- <br /> <br /> <br /> -->
    <p> <?php // Show jobs...
    country_job($dbconnect, $job_1, $job_2, "Job", "Jobs", "Career", "Job_ID", "Job")
    ?> </p>
</div> <!-- End of about the author div and/or segment -->
<br />
<?php

// Loop through results and display them...
do {
    $quote = preg_replace('/[^A-Za-z0-9.,?\s\'\-]/', ' ', $find_rs['Quote']); // From ""[...]useful_code.txt""
    ?>
<div class="results">
    <p>
        <?php echo $quote; ?><br />
    </p>
    <?php include("show_subjects.php"); ?>
</div>
<br />
<?php
} // End of the do command for display results

while($find_rs = mysqli_fetch_assoc($find_query))
?>
