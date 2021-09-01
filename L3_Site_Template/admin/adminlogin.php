<?php

if(isset($_REQUEST['login'])) {

    // Gets the username from the form
    $username = $_REQUEST['username'];

    $options = ['cost' => 9,];

    // Gets username and hashed password from database
    $login_sql="SELECT * FROM `users` WHERE `username` = '$username'";
    $login_query=mysqli_query($dbconnect,$login_sql);
    $login_rs = mysqli_fetch_assoc($login_query);

// Hash password and compare with password in database
if(password_verify($_REQUEST['password'] ,$login_rs['password'])) {
    
    // Password Matches
    echo 'Password is valid:';
    $_SESSION['admin']=$login_rs['username'];
    header("Location: index.php?page=../admin/new_quote");

} // Ends valid password if statement

// Invalid Password
else {
    echo 'Invalid password.';
    unset($_SESSION);
    $login_error = "Incorrect username and/or password";
    header("Location: index.php?page=../admin/login&error=$login_error");
}

} // End of isset login if statement

?>