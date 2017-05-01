<?php 
$id=$_GET['id'];
require('../library/config.php');
$conn->query("DELETE FROM user WHERE user_id=$id");
$conn->close();

header('location:list_user.php');
exit();
 ?>