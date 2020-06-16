<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Posts
			</li>
		</ol><!----breadcrumb end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->

<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<div class="panel panel-default"><!----panel panel-default begin-------->
			<div class="panel-heading"><!----panel-heading begin-------->
				 <div class="panel-title"><!----panel-title begin-------->
				 	<h3>
				 		<i class="fa fa-tags"></i>View Posts
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<?php 
								$get_post = "SELECT * FROM post";
								$run_post = mysqli_query($con,$get_post);
								$row_post = mysqli_fetch_array($run_post);
								$post_status = $row_post['post_status'];
								?>
								<th>Post ID:</th>
								<th>Post Title:</th>
								<th>Post Author:</th>
								<th>Post Category:</th>
								<th>Post Status:</th>
								<th>Post Image:</th>
								<th>Post Content:</th>
								<th>Post Date:</th>
								<th>Post Tags:</th>
								<th>Post Comment:</th>
								<th>Post Views:</th>
								<th>Approve/Unapprove:</th>
								<th>Delete Post:</th>
								<th>Edit Post:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$user_email = $_SESSION['user_email'];
							$get_user = "SELECT * FROM users WHERE user_email = '$user_email'";
							$run_user = mysqli_query($con,$get_user);
							$row_user = mysqli_fetch_array($run_user);
							$user_name = $row_user ['user_name'];
							$role = $row_user ['role'];
									$i=0;
									if($role === "Admin"){
										$get_post = "SELECT * FROM post";
									}else{
										$get_post = "SELECT * FROM post WHERE post_author ='$user_name ' ";
									}
									
									$run_post = mysqli_query($con,$get_post);
									while($row_post=mysqli_fetch_array($run_post)){
										$post_id = $row_post['post_id'];
										$post_title = $row_post['post_title'];
										$post_author = $row_post['post_author'];
										$post_category = $row_post['post_category'];
										$post_status = $row_post['post_status'];
										$post_image = $row_post['post_image'];
										$post_content = $row_post['post_content'];
										$post_date = $row_post['post_date'];
										$post_tags = $row_post['post_tags'];
										$get_comment_count = "SELECT * FROM comments WHERE post_id='$post_id'";
										$run_comment_count = mysqli_query($con,$get_comment_count);
										$post_comment_count = mysqli_num_rows($run_comment_count);
										$post_views = $row_post['post_views'];
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $post_title; ?></td>
								<td><?php echo $post_author; ?></td>
								<td><?php echo $post_category; ?></td>
								<td><?php echo $post_status; ?></td>
								<td><img src="images/<?php echo  $post_image;?>" width="60" height="60"></td>
								<td><?php echo $post_content; ?></td>
								<td><?php echo $post_date; ?></td>
								<td><?php echo $post_tags; ?></td>
								<td><?php echo $post_comment_count; ?></td>
								<td><?php echo $post_views; ?></td>
							<?php	if($post_status == 'draft') {?>
								<td>
									<a href="index.php?approve_post=<?php echo $post_id; ?>"  class="btn btn-primary">
										Approve
									</a>
								</td>
							<?php } ?>
							<?php	if($post_status == 'published') {?>
								<td>
									<a href="index.php?unapprove_post=<?php echo $post_id; ?>" class="btn btn-warning">
										Unapprove
									</a>
								</td>
							<?php } ?>
								<td>
									<a href="index.php?delete_post=<?php echo $post_id; ?>" class="btn btn-danger">
									Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_post=<?php echo $post_id; ?>"  class="btn btn-primary">
										Edit
									</a>
								</td>
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div><!----table-responsive end-------->
			</div><!----panel-body end-------->
		</div><!----panel panel-default end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->

<?php } ?>