<?php include("includes/db.php"); ?>
<?php 
if(isset($_GET['edit_post'])){
	$edit_id = $_GET['edit_post'];
	$get_post = "SELECT * FROM post WHERE post_id='$edit_id'";
	$run_edit = mysqli_query($con,$get_post);
	$row_edit = mysqli_fetch_array($run_edit);
	$post_id = $row_edit['post_id'];
	$post_title = $row_edit['post_title'];
	$post_author = $row_edit['post_author'];
	$post_category = $row_edit['post_category'];
	$post_category_id = $row_edit['post_category_id'];
	$post_tags = $row_edit['post_tags'];
	$post_status = $row_edit['post_status'];
	$post_content = $row_edit['post_content'];
	$post_image = $row_edit['post_image'];

}


?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Post
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Edit Post
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
					<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Title</label>
						<div class="col-md-6">
							<input type="text" name="p_title" class="form-control" value="<?php echo $post_title; ?>" >
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Author</label>
						<div class="col-md-6">
							<input type="text" name="p_author" class="form-control" value="<?php echo $post_author; ?>" >
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Category</label>
						<div class="col-md-6">
							<select name="p_cat" class="form-control" >
								<option disabled value="Select Category">Select Category</option>
								<option value="<?php echo $post_category; ?>"><?php echo $post_category; ?></option>
								<?php 
								$get_cat="SELECT * FROM categories";
								$run_cat=mysqli_query($con,$get_cat );
								while($row_cats=mysqli_fetch_array($run_cat)){
									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];

									echo "
									<option value='$cat_title'> $cat_title </option>
									";
								}

								?>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Category ID</label>
						<div class="col-md-6">
							<select name="p_cat_id" class="form-control" >
								<option disabled value="Select Category ID">Select Category ID</option>
								<option value="<?php echo $post_category_id; ?>"><?php echo $post_category_id; ?></option>
								<?php 
								$get_cat="SELECT * FROM categories";
								$run_cat=mysqli_query($con,$get_cat );
								while($row_cats=mysqli_fetch_array($run_cat)){
									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];

									echo "
									<option value='$cat_id'> $cat_id- $cat_title </option>
									";
								}

								?>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Tags</label>
						<div class="col-md-6">
							<input type="text" name="p_tags" class="form-control" value="<?php echo $post_tags; ?>" >
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Status</label>
						<div class="col-md-6">
							<select class="form-control" name="p_status">
								<option value="<?php echo $post_status?>"><?php echo $post_status; ?></option>
								<option value="draft">Draft</option>
								<option value="published">Published</option>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Content</label>
						<div class="col-md-6">
							<textarea  name="p_content" cols="19" rows="6" class="form-control"><?php echo $post_content; ?></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Image</label>
						<div class="col-md-6">
							<input type="file" name="post_image" class="form-control" >
							<br>
					<img src="images/<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" width="80" height="80">
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update Post" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


<?php 
if(isset($_POST['update'])){

$p_title = $_POST['p_title'];
$p_cat = $_POST['p_cat'];
$p_cat_id = $_POST['p_cat_id'];
$p_author = $_POST['p_author'];
$p_tags = $_POST['p_tags'];
$p_status = $_POST['p_status'];
$p_content = $_POST['p_content'];

$post_image  =$_FILES['post_image']['name'];
$tmp_name = $_FILES['post_image']['tmp_name'];
move_uploaded_file($tmp_name, "images/$post_image");

$update_post = "UPDATE post SET post_title='$p_title', post_category='$p_cat',post_category_id='$p_cat_id',post_author='$p_author',post_tags='$p_tags',post_status='$p_status',post_content='$p_content',post_image='$post_image' WHERE post_id='$post_id'";
$run_update = mysqli_query($con,$update_post);
if($run_update){
	echo "<script>alert('Post updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_post','_SELF')</script>";
}



}
?>