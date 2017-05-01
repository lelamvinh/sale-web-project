<?php
	require('template/header.php');
?>

	<div id="wrapper">
		<table>
			<tr style="background: #00CC99; color: #FFF;">
				<th>STT</th>
				<th>Username</th>
				<th>Email</th>
				<th>Level</th>
				<th>Delete</th>
			</tr>
			<?php
				require("../library/config.php");
				$stt=1;
				$result = $conn->query("SELECT user_id, username, email, level FROM user");
				while($data = mysqli_fetch_assoc($result))
				{
					echo"<tr>";
						echo"<td>$stt</td>";
						echo"<td>$data[username]</td>";
						echo"<td>$data[email]</td>";
						if($data['level']==1)
						{
							echo"<td>Thành viên</td>";
						}
						else
						{
							echo"<td>Admin</td>";
						}
						echo"<td><a href='del_user.php?id=$data[user_id]' onclick='return show_confirm()' style='color: #FF6699;'>Delete</a></td>";
					echo"</tr>";
				$stt++;
				}
				$conn->close();
			?>
		</table>
	</div>

<?php
	require('template/footer.php');
?>