<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <style>
  .button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none; 
 }
 
.button:hover, .button:focus {
  background: #179b77;
}
  </style>
  
</head>
<body>
<div class="form">
<br><br><br><br><br><br><br>  

  <h1 style="text-align:center;color:red;font-size:50px">Error</h1>
    <p style="text-align:center;font-size:30px">
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: loginmain.php" );
    endif;
    ?>
	<br><br><br>
    </p>     
<p style="text-align:center"><a href="homepage.php" target="_top"><button class="button button-block"/>Home</button></a></p>
</div>
</body>
</html>
