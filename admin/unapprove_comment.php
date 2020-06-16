<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['unapprove_comment'])){
		$unapprove_comment_id = $_GET['unapprove_comment'];
		$update_comment = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id='$unapprove_comment_id'";
		$run_update_comment = mysqli_query($con,$update_comment);
		if($run_update_comment){
			echo "<script>window.open('index.php?comments','_self')</script>";
		}
	}
?>
<?php } ?>