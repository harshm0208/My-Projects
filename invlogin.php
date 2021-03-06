<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$emailid = $mysqli->escape_string($_POST['emailid']);
$result = $mysqli->query("SELECT * FROM investors WHERE emailid='$emailid'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
	if($user['confirmed']==1)
	{
    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['emailid'] = $user['emailid'];
        $_SESSION['username'] = $user['username'];
       
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: investorw.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
	}
	else{$_SESSION['message'] = "Please verify Email Id";
        header("location: error.php");
    }
}
mysqli_close();
?>