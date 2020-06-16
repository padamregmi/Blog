<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_SESSION['user_email'])){
$email = $_SESSION['user_email'];
$get_user = "SELECT * FROM users WHERE user_email='$email '";
$run_user = mysqli_query($con,$get_user);
$row_user = mysqli_fetch_array($run_user);
$user_id = $row_user['user_id'];
$user_name = $row_user['user_name'];
$user_email= $row_user['user_email'];
$user_image= $row_user['user_image'];
$role = $row_user['role'];
}
?>
<div class="row">
	<h3>User Profile Page</h3><br>
	<p class="alert alert-info col-md-6">TO update your profile picture and password go to<a href="index.php?settings=<?php echo $user_id; ?>" > Setting Page.</a></p>
	<div class="col-md-12">
		<img src="images/<?php echo $user_image; ?>" style="width:150px;height: 150px;border-radius: 100px;">
		<form method="post" action="">
			<div class="col-md-6">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $user_name ; ?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo $user_email ; ?>">
				</div>
				<div class="form-group">
					<label for="Role">Role</label>
					<input type="text" name="role" class="form-control" value="<?php echo $role ; ?>"  disabled>
				</div>
				<div class="form-group">
					<input type="submit" name="update" class="btn btn-success" value="Update your Profile">
				</div>

			</div>
		</form>
	</div>
</div>
<?php 
if(isset($_POST['update'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$update = "UPDATE users SET user_name='$username',user_email='$email' WHERE user_id ='$user_id' ";
	$run_update = mysqli_query($con,$update);
	if($run_update){
		$_SESSION['user_email']=$email;
		echo "<script>alert('Profile Updated sucessfully')</script>";
		echo "<script>window.open('index.php?profile','_self')</script>";
	}

}

?>

<?php } ?>