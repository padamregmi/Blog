<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['delete_comment'])){
		$delete_comment_id = $_GET['delete_comment'];
		$delete_comment = "DELETE FROM comments where comment_id='$delete_comment_id'";
		$run_delete_comment = mysqli_query($con,$delete_comment);
		if($run_delete_comment){
			echo "<script>alert('Comment is deleted sucessfully')</script>";
			echo "<script>window.open('index.php?comments','_self')</script>";
		}
	}
?>
<?php } ?>