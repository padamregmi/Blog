<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['approve_post'])){
		$approve_post_id = $_GET['approve_post'];
		$update_post = "UPDATE post SET post_status='published' WHERE post_id='$approve_post_id'";
		$run_update_post = mysqli_query($con,$update_post);
		if($run_update_post){
			echo "<script>window.open('index.php?view_post','_self')</script>";
		}
	}
?>
<?php } ?>