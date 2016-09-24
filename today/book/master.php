<?php
session_start();
if (isset($_SESSION["userid"])) {
	//session_destr\oy();
	$as=$_SESSION['userid'];
	//echo $as;
}
else{
	session_destroy();
	header("Location:http://localhost/today/book");
	exit();
}


?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Station master </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Auto Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- start menu -->
</head>
<body>
	<div class="men_banner">
   	  <div class="container">
   	  	<div class="navbar-header">
   		<div class="logo">
			<h2 style="color:white;">Ticket master portal</h2>
		</div>
	   <div class="navg">	   	 
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	       </div>
	      </div>
	       <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	       </ul>
		        	       
		        <li><a class="last-nav" href="logout.php" >Logout</a></li>
	        </ul>
		   </div>
		  </div>
	     <div class="clearfix"> </div>
	    </div>
   <div class="container">
   	  <div class="page-not-found">
	    

	   
	    <marque>

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Accathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

				$sql = "SELECT * FROM `tb_stn_mastr` where `tb_stn_mastr_id`=$as";

       
       $result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Welcome Station Master ".$row["tb_stn_mastr_fname"];
        //echo $as;
    }
    
} else {
    echo "0 results";
}
$conn->close();
?>
	    	
	    </marque>



	    <div>
	    	<h3> todays info </h3>
	    	<form method="post" action="#">
	    	<input type="date" name="dater" >
	    	<input type="submit"  name="submit">


	    </div>


	 <?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Accathon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

				$sql ="select count(tick_id) , sum(tick_price)from `tb_ticket` where tick_stn_from=1 and tick_date= CURDATE()";;

       
       $result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " number of tickets  :: ".$row["count(tick_id)"]."  total price of all the tickets :".$row["sum(tick_price)"];
        //echo $as;
    }
    
} else {
    echo "0 results";
}
$conn->close();
?>

	   <!-- echo "<tr><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td></tr>";  -->

      </div>
   </div>
   <div class="footer">
   	 <div class="container">
   		<div class="cssmenu">
				
		</div>
		<ul class="social">
			<li><a href=""> <i class="instagram"> </i> </a></li>
			<li><a href=""><i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
	    </ul>
	    <div class="clearfix"> </div>
	    <div class="copy">
           <p>&copy; 2016 Auto Show.All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	    </div>
   	</div>
   </div>
</body>
</html>		