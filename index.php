<?php
session_start();
require('template/header.php');
?>


		<div class="left">
			<?php
				require("library/config.php");
				$result3 = $conn->query("SELECT cate_id, cate_title FROM category");
				while($data3 = mysqli_fetch_assoc($result3))
				{
					echo"<div class='news'>";
							echo"<h2 style='border-bottom: 1px solid #CCC;padding: 5px 10px 5px 10px;color: #CCC;margin-bottom: 5px'>$data3[cate_title]</h2>";
							echo"<div class='post'>";
								$result = $conn->query("SELECT news_id, title, image, introduce FROM news WHERE cate_id=$data3[cate_id] ORDER BY news_id DESC");
								$data = mysqli_fetch_assoc($result);
								echo"<h3><a href='detail.php?id=$data[news_id]'>$data[title]</a></h3>";
								echo"<img src='library/images/$data[image]' height='200px' width='140px'>";
								echo"<p>$data[introduce]<p>";
							echo"</div>";
							echo"<div class='article'>";
									require("library/config.php");
									$result2 = $conn->query("SELECT news_id, title FROM news WHERE cate_id=$data3[cate_id] ORDER BY news_id DESC limit 1, 3");
									while($data2 = mysqli_fetch_assoc($result2))
									{
										echo"<li><a href='detail.php?id=$data2[news_id]'>$data2[title]</a></li>";
									}				
							echo"</div>";
							echo"<div class='clr'></div>";
					echo"</div>";
				}
				$conn->close();
			?>
		</div>
		

<?php
require('template/content_right.php');
require('template/footer.php');
?>