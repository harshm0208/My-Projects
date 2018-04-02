<?php session_start(); ?>

<html>
<head>
<style>
body{
	background-image:url("1.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
	
}
html{
    margin: 0;
    padding: 0;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.active {
    background-color: #4CAF50;
}
iframe.abc{
position:relative;
	height:600px;
	width:750px;
	top:10px;
	left:0%;
}
iframe.abc2{
position:relative;
	height:600px;
	width:750px;
	top:-600px;
	left:51%;
}iframe.iframe1{
	position:relative;
	height:600px;
	width:100%;
	top:50px;
	left:0%;
}
</style>
</head>
<body>
<ul>
  <li><a href="select.php" target="iframe1">Select Idea</a></li>
  <li><a href="result.php" target="iframe1">Check contest results</a></li>
    </div>
<li style="float:right"><a class="active" href="about.php">About us</a></li>>
<li style="float:right"><a class="active" href="homepage.php">Log Out</a></li>>

</ul>
<iframe name="iframe1" class="iframe1" src=""></iframe>

</body>
</html>
