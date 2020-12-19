<?php 
 $db = mysqli_connect("localhost","root","","deepak");
 $file =$_FILES['file']['name'];
 $userId = $_POST['userId'];
 $tmpName= $_FILES['file']['tmp_name'];
 mysqli_query($db,"INSERT INTO file(file,user_id)VALUES('$file','$userId')");
 move_uploaded_file($tmpName, "media/$file");
 header("location:dashboard.php?id=$userId");
 
 ?>