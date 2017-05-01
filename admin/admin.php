<?php
	session_start();
	if($_SESSION['level']==2)
	{
		header("location:list_user.php");
		echo "Xin chào admin ! Ready to serve !";
		echo "</br>";
		echo "<a href='../logout.php'>LogOut</a>";
	}
	else
	{
		header("location:../index.php");
		exit();
	}
?>