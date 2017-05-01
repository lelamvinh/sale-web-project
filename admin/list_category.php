<?php
	require('template/header.php');
?>

	<div id="wrapper">
		<table>
			<tr>
				<td colspan="2"></td>
				<td colspan="2"><a href="add_category.php" style="color: #C36;">Thêm chuyên mục</a></td>
			</tr>
			<tr style="background: #00CC99; color: #FFF;">
				<th style="width: 100px">STT</th>
				<th>Chuyên mục</th>
				<th style="width: 100px">Edit</th>
				<th style="width: 100px">Delete</th>
			</tr>
			<?php
				require("../library/config.php");
				$stt=1;
				$result = $conn->query("SELECT cate_id, cate_title FROM category");
				while($data = mysqli_fetch_assoc($result))
				{
					echo"<tr>";
						echo"<td>$stt</td>";
						echo"<td>$data[cate_title]</td>";
						echo"<td><a href='edit_category.php?id=$data[cate_id]' style='color: #09F;'>Edit</a></td>";
						echo"<td><a href='del_category.php?id=$data[cate_id]' onclick='return show_confirm()' style='color: #FF6699;'>Delete</a></td>";
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