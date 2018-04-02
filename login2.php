<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<html>
<head>

	<link rel="stylesheet" href="login.css">
  </head>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

        require 'invlogin.php';
        
    }
?>

  <body>
<font align="center">
   
          <h1>Investor Login </h1>
          
          <form action="login2.php" method="post" autocomplete="off" target="_top">
          

<h3>              Email Address<span class="req">*</span>
            </h3>
            <input type="text" required autocomplete="off" name="emailid"/>
          
            <h3>
              Password<span class="req">*</span>
            </h3>
            <input type="password" required autocomplete="off" name="password"/>
          <br>
		  <br>
                    
          <button  name="login" />Log In</button>
          
          </form>

</body>
</html>