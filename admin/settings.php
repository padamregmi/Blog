<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php
if(isset($_SESSION['user_email'])){
$user_email = $_SESSION['user_email'];
$get_user = "SELECT * FROM users WHERE user_email='$user_email'";
$run_get_user = mysqli_query($con,$get_user);
$row_user = mysqli_fetch_array($run_get_user);
$user_id = $row_user['user_id'];
$user_image = $row_user['user_image'];
$user_password = $row_user['user_password'];
}

 ?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Update Profile Image & Password
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Update Image & Password
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							 <form action="" method="post" enctype="multipart/form-data">
							 	<div class="col-md-6">
										<div class="form-group"><!---------form-group begin---------->
											<label class="control-label">Choose image to upload:</label>
												<input type="file" name="profile_image" class="form-control" required>
										</div><!---------form-group end---------->
										<div class="form-group"><!---------form-group begin---------->
											<label class="control-label">Password:</label>
												<input type="password" name="password" class="form-control" placeholder="Password" required>
										</div><!---------form-group end---------->
										<div class="form-group"><!---------form-group begin---------->
												<input type="submit" name="update_image" value="Update Profile" class="btn btn-primary form-control">
										</div><!---------form-group end---------->
								</div>
							 </form>
							 <form action="" method="post" enctype="multipart/form-data">
							 	<div class="col-md-6">
										<div class="form-group"><!---------form-group begin---------->
											<label class="control-label"> Old Password</label>
												<input type="password" name="old_pass" class="form-control" placeholder="Old Password" required>
										</div><!---------form-group end---------->
										<div class="form-group"><!---------form-group begin---------->
											<label class="control-label"> New Password</label>
												<input type="password" name="new_pass" class="form-control" placeholder="New Password" required>
										</div><!---------form-group end---------->
										<div class="form-group"><!---------form-group begin---------->
												<input type="submit" name="update_password" value="Update Password" class="btn btn-primary form-control">
										</div><!---------form-group end---------->
								</div>
							 </form>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['update_image'])){
	$password = $_POST['password'];
	$user_image = $_FILES['profile_image']['name'];
	$temp  = $_FILES['profile_image']['tmp_name'];
	move_uploaded_file($temp, "images/$user_image");
	if($password === $user_password){
		$update_profile = "UPDATE users SET user_image='$user_image' WHERE user_id='$user_id '";
		$query = mysqli_query($con,$update_profile);
		if($query ){
			echo "<script>alert('Image Updated sucessfully')</script>";
			echo "<script>window.open('index.php?profile','_self')</script>";
		}
	}else{
		echo "
		<div class='alert alert-danger'><p class='text-center'> Wrong Password!!</p> </div>
		";
	}

}

?>
<?php 
if(isset($_POST['update_password'])){
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	if($old_pass === $user_password){
		$update_pass = "UPDATE users SET user_password='$new_pass' WHERE user_id='$user_id'";
		$run_update_pass =mysqli_query($con,$update_pass);
		if($run_update_pass){
			echo "<script>alert('Password changed sucessfully')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
	}else{
		echo "
		<div class='alert alert-danger'><p class='text-center'> Incorrect Old Password!!</p> </div>
		";
	}
}
?>

<?php } ?>