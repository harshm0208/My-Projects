<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "register");
$username="";
$emailid="";
$password="";
$password1="";
$password2="";
$dob="";
$state="";
$address="";
$qualification="";
$number="";
//the form has been submitted with post

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['password2']) {
        //set all the post variables
        $username = $mysqli->real_escape_string($_POST['username']);
        $emailid = $mysqli->real_escape_string($_POST['emailid']);
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$state = $mysqli->real_escape_string($_POST['state']);
        $dob = $mysqli->real_escape_string($_POST['dob']);
        $number = $mysqli->real_escape_string($_POST['number']);
        $address = $mysqli->real_escape_string($_POST['address']);
        $qualification = $mysqli->real_escape_string($_POST['qualification']);
        
        
                $_SESSION['username'] = $username;
          $check=mysqli_query($mysqli,"select * from users where emailid='$emailid'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
	   echo "User exists";
   } 
		else{
		$confirmcode = rand();
                //insert user data into database
                $sql = "INSERT INTO users VALUES ('$username', '$emailid', '$password','$number','$dob','$address','$state','$qualification','0','$confirmcode')";
                
				$message1="Welcome to Startup Management. 
				Click the link below to verify your account
				http://localhost/WT MINI PROJECT/verify.php?username=$username&code=$confirmcode";
                mail($emailid,"Confirm email",$message1);
				
				
				if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: loginmain.php");
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
            }
	}
			else{$message = "Passwords do not match";
echo "<script type='text/javascript'>alert('$message');</script>";}
    }

?>

<html>
<head>
<title> User Profile </title>
<link rel="stylesheet" href="e1.css">
<style>
body {
    background-image: url("bg.jpg");
	background-size: 100% 100%;
   
}</style>
<script>

function ValidateForm() {
var username = document.validate.username; 
var emailid = document.validate.emailid; 
var number = document.validate.number; 
var dob = document.validate.dob;
var pass = document.validate.password; 
var address = document.validate.address; 
var state = document.validate.state;
var cb = document.validate.cb;
var qualification = document.validate.qualification;

if (username.value == "") 
{
alert("Please enter your name.");
 username.focus();
 return false; 
} 
if (emailid.value == "") 
{ 
window.alert("Please enter a valid e-mail address.");
 
return false; 
} 
if (emailid.value.indexOf("@", 0) < 0)
 { 
window.alert("Please enter a valid e-mail address."); 
 
return false; 
} 
if (emailid.value.indexOf(".", 0) < 0)
 {
 window.alert("Please enter a valid e-mail address.");
 
 return false; 
} 
if (pass.value == "") 
{ 
window.alert("Please enter a valid password.");
 
return false; 
}

if (number.value == "") 
{
window.alert("Please enter a valid mobile number.");
 return false; 
} 



if (address.value == "") 
{
window.alert("Please enter your address.");
 
 return false; 
} 
if(state.selectedIndex < 1)
{
alert("Please select state"); 

 return false; 
}
if(qualification.selectedIndex < 1)
{
alert("Please select qualification"); 

 return false; 
}
if (cb.checked == false) 
{ 
alert("Please accept terms and conditions"); 

 return false; 
} 
return true;
}
</script>

</head>

<body>
<font align="center">
<h1> Create User Account </h1>

<form name="validate" method="post" onsubmit="return ValidateForm()" action="user.php" target="_top">
   
  <p> Username: </p>
  <input type="text" name="username" value="<?php echo $username; ?>"><br>
  <p> Email id: </p>
  <input type="text" name="emailid" value="<?php echo $emailid; ?>"><br>
 <p> Password: </p>
  <input type="password" name="password" value=""><br>
   <p> Confirm Password: </p>
  <input type="password" name="password2" value=""><br>
<p> Date of birth: </p>
  <input type="date" name="dob" min="1980-01-01" value="<?php echo $dob; ?>"><br>
<p> Mobile number: </p>
  <input type="text" name="number" value="<?php echo $number; ?>"><br>
  <p>Address: </p>
 <input type="text" name="address" value="<?php echo $address; ?>">
  <br><br>
<p>State: </p>
<select name="state" value="<?php echo $username; ?>">
  <option value="empty"></option>
  <option value="Maharashtra">Maharashtra</option>
  <option value="New Delhi">New Delhi</option>
  <option value="Gujarat">Gujarat</option>
<option value="Punjab">Punjab</option>
  <option value="Goa">Goa</option>
 </select>
<br><br>
<p>Qualification: </p>
<select name="qualification" value="<?php echo $username; ?>">
  <option value="empty"></option>
  <option value="12th pass">12th pass</option>
  <option value="B.E">B.E</option>
  <option value="S.E">S.E</option>
<option value="T.E">T.E</option>
  <option value="Graduated">Graduated</option>
 </select>
<br><br>
<p><input type="checkbox" name="cb">I accept the terms and conditions <br></p>
  <br>
  
  <input type="submit" value="Submit" name="submit">
  <input type="reset">
</form>


</body>
</html>




