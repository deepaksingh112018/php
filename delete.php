<?php 
 $db = mysqli_connect("localhost","root","","deepak");
 $id =$_REQUEST['id'];
 mysqli_query($db,"delete from user where id='$id'");
 header("location:registration.php"); 
 ?>