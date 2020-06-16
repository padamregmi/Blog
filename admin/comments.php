<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php
if(isset($_SESSION['user_email'])){
	$user_email = $_SESSION['user_email'];
	$get_user = "SELECT * FROM users WHERE user_email='$user_email '";
	$run_user = mysqli_query($con,$get_user);
	$row_user = mysqli_fetch_array($run_user);
	$user_name = $row_user['user_name'];
	$user_image = $row_user['user_image'];
	$role = $row_user['role'];
}
 ?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Comments
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
				 		<i class="fa fa-tags"></i>Comments
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Comment ID:</th>
								<th>Name:</th>
								<th>Comment Email:</th>
								<th>Comment Body:</th>
								<th>Comment Status:</th>
								<th>Post ID:</th>
								<?php 	if($role == "Admin"){ ?>
								<th colspan="3" class="text-center">Actions:</th>
							<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php 
									global $role;
									$get_comment = "SELECT * FROM comments order by comment_id DESC";
									$run_comment = mysqli_query($con,$get_comment);
									while($row_comment=mysqli_fetch_array($run_comment)){
										$comment_id = $row_comment['comment_id'];
										$comment_name = $row_comment['comment_name'];
										$comment_email = $row_comment['comment_email'];
										$comment_body = $row_comment['comment_body'];
										$comment_status = $row_comment['comment_status'];
										$post_id = $row_comment['post_id'];
							?>
						<?php 	if($role !== "Admin"){ ?>
							<tr>
								<td><?php echo $comment_id; ?></td>
								<td><?php echo $comment_name; ?></td>
								<td><?php echo $comment_email; ?></td>
								<td><?php echo $comment_body; ?></td>
								<td><?php echo $comment_status; ?></td>
								<td><?php echo $post_id; ?></td>
							</tr>
							<?php } ?>
							<?php 	if($role == "Admin"){ ?>
							<tr>
								<td><?php echo $comment_id; ?></td>
								<td><?php echo $comment_name; ?></td>
								<td><?php echo $comment_email; ?></td>
								<td><?php echo $comment_body; ?></td>
								<td><?php echo $comment_status; ?></td>
								<td><?php echo $post_id; ?></td>
								<td><a href="index.php?approve_comment=<?php echo $comment_id ?>" class="btn btn-primary">Approve</a></td>
								<td><a href="index.php?unapprove_comment=<?php echo $comment_id ?>" class="btn btn-warning">Unapprove</a></td>
								<td><a href="index.php?delete_comment=<?php echo $comment_id ?>" class="btn btn-danger">Delete</a></td>
							</tr>
							<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div><!----table-responsive end-------->
			</div><!----panel-body end-------->
		</div><!----panel panel-default end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->
<?php } ?>