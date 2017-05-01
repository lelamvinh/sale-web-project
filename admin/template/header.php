<!DOCTYPE html>
<html>
<head>
	<title>Quản trị Admin</title>
	<link rel="stylesheet" type="text/css" href="template/style.css">
	<meta charset="utf-8">
	<style type="text/css">
		#wrapper2 table {
			margin: 10px 20px;
		}

		#wrapper2 table tr {
			line-height: 30px;
		}

		#wrapper2 input {
			padding: 2px;
		}

		#wrapper2 table select {
			padding: 1px;
		}
	</style>
	<script type="text/javascript">
		function show_confirm()
		{
			if(confirm("Bạn có chắc muốn xoá dòng dữ liệu này không ?"))
			{
				return true;
			}
			else
			{	
				return false;
			}
		}
	</script>
</head>
<body>
	<div id="top">
		<h3 style="color: #FFF;">Welcome Admin, <a href="../logout.php" style="color: #FFF;">(LogOut)</a></h3>
	</div>
	<div id="menu">
		<ul>
			<li><a href="list_user.php">Quản lý thành viên</a></li>
			<li><a href="list_category.php">Quản lý chuyên mục</a></li>
			<li><a href="list_article.php">Quản lý bài viết</a></li>
			<li><a href="list_comment.php">Quản lý bình luận</a></li>
		</ul>
	</div>
	<div class="clr"></div>