<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_user'])){
	$delete_id = $_GET['delete_user'];
	$delete_user = "DELETE FROM users WHERE user_id='$delete_id'";
	$run_delete = mysqli_query($con,$delete_user);
	if($run_delete){
		echo "<script>alert('User is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}
}
?>
<?php } ?>