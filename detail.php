<?php
session_start();
require('template/header.php');

$id = $_GET['id'];
?>

		<div class="left">
			<div id="detail-article">
				<?php
					require("library/config.php");
					$result = $conn->query("SELECT title, introduce, image, content FROM news WHERE news_id=$id");
					$data = mysqli_fetch_assoc($result);
					echo"<h2>$data[title]</h2>";
					echo"<p>$data[introduce]</p>";
					echo"<img src=''>";
					echo"<p>$data[content]</p>";
					?>
			</div>
			<div id="dif-article">
				<p>Các bài viết liên quan</p>
				<ul>
					<li><a href="#">Gì đó đó</a></li>
					<li><a href="#">Gì đó đó</a></li>
					<li><a href="#">Gì đó đó</a></li>
				</ul>
			</div>
			<div id="comment">
				<fieldset>
					<legend>Comment</legend>
					<form>
						<table>
							<tr>
								<td>Name</td>
								<td><input type="text" name="name" size="25"></td>
							</tr>
							<tr>
								<td>Mess</td>
								<td><textarea cols="60" rows="5"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Đăng"></td>
							</tr>
						</table>
					</form>
				</fieldset>
			</div>
			<div id="showcmt">
				<div class="comm">
					<img src="./images/vinh.jpg">
					<div class="cmt-cnt">
						<p>Vinh Le 26.04.2017</p>
						<p>Hay lắm đmmm</p>
					</div>
					<div class="clr"></div>
				</div>
				<div class="comm">
					<img src="./images/vinh.jpg">
					<div class="cmt-cnt">
						<p>Vinh Le 26.04.2017</p>
						<p>Hay lắm đmmm</p>
					</div>
					<div class="clr"></div>
				</div>
				<div class="comm">
					<img src="./images/vinh.jpg">
					<div class="cmt-cnt">
						<p>Vinh Le 26.04.2017</p>
						<p>Hay lắm đmmm</p>
					</div>
					<div class="clr"></div>
				</div> 

			</div>
		
		</div>
		<div class="right">
			
	</div>


<?php
require('template/footer.php');
?>