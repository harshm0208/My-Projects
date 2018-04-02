<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "register");
$name="";
$emailid="";
$idea="";
$time="";
$place="";
$userid="";
$result2="";
$result1="";
$usern="";
if (!empty($_POST)) {
        $name = $mysqli->real_escape_string($_POST['name']);
        $emailid = $mysqli->real_escape_string($_POST['emailid']);
        $idea = $mysqli->real_escape_string($_POST['idea']);
        $time = $mysqli->real_escape_string($_POST['time']);
        $place = $mysqli->real_escape_string($_POST['place']);

                $sql = "INSERT INTO selected1 (name, emailid, idea, time, place) VALUES ('$name', '$emailid', '$idea','$time','$place')";
        if ($mysqli->query($sql) === true){
            $_SESSION['message'] = "Registration succesful! Added $name to the database!";
            
            }
             

$sql1="select name from useridea where idea='$idea'";
$result1 = $mysqli->query($sql1);

while($row=$result1 -> fetch_assoc())
	$name1=$row['name'];			
        $to = $emailid;
        $subject = 'Interview Set';
        $message_body = '
		Interview set on '.$time.' with '.$name1.' at '.$place.'
		Idea :'.$idea.'' ;
		mail($to, $subject, $message_body);


$sql="select emailid from useridea where idea='$idea'";
$result = $mysqli->query($sql);
while($row=$result -> fetch_assoc())
	$eid=$row['emailid'];

        $to = $eid;
        $subject = 'Congratulations';
        $message_body = '
		Interview set on '.$time.'  at '.$place.' with '.$name.'
		Idea :'.$idea.'' ;
		mail($to, $subject, $message_body);

        header("location: investorw.php");
}
		$mysqli->close();          

?>
<html>
<head>

<link rel="stylesheet" href="external.css">
</head>
<body>

<div class="form-style-6">
<h1>Select Idea</h1>
<form action="" method="post" class="a" target="_top">


<input type="text" name="name" placeholder="Your Name" />
<input type="email" name="emailid" placeholder="Email Address" />
<label>Select an idea</label><br><br>

<?php
$mysqli = new mysqli("localhost", "root", "", "register");

 $sql1 = "SELECT idea FROM useridea";
$result = $mysqli->query($sql1);

echo "<select name='idea'>";
while ($row = $result->fetch_assoc()) {
   echo '<option value="'.$row['idea'].'">'.$row['idea'].'</option>';
}
echo "</select>";
?>
<input type="text" name="time" placeholder="Interview Time" />
<input type="text" name="place" placeholder="Interview location" />


  <input type="submit" value="Send" />
</form>
</body>
</html>
