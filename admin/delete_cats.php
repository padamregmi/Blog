<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['delete_cats'])){
		$delete_cat_id = $_GET['delete_cats'];
		$delete_cat = "DELETE FROM categories where cat_id='$delete_cat_id'";
		$run_delete_cat = mysqli_query($con,$delete_cat);
		if($run_delete_cat){
			echo "<script>alert('Category is deleted sucessfully')</script>";
			echo "<script>window.open('index.php?categories','_self')</script>";
		}
	}
?>
<?php } ?>