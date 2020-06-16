<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_post'])){
	$delete_id = $_GET['delete_post'];
	$delete_post = "DELETE FROM post WHERE post_id='$delete_id'";
	$run_delete = mysqli_query($con,$delete_post);
	if($run_delete){
		echo "<script>alert('Post is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_post','_self')</script>";
	}
}
?>
<?php } ?>