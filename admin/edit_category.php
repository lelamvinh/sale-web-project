<?php 
	require("template/header.php");
	$id=$_GET['id'];
	$loi['name']=NULL;
	$name=NULL;
	$loi=array();
	if(isset($_POST['ok']))
	{
		if(empty($_POST['txtname']))
		{
			$loi['name']="* Xin vui lòng nhập vào chỉnh sửa";
		}
		else
		{
			$name=$_POST['txtname'];
		}
	}
	if($name)
	{
		require("../library/config.php");
		$conn->query("UPDATE category SET cate_title='$name' WHERE cate_id=$id");
		$conn->close();
		header("location:list_category.php");
	}
	require("../library/config.php");
	$result = $conn->query("SELECT cate_title FROM category WHERE cate_id=$id");
	$data = mysqli_fetch_assoc($result);
 ?>

<div id="wrapper2">
	<fieldset style="width: 27px;margin: 20px auto 10px;">
		<legend style="margin-left: 10px;">Chỉnh sửa chuyên mục</legend>
		<form action="edit_category.php?id=<?php echo $id; ?>" method="post">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="txtname" value="<?php echo"$data[cate_title]" ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok"></td>
				</tr>
			</table>
		</form>
	</fieldset>
</div>

<?php 
	$conn->close();
	require("template/footer.php");
?>