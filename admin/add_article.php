<?php
	require("template/header.php");

	$loi=array();
	$loi['title']=$loi['image']=$loi['intro']=$loi['content']=NULL;
	$title=$image=$intro=$content=NULL;
	if(isset($_POST['ok']))
	{
		$cate_id = $_POST['txtcate'];
		if(empty($_POST['txttitle']))
		{
			$loi['title']="* Xin vui lòng nhập vào tiêu để bài viết";
		}
		else
		{
			$title=$_POST['txttitle'];
		}
		if($_FILES['image']['error']>0)
		{
			$loi['image']="* Xin vui lòng chọn hình ảnh";
		}
		else
		{
			$image=$_FILES['image']['name'];
		}
		if(empty($_POST['txtintro']))
		{
			$loi['intro']="* Xin vui lòng nhập mô tả bài viết";
		}
		else
		{
			$intro=$_POST['txtintro'];
		}
		if(empty($_POST['txtcontent']))
		{
			$loi['content']="* Xin vui lòng nhập nội dung bài viết";
		}
		else
		{
			$content=$_POST['txtcontent'];
		}
		if($cate_id && $title && $image && $intro && $content)
		{
			require("../library/config.php");
			$conn->query("INSERT INTO news (title, image, introduce, content, cate_id) VALUES ('$title','$image','$intro','$content','$cate_id')");
			$conn->close();
			move_uploaded_file($_FILES['image']['tmp_name'],"../library/images/".$_FILES['image']['name']);
		}
	}

?>

<div id="wrapper2">
	<fieldset style="width: 600px;margin: 20px auto 10px;">
		<legend style="margin-left: 10px;">Thêm bài viết</legend>
		<form action="add_article.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Chuyên mục</td>
					<td>
						<select name="txtcate">
							<?php
								require("../library/config.php");
								$result = $conn->query("SELECT * FROM category");
								while($data = mysqli_fetch_assoc($result))
								{
									echo"<option value='$data[cate_id]'>$data[cate_title]</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Tiêu đề</td>
					<td><input type="text" name="txttitle" size="50"></td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td><input type="file" name="image" size="25" style="padding-left: 0px;"></td>
				</tr>
				<tr>
					<td>Mô tả</td>
					<td><textarea cols="55" rows="5" name="txtintro"></textarea></td>
				</tr>
				<tr>
					<td>Nội dung</td>
					<td><textarea cols="55" rows="10" name="txtcontent"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Add"></td>
				</tr>
			</table>
		</form>
	</fieldset>
</div>
<div style="width: 290px; margin: 10px auto;text-align: center;color: #F00;">
	<?php 
		echo $loi['title'].'</br>';
		echo $loi['image'].'</br>';
		echo $loi['intro'].'</br>';
		echo $loi['content'].'</br>';
	 ?>
</div>

<?php 
	require("template/footer.php");
 ?>