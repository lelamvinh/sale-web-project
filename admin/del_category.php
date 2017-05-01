<?php 
$id = $_GET['id'];
require("../library/config.php");
$conn->query("DELETE FROM category WHERE cate_id=$id");
$conn->close();
header("location:list_category.php");
exit();
 ?>