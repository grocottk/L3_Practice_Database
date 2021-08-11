<h2>All Results</h2>

<?php

$find_sql = "SELECT * FROM `Quotes`
JOIN Author ON (`Author`.`Author_ID` = `Quotes`.`Author_ID`)
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);

?>