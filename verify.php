<?php 
$mysqli = new mysqli("localhost", "root", "", "register");
$username=$_GET['username'];
$code=$_GET['code'];

$query1="SELECT * FROM users WHERE username='$username'";
$result=$mysqli->query($query1) or die($mysqli->error);

while($row=$result -> fetch_assoc())
	$db_code=$row['confirm-code'];

if($code==$db_code)
{
	$mysqli->query("UPDATE users SET confirmed='1',`confirm-code`='0' WHERE username='$username'") or die($mysqli->error);
	header("location: verified.php");
	
}
else
{
	echo "Error";
}
?> 