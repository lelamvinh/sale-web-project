<?php
	$servername="localhost";
	$user="root";
	$pass="";
	$dbname="webdemo";

	$conn=new mysqli($servername,$user,$pass,$dbname);

	if($conn->connect_error){
		die($conn->connect_error);
	}

?>