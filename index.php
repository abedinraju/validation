<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	

<?php



/**
 * Add student form isseting
 */
    if (isset($_POST['add'])) {

		// Get value
		 
		$name = $_POST['name'];
		$roll = $_POST['roll'];
    	$email = $_POST['email'];
		$cell = $_POST['cell'];
		$username = $_POST['username'];
		$age = $_POST['age'];

        $cell_len = strlen($cell);

        /*
         * File management
         */
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_type = $_FILES['photo']['type'];
        $file_tmp_name = $_FILES['photo']['tmp_name'];

        $unique_file_name = md5 (time().rand()) . $file_name;

        move_uploaded_file($file_tmp_name, 'photo/' . $unique_file_name);

	 /**
	  * Form Validation
	  */
		
      if (empty($name) || empty($roll) || empty($email) || empty($cell) ||  empty($username) || empty($age)) {
		   
		$msg ="<p class=\"alert alert-danger\">All fields are required ! <button class=\"close\"data-dismiss=\"alert\">&times;</button></p>";

	  }elseif (filter_var($roll, FILTER_VALIDATE_INT) == false ){

          $msg ="<p class=\"alert alert-danger\">Invalid Roll No ! <button class=\"close\"data-dismiss=\"alert\">&times;</button></p>";
      }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false){

          $msg ="<p class=\"alert alert-danger\">Invalid Email ! <button class=\"close\"data-dismiss=\"alert\">&times;</button></p>";

      }elseif ($cell_len !=11 ){

          $msg ="<p class=\"alert alert-danger\">Incorrect Mobile Number ! <button class=\"close\"data-dismiss=\"alert\">&times;</button></p>";

      }

	}




?>


	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Add Student</h2>
				
                <?php
				if(isset($msg)){
					echo $msg;
				}
				?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name ="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Roll</label>
						<input name ="roll" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name ="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name ="cell"  class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name ="username"  class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input  name ="age" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name ="photo"  class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name ="add"  class="btn btn-primary" type="submit" value="Add New Student">
					</div>
				</form>
			</div>
		</div>
	</div>
	
 <br>
 <br>
 <br>






	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>