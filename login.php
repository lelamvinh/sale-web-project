<?php
session_start();
require('template/header.php');
$loi=array();
$username=$password=NULL;
$loi['username']=$loi['password']=$loi['login']=NULL;

if(isset($_POST["ok"]))
{
	if(empty($_POST['txtuser']))
	{
		$loi['username']="* Bạn chưa nhập vào username";
	}
	else
	{

		$username = $_POST['txtuser'];
	}
	if(empty($_POST['txtpass']))
	{
		$loi['password']="* Bạn chưa nhập vào password";
	}
	else
	{
		$password = md5($_POST['txtpass']);	
	}
	if($username && $password)
	{
		require("library/config.php");
		
		$result = $conn->query("SELECT * FROM user WHERE username='$username' and password='$password'");
		if(mysqli_num_rows($result)==1)
		{
			$data = mysqli_fetch_assoc($result);
			$_SESSION['level']= $data['level'];
			if($_SESSION['level']==2)
			{
				header("location:admin/admin.php");
				exit();
			}
			else
			{
				$_SESSION['username'] = $username;
				header("location:index.php");
				exit();
			}
		}
		else
		{
			$loi['login']="* Username hoặc password không đúng";
		}
		$conn->close();
	}
}
?>

		<fieldset style="width: 350px;height: 150px;margin: 140px auto 0px">
			<legend style="margin-left: 10px">Login</legend>
			<form style="padding-top: 20px" action="login.php" method="post">
				<table style="padding-left: 20px">
					<tr>
						<td>Username</td>
						<td><input type="text" name="txtuser" size="25"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="txtpass" size="25"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="ok" value="Đăng nhập"></td>
					</tr>
				</table>
			</form>
		</fieldset>
		<div style="width: 290px;height: 170px;margin: 10px auto;text-align: center;color: red;">
		<?php
			echo $loi['username'].'</br>';
			echo $loi['password'].'</br>';
			echo $loi['login'].'</br>';
		?>
		</div>
<script>
hide_login();	
</script>

<?php
require('template/footer.php');
?>
