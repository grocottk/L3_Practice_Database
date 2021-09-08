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
                $sub_sql = "SELECT * FROM `subject` WHERE `Subject_ID` = $subject";
                $sub_query = mysqli_query($dbconnect, $sub_sql);
                $sub_rs = mysqli_fetch_assoc($sub_query);

                if($subject != 0)
                {
            
            ?>
        <!-- Show subjects -->
        <span class="tag">
            <!-- <a href="index.php?page=Subject&Subject_ID=<?php // echo $sub_rs['Subject_ID']; ?>"> -->
            <?php echo $sub_rs['Subject']; ?>
            <!-- </a> -->
        </span> &nbsp;
        <?php
            } // End if subject exists statement
            unset($subject);
            } // The end of the subject loop

        // If the user is logged in, show options to edit and/or delete entries...
        if (isset($_SESSION['admin'])) {
            ?>
        <div class="edit-tools">
            <!-- Add qutoe in link -->
            <a href="index.php?page=../admin/editquote&ID=<?php echo $find_rs['ID']; ?>" title="Edit quote"><i class="fa fa-edit fa-2x"></i></a>
            &nbsp; &nbsp;
            <a href="index.php?page=../admin/deletequote_confirm&ID=<?php echo $find_rs['ID']; ?>" title="Delete quote"><i class="fa fa-trash fa-2x"></i></a>
        </div> <!-- End of edit tools 'div' -->
            <?php
        } // Admin tools if statement
        ?>
    </p>