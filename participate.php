<?php 
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "register");
$name="";
$emailid="";

if (!empty($_POST)) {
        $name = $mysqli->real_escape_string($_POST['name']);
        $emailid = $mysqli->real_escape_string($_POST['emailid']);

                $sql = "INSERT INTO contest (name, emailid) VALUES ('$name', '$emailid')";
        if ($mysqli->query($sql) === true){
            $_SESSION['message'] = "Registration succesful! Added $name to the database!";
            header("location: userw.php");
            }
			
        $to      = $emailid;
        $subject = 'Contest registration';
        $message_body = '
		Hello '.$name.',

        You have succesfully registered for our annual contest 

        Stay tuned for further details';
		
        mail($to, $subject, $message_body);

        header("location: userw.php");
}
		$mysqli->close();          

?>

<html>


<head>
<title>Participate in contest</title>
<link rel="stylesheet" href="external2.css">
</head>

<body>

<div class="form-style-6">
<h1>Participate in contest</h1>
<form action="" method="post" class="a">
<input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>"/ required>
<input type="email" name="emailid" placeholder="Email Address" value="<?php echo $emailid; ?>"/ required>
<input type="submit" value="Register" />
</form>
</div>
</body>
</html>

