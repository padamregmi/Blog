<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Users
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
				 		<i class="fa fa-tags"></i>View Users
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>User ID:</th>
								<th>Username:</th>
								<th>User Email:</th>
								<th>User Image:</th>
								<th>UserRole:</th>
								<th>Delete User:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$get_user = "SELECT * FROM users";
							$run_user = mysqli_query($con,$get_user);
							while($row_user = mysqli_fetch_array($run_user)){
							$user_id = $row_user ['user_id'];
							$user_name = $row_user ['user_name'];
							$user_email = $row_user ['user_email'];
							$user_image = $row_user ['user_image'];
							$role = $row_user ['role'];
										$i++;
							?>
							<tr>
								<td><?php echo $user_id; ?></td>
								<td><?php echo $user_name; ?></td>
								<td><?php echo $user_email; ?></td>
								<td><img src="images/<?php echo  $user_image;?>" width="60" height="60"></td>
								<td><?php echo $role; ?></td>
								<td>
									<a href="index.php?delete_user=<?php echo $user_id; ?>" class="btn btn-danger">
									Delete
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