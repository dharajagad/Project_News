<?php 
include 'config.php';
 if (isset($_FILES['fileToUpload'])) {
 	$errors=array();
 	$file_name=$_FILES['fileToUpload']['name'];
 	$file_size=$_FILES['fileToUpload']['size'];
 	$file_tmp=$_FILES['fileToUpload']['tmp_name'];
 	$file_type=$_FILES['fileToUpload']['type'];
 	$file_ext=end(explode(',',$file_name));
 	$extention=array("jpeg","jpg","png");

 	if (in_array($file_ext, $extention)=== false){
 		$errors[]="This Extention is not allowed";
 	}
 	if ($file_size>2097152) {
 		$errors[]="This Extention is not allowed";
 	}
 	if (empty($errors)==true) {
 		move_uploaded_file($file_tmp,"upload/", $file_name);
 	}
 	}
 	session_start();
    echo $title=mysqli_real_escape_string($conn, $_POST['post_title']);
   echo  $postdesc=mysqli_real_escape_string($conn, $_POST['postdesc']);
    echo $category=mysqli_real_escape_string($conn, $_POST['category']);
   echo  $date=date("d M, Y");
   echo  $author=$_SESSION['user_id'];
     // $file=mysqli_real_escape_string($conn, $_POST['file']);
     
                     
     $sql="INSERT INTO post(title,description,category,post_date,author,post_img)
     VALUES('{$title}','{$postdesc}','{$category}','{$date}','{$author}','{$file_name}');";

     $sql.="UPDATE category SET post=post+1 WHERE category_id={$category}";

     if(mysqli_multi_query($conn,$sql)){
     	header("location:{$hostname}/admin/post.php");
     }else{
     	echo "<div>can not run query </div>";
     }
 ?>