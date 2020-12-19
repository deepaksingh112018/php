  <?php 
      $db = mysqli_connect("localhost","root","","deepak");
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="all.min.css">
<link rel="stylesheet" href="datatables.min.css">
  <style>
    .error{
      color: red;
    }
    i{
      font-size: 30px;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="float-right text-center">
<button type="button" class="btn btn-info rounded-circle"  data-toggle="modal" data-target="#staticBackdrop">
  <i class="fa fa-plus"></i>
</button>
<p>Add User</p>
</div>
</div>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 <div class="modal-body">
        <form action="regbackend.php" method="post" id="userForm">
   <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id ="name" class="form-control" placeholder="Enter name">
   </div>
   <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id ="email" class="form-control" placeholder="Enter email">
   </div>
   <div class="form-group">
    <label for="password">Password:</label>
    <input type="password"  name="password" id="password" class="form-control" placeholder="Password">
   </div>
    <div class="form-group">
    <label for="mobile">contact no:</label>
    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile no">
   </div>
   </div>
   <div class="modal-footer">
   	<div class="col-md-10">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   <button type="submit"  id ="submit" class="btn btn-primary">Submit</button>
   </div>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div class="modal-body">
        <form action="update.php" method="post" id="editForm">
   <div class="form-group">
    <label for="editName">Name:</label>
    <input type="text" name="editName" id ="editName" class="form-control" placeholder="Enter name">
   </div>
   <div class="form-group">
    <label for="editEmail">Email:</label>
    <input type="email" name="editEmail" id ="editEmail" class="form-control" placeholder="Enter email">
   </div>
   <div class="form-group">
    <label for="editPassword">Password:</label>
    <input type="password"  name="editPassword" id="editPassword" class="form-control" placeholder="Password">
   </div>
    <div class="form-group">
    <label for="editMobile">contact no:</label>
    <input type="number" name="editMobile" id="editMobile" class="form-control" placeholder="Enter mobile no">
   </div>
   </div>
   <input type="hidden" name="editId" id="editId">
   <div class="modal-footer">
    <div class="col-md-10">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   <button type="submit"  id ="submit" class="btn btn-primary">Submit</button>
   </div>
</div>
</form>
</div>
</div>
</div>

<table class="table" id="record">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Mobile</th>
      <th>Date</th>
       <th>File</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $id = 1;
    $response = mysqli_query($db,"select * from user left join file on user.id=file.user_id ");
    while ($row= mysqli_fetch_array($response)) {
    ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['mobile']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><img src="media/<?php echo $row['file']; ?>" class='img-thumbnail' height='100px' width='100px'></td>
      <td><a href="dashboard.php?id=<?php echo $row['id']; ?>" class='btn btn-primary'><i class='fa fa-eye'></i></a></td>
      <td><a onclick="editUser(<?php echo $row['id']; ?>)" class='btn btn-primary'><i class='fa fa-edit'></i></a></td>
      <td><a onclick="deleteUser(<?php echo $row['id']; ?>,this)" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>  
    </tr>
    <?php        
    $id++;
    }

   ?>
   </tbody>

</table>
</body>
<script src="jquery.js"></script>
<script src="jquery.validate.js"></script>
<script src="bootstrap.min.js"></script>
<script src="sweetalert.min.js"></script>
<script src="all.min.js"></script>
<script src="datatables.min.js"></script>
<script>
  $('#userForm').validate({
    rules:{
      name:{
        required:true,
      },
      email:{
        required:true,
      },
      password:{
        required:true,
      },
      mobile:{
        required:true,
    }


  },
    submitHandler:function () {
      $('#userForm').submit(); 
    }
  });
  function deleteUser(userId,arg){
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
      url:'delete.php',
      type:'get',
      data:{id:userId},
      success:function(response){
         swal("Success","Record Successfully Deleted","success");
         $(arg).closest('tr').remove();
         $.each($('#record tbody tr'),function(key,value){
          $(this).find('td:first-child').html(key+1);
         })
      }
    })
  } 
}); 
}
function editUser(userId){
    $.ajax({
      url:'edit.php',
      type:'get',
      data:{id:userId},
      success:function(response){
        let userData = JSON.parse(response);
        $('#editId').val(userData[0]);
        $('#editName').val(userData[1]);
        $('#editEmail').val(userData[2]);
        $('#editPassword').val(userData[3]);
        $('#editMobile').val(userData[4]);
        $('#editModal').modal('show');
      }
    });
  }
   $('#editForm').validate({
    rules:{
      editName:{
        required:true,
      },
      editEmail:{
        required:true,
      },
      editPassword:{
        required:true,
      },
      editMobile:{
        required:true,
    }
  },
    submitHandler:function () {
      $('#editForm').submit(); 
    }
  });
   $('#record').DataTable();
</script>
</html>