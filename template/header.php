<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="template/style.css">
</head>
<body>
	<div class="register">
	<?php
	if(isset($_SESSION['username']))
	{
		echo "Welcome ".$_SESSION["username"].", <a href='logout.php'>(logout)</a>";
	}
	else
	{
		echo "<a href='login.php' id='login' style='border-right: 2px dashed #999;padding-right: 5px;'>Login</a>";
		echo "<a href='register.php' id='dangky'>Register</a>";
	}
	?>
	</div>

	<script type="text/javascript">
		function hide_dangky()
		{
			document.getElementById("dangky").style.display="none";
		}
		function hide_login()
		{
			document.getElementById("login").style.display="none";
		}
	</script>

	<div class="category">
		<ul>
		<?php
			echo"<img src='./images/home.png'>";
			echo"<li style='border-left: 1px dotted #999999; '><a href='index.php'>Trang chủ</a></li>";
			require("library/config.php");
			$result = $conn->query("SELECT cate_title FROM category");
			while($data = mysqli_fetch_assoc($result))
			{
				echo"<li><a href='category.php'>$data[cate_title]</a></li>";
			}
		?>
		</ul>
	</div>
	<div class="wrapper">

