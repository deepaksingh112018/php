<?php 
	 $db = mysqli_connect("localhost","root","","deepak");
	 $id = $_GET['id'];
	 $response = mysqli_query($db,"select * from user where id ='$id'");
	 $row = mysqli_fetch_row($response);
	 echo json_encode($row);
 ?>