<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
	$user_email= $_SESSION['user_email'];
?>
<?php
$get_user = "SELECT * FROM users WHERE user_email='$user_email'";
$run_user = mysqli_query($con,$get_user);
$row_user = mysqli_fetch_array($run_user );
$user_name = $row_user['user_name'];
 ?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Post
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Post
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Title</label>
						<div class="col-md-6">
							<input type="text" name="post_title" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Author</label>
						<div class="col-md-6">
							<input type="text" name="post_author" value="<?php echo $user_name; ?>" class="form-control">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Category</label>
						<div class="col-md-6">
							<select name="post_cat" class="form-control" >
								<option>Select a Category</option>
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
						<label class="col-md-3 control-label"> Post Tags</label>
						<div class="col-md-6">
							<input type="text" name="post_tags" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Status</label>
						<div class="col-md-6">
							<select class="form-control" name="post_status">
								<option value="draft">Draft</option>
								<option value="published">Published</option>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Content</label>
						<div class="col-md-6">
							<textarea  name="post_content" cols="19" rows="6" class="form-control" ></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Post Image</label>
						<div class="col-md-6">
							<input type="file" name="post_image" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Post" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<?php 
if(isset($_POST['submit'])){

$post_title = $_POST['post_title'];
$post_cat = $_POST['post_cat'];
$get_cat_id = "SELECT cat_id FROM categories WHERE cat_title='$post_cat'";
$run_cat_id = mysqli_query($con,$get_cat_id );
$row_cat_id = mysqli_fetch_array($run_cat_id);
$post_cat_id = $row_cat_id['cat_id'];
$post_author = $_POST['post_author'];
$post_tags = $_POST['post_tags'];
$post_status = $_POST['post_status'];
$post_content = $_POST['post_content'];
$post_image  =$_FILES['post_image']['name'];
$date = date("l d F Y");
$post_views=0;
$post_comment_count=0;


$temp_name = $_FILES['post_image']['tmp_name'];

move_uploaded_file($temp_name, "images/$post_image");



$insert_post = "INSERT INTO post(post_title,post_category,post_category_id,post_author,post_content,post_date,post_image,post_comment_count,post_views,post_tags,post_status)VALUES('$post_title','$post_cat','$post_cat_id','$post_author','$post_content','$date','$post_image','$post_comment_count','$post_views','$post_tags','$post_status')";

$run_post = mysqli_query($con,$insert_post);
if($insert_post){
	echo "<script>alert('Product inserted sucessfully')</script>";
	echo "<script>window.open('index.php?view_post','_self')</script>";
}
}
?>
<?php } ?>