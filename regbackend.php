<?php 
	$db = mysqli_connect("localhost","root","","deepak");
	$name =$_POST['name'];
	$email =$_POST['email'];
	$password =$_POST['password'];
	$mobile =$_POST['mobile'];
	if ($db) {
		mysqli_query($db,"INSERT INTO user(name,email,password,mobile) VALUES ('$name','$email','$password','$mobile')");
		header("location:registration.php");
	}
	
 ?>