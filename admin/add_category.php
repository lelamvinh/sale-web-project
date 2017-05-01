<?php 
	require("template/header.php");
 ?>
<?php 	
	$loi=array();
	$loi['category']=NULL;
	$category=NULL;
	if(isset($_POST['ok']))
	{
		if(empty($_POST['txtname']))
		{
			$loi['category']="* Xin vui lòng nhập tên chuyên mục mới";
		}
		else
		{
			$category=$_POST['txtname'];
		}
	}
	if($category)
	{
		require("../library/config.php");
		$conn->query("INSERT INTO category (cate_title) VALUES ('$category')");
		$conn->close();
		header("location:list_category.php");
	}
?>

<div id="wrapper2">
	<fieldset style="width: 27px; margin: 40px auto 40px;">
		<legend style="margin-left: 10px;">Thêm chuyên mục</legend>
		<form action="add_category.php" method="post">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="txtname" size="25"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Thêm"></td>
				</tr>
			</table>
		</form>
	</fieldset>
</div>
<div style="width: 290px; margin: 10px auto;color: #E00;">
	<?php 
		echo $loi['category'];
	 ?>
</div>

 <?php 
 	require("template/footer.php");
  ?>