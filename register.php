<?php
require('template/header.php');

$loi=array();
$username=$password=$email=$day=$month=$year=$gender=NULL;
$loi['username']=$loi['password']=$loi['birthday']=$loi['email']=$loi['gender']=$loi['register']=NULL;
if(isset($_POST['ok']))
{
	if(empty($_POST['txtname']))
	{
		$loi['username']="* Xin vui lòng nhập username";
	}
	else
	{
		$username=$_POST['txtname'];
	}

	if(empty($_POST['txtpass']))
	{
		$loi['password']="* Xin vui lòng nhập vào password";
	}
	else
	{
		$password=md5($_POST['txtpass']);
	}

	if(empty($_POST['email']))
	{
		$loi['email']="* Xin vui lòng nhập vào email";
	}
	else
	{
		$email=$_POST['email'];
	}

	if($_POST['day']=="ngay" || $_POST['month']=="thang" || $_POST['year']=="nam")
	{
		$loi['birthday']="* Xin vui lòng điển birthday";
	}
	else
	{
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
	}
	if(empty($_POST['gender']))
	{
		$loi['gender']="* Xin vui lòng chọn giới tính";
	}
	else
	{
		$gender=$_POST['gender'];
	}

	if($username && $password && $email && $day && $month && $year && $gender)
	{
		require("library/config.php");
		
		$result = $conn->query("SELECT * FROM user WHERE username='$username' or email='$email'");
		if(mysqli_num_rows($result)==0)
		{
			$sql = "INSERT INTO user (username,password,email,birthday,gender,level) VALUES ('$username','$password','$email','$year-$month-$day','$gender','1')";
			$conn->query($sql);
			$loi['register']="* Đăng ký thành công, <a href='login.php'>login</a> để vào website";
		}
		else
		{
			$loi['register']="Username của bạn đã có người đăng ký rồi.";
		}
		$conn->close();
	}
}
?>

		<fieldset style="width: 330px;height: 180px;margin: 140px auto 0px">
			<legend style="margin-left: 15px;">Register</legend>
			<form action="register.php" method="post">
				<table style="margin-left: 15px;">
					<tr>
						<td>Username</td>
						<td><input type="text" name="txtname" size="25"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="txtpass" size="25"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" size="25"></td>
					</tr>
					<tr>
						<td>Birthday</td>
						<td>
						<select name="day">
							<option value="ngay">ngay</option>
							<?php
								for($i=1;$i<=31;$i++)
									echo "<option value='$i'>$i</option>";
							?>
						</select>
						<select name="month">
							<option value="thang">thang</option>
							<?php
								$thang = array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								foreach ($thang as $key=>$tam) {
									echo "<option value='$key'>$tam</option>";
								}
							?>
						</select>
						<select name="year">
							<option value="nam">nam</option>
							<?php
								for ($j=1950; $j <= date(Y) ; $j++) { 
									echo "<option value='$j'>$j</option>";
								}
							?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>
							<input type="radio" name="gender" value="1" />Male
							<input type="radio" name="gender" value="2" />Female
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="ok" value="Đăng ký"></td>
					</tr>
				</table>
			</form>
		</fieldset>

		<div style="width: 290px;height: 170px;margin: 10px auto;color: red;text-align: center;">
			<?php
				echo $loi['username'].'</br>';
				echo $loi['password'].'</br>';
				echo $loi['email'].'</br>';
				echo $loi['birthday'].'</br>';
				echo $loi['gender'].'</br>';
				echo $loi['register'].'</br>';
			?>
		</div>

<script>
	hide_dangky();
</script>

<?php
require('template/footer.php');
?>