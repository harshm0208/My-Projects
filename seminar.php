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
        $seminar = $mysqli->real_escape_string($_POST['seminar']);

                $sql = "INSERT INTO seminar (name, emailid, seminar) VALUES ('$name', '$emailid', '$seminar')";
        if ($mysqli->query($sql) === true){
            $_SESSION['message'] = "Registration succesful! Added $name to the database!";
            
            }
             


			
        $to      = $emailid;
        $subject = 'Seminar on '.$seminar.'';
        $message_body = '
		Hello '.$name.',

        You have succesfully registered for seminar on '.$seminar.' 

        Please click this link to view details of seminar:
		https://ves.ac.in/';
        mail($to, $subject, $message_body);

        header("location: userw.php");
}
		$mysqli->close();          
?>

<html>


<head>
<title>Attend Seminar</title>
<link rel="stylesheet" href="external.css">
</head>

<body>

<div class="form-style-6">
<h1>Attend Seminar</h1>
<form action="" method="post" class="a">

<input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>"/>
<input type="email" name="emailid" placeholder="Email Address" value="<?php echo $emailid; ?>"/>
<label>Select a seminar</label><br><br>
<select id="seminar" name="seminar">

  <option value="Cost optimization">Cost optimization</option>
  <option value="Selecting an idea">Selecting an idea</option>
  <option value="Finding an investor">Finding an investor</option>
  </select>
  <input type="submit" value="Send" />
</form>
</div>
</body>
</html>

