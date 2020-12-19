<?php 
 $db = mysqli_connect("localhost","root","","deepak");
 $id = $_REQUEST['id'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Document</title>
 	<link rel="stylesheet" href="bootstrap.min.css">
 </head>
 <body>
 	<div class="row" >
 		<div class="col-sm-4"></div>
 		<div class="col-sm-4">
 			<div class="card text-center">
  <div class="card-header">
   WELCOME
  </div>
  <div class="card-body">
    <h5 class="card-title">file view</h5>
  </div>
  <form action="file.php" method="post" enctype="multipart/form-data">
 			<input type="file" name="file" class="form-control" >
 			<input type="hidden" name="userId" value="<?php echo $id; ?>">
 			<button type="submit" class='btn btn-success'>submit</button>
 		</form>
</div>
 		</div>
 	</div>
 </body>
 <script src="jquery.js"></script>
<script src="jquery.validate.js"></script>
<script src="bootstrap.min.js"></script>
<script src="sweetalert.min.js"></script>
 </html>
 