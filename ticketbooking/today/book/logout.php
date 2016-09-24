<?php
session_start();
session_destroy();
header("Location:http://localhost/ticketbooking/today/book");
	exit();


?>