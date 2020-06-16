<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
$get_user = mysqli_query($con,"SELECT * FROM users");
$users_count = mysqli_num_rows($get_user);

$get_post = mysqli_query($con,"SELECT * FROM post");
$post_count = mysqli_num_rows($get_post);

$get_comment = mysqli_query($con,"SELECT * FROM comments");
$comments_count = mysqli_num_rows($get_comment);

$get_categories = mysqli_query($con,"SELECT * FROM categories");
$categories_count = mysqli_num_rows($get_categories);
?>
<div class="row"><!----row 1 begin---------->
	<div class="col-lg-12"><!----col-lg-12 begin---------->
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb"><!----breadcrumb begin---------->
			<li class="active"><!----active begin---------->
				<i class="fa fa-dashboard"></i>Dashbaord
			</li><!----active end---------->
		</ol><!----breadcrumb end---------->
	</div><!----col-lg-12 end---------->
</div><!----row 1 end---------->

<div class="row"><!----row 2 begin---------->
	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-primary"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-tasks fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $post_count; ?></div>
						<div>Posts</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_products"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-green"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-book fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $comments_count; ?></div>
						<div>Comment</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_customers"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-orange"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-users fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $users_count; ?></div>
						<div>Users</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_p_cats"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-red"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-tags fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $categories_count; ?></div>
						<div>Categories</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_orders"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->
</div><!----row 2 end---------->

<?php } ?>
