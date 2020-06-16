<!DOCTYPE html>
<html>
<head>
	<title>Admin register</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admin_register.css">
	<link rel="stylesheet" href="js/main.js">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<h1 class="text_left">Registration Form</h1>
			<p class="text_left">Welcome to the best technological site that will help to make you inforamation rich in the latest tech news and trends. Wish you good luck for the role you are provided with. Work Good. </p>
		</div>	
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						 <h3 class="text_left">Registration Form</h3>
					</div>
				</div>
				<br>
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="row">
					<label class="label col-md-2 control-label">Email:</label>
					<div class="col-md-10">
						<input type="email" name="email" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="row">
					<label class="label col-md-2 control-label">Name:</label>
					<div class="col-md-10">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
				</div>
				<div class="row">
					<label class="label col-md-2 control-label">Passwod:</label>
					<div class="col-md-10">
						<input type="email" name="password" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="row">
					<label class="label col-md-2 control-label">Image:</label>
					<div class="col-md-10">
						<input type="file" name="admin_image" class="form-control"  >
					</div>
				</div>
				<div class="row">
						<input type="submit" name="register" class="btn btn-danger" value="Register">&nbsp;
						<a href="login.php">Already registered?</a>
				
				</div>
				</form>
			</div>
	</div>
</div>

?>