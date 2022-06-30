<?php 
 if($_SESSION['user_role']=='0'){
      header("location:{$hostname}/admin/post.php");
        }
include "config.php"; 
$userid=$_GET['id'];
$sql="DELETE FROM user WHERE user_id={$userid}";
  if (mysqli_query($conn,$sql)) {
      header("location:{$hostname}/admin/users.php");
    }else{
      echo "<p style='color:red; margin:0 10px;'>Can not Delete The User Record.!</p>";
  }
?>