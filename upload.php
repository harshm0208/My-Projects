<?php 
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "register");
$name="";
$emailid="";
$idea="";
if (!empty($_POST)) {
        $name = $mysqli->real_escape_string($_POST['name']);
        $emailid = $mysqli->real_escape_string($_POST['emailid']);
        $idea = $mysqli->real_escape_string($_POST['idea']);

                $sql = "INSERT INTO useridea (name, emailid, idea) VALUES ('$name', '$emailid', '$idea')";
        if ($mysqli->query($sql) === true){
            $_SESSION['message'] = "Registration succesful! Added $name to the database!";
            header("location: userw.php");
            }
        else {
               $_SESSION['message'] = 'User could not be added to the database!';
             }
                $mysqli->close();          
            }

?>

<html>


<head>
<title>Upload Ideas</title>
<link rel="stylesheet" href="external.css">
</head>

<body>

<div class="form-style-6">
<h1>Upload Idea</h1>
<form action="" method="post" class="a" target="_top">
<input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>"/>
<input type="email" name="emailid" placeholder="Email Address" value="<?php echo $emailid; ?>"/>
<textarea name="idea" placeholder="Enter your idea" value="<?php echo $idea; ?>"></textarea>
<input type="submit" value="Send" />
</form>
</div>
</body>
</html>

