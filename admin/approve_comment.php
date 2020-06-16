<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['approve_comment'])){
		$approve_comment_id = $_GET['approve_comment'];
		$update_comment = "UPDATE comments SET comment_status='Approved' WHERE comment_id='$approve_comment_id'";
		$run_update_comment = mysqli_query($con,$update_comment);
		if($run_update_comment){
			echo "<script>window.open('index.php?comments','_self')</script>";
		}
	}
?>
<?php } ?>