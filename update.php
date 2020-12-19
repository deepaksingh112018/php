<?php 
	 $db = mysqli_connect("localhost","root","","deepak");
	 $id = $_POST['editId'];
	 $editName = $_POST['editName'];
	 $editEmail = $_POST['editEmail'];
	 $editPassword = $_POST['editPassword'];
	 $editMobile = $_POST['editMobile'];
	  mysqli_query($db,"update user set name ='$editName',email='$editEmail',password='$editPassword',mobile='$editMobile' where id ='$id'");
	 header("location:registration.php");
 ?>