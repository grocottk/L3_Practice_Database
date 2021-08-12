<h2>All Results</h2>

<?php

$find_sql = "SELECT * FROM `Quotes`
JOIN Author ON (`Author`.`Author_ID` = `Quotes`.`Author_ID`)
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);

// Loop through results and display them...
do {

    $quote = preg_replace('/[^A-Za-z0-9.,?\s\'\-]/', ' ', $find_rs['Quote']); // From ""[...]useful_code.txt""

    // Author name...
    $first = $find_rs['First_Name'];
    $middle = $find_rs['Middle_Name'];
    $last = $find_rs['Last_Name'];

    $full_name = $first." ".$middle." ".$last;

    ?>
<div class="results">
    <p>
        <?php echo $quote; ?><br />
        <a href="index.php?page=author&Author_ID=<?php echo $find_rs['Author_ID']; ?>">
        <?php echo $full_name; ?>
        </a> <!-- Author name -->
    </p>

    <!-- Subject tags to go here -->
    <p>
        <?php
            $Subject_1_ID = $find_rs['Subject_1_ID'];
            $Subject_2_ID = $find_rs['Subject_2_ID'];
            $Subject_3_ID = $find_rs['Subject_3_ID'];

            $all_subjects = array($Subject_1_ID, $Subject_2_ID, $Subject_3_ID);

            // Loops through the subject IDs and looks for the subject name
            foreach($all_subjects as $subject) {
                // Gets subject name
                $sub_sql = "SELECT * FROM `Subjects` WHERE `Subject_ID` = $subject";
                $sub_query = mysqli_query($dbconnect, $sub_sql);
                $sub_rs = mysqli_fetch_assoc($sub_query);
            } // The end of the subject loop
            ?>
        <!-- Show subjects -->
        <span class="tag">
                <?php echo $sub_rs['Subject']; ?>
        </span>
    </p>
</div>
<br />
<?php

} // End of the do command for display results

while($find_rs = mysqli_fetch_assoc($find_query))

?>
