<?php session_start(); ?>

<html>
<head>
<style>
Body{
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
}iframe.abc3{
	position:relative;
	height:600px;
	width:1500px;
	top:-550px;
	left:0%;
}
</style>
</head>
<body>
<ul>
  <li><a href="upload.php">Upload Ideas</a></li>
  <li><a href="seminar.php">Attend Seminars</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Contests</a>
    <div class="dropdown-content">
      <a href="participate.php">Participate</a>
      <a href="result.php">Check Results</a>
    </div>
<li style="float:right"><a class="active" href="about.php">About us</a></li>>
<li style="float:right"><a class="active" href="homepage.php">Log Out</a></li>>

</ul>
<iframe class="abc" src="idea.php"></iframe>
<iframe class="abc2" src="seminari.php"></iframe>
<iframe class="abc3" src="contest.php"></iframe>
</body>
</html>
