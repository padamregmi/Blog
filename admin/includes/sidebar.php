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


$get_post = mysqli_query($con,"SELECT * FROM post");
$post_count = mysqli_num_rows($get_post);


$get_categories = mysqli_query($con,"SELECT * FROM categories");
$categories_count = mysqli_num_rows($get_categories);
}
 ?>


<div class="navbar navbar-inverse navbar-fixed-top"><!-------navbar navbar-inverse navbar-fixed-top begin------------------->
	<div class="navbar-header"><!--------navbar-header begin----------->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Welcome To Admin Area</a>
	</div><!--------navbar-header end----------->
	<ul class="nav navbar-right top-nav"><!--------navbar-right top-menu begin----------->
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!------dropdown-toggle begin----->
				<i class="fa fa-user"><?php echo $user_name; ?></i><b class="caret"></b>
			</a><!------dropdown-toggle end----->
			<ul class="dropdown-menu">
				<li><!----li begin--------->
					<a href="index.php?profile"><!----a begin--------->
						<i class="fa fa-fw fa-user"></i>Profile
					</a><!----a end--------->
				</li><!----li end--------->

				<li><!----li begin--------->
					<a href="index.php?view_post"><!----a begin--------->
						<i class="fa fa-fw fa-envelope"></i>Posts
						<span class="badge"><?php echo $post_count; ?></span>
					</a><!----a end--------->
				</li><!----li end--------->

				<li><!----li begin--------->
					<a href="index.php?categories"><!----a begin--------->
						<i class="fa fa-fw fa-gear"></i>Categories
						<span class="badge"><?php echo $categories_count; ?></span>
					</a><!----a end--------->
				</li><!----li end--------->
				<li class="divider"></li>
				<li><!----li begin--------->
					<a href="logout.php"><!----a begin--------->
						<i class="fa fa-fw fa-power-off"></i>Logout
						
					</a><!----a end--------->
				</li><!----li end--------->
			</ul>
		</li>
	</ul><!--------navbar-right top-menu end----------->
	<div class="collapse navbar-collapse navbar-ex1-collapse"> <!----collapse navbar-collapse navbar-ex1-collapse begin--->
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="index.php?dashboard">
					<i class="fa fa-fw fa-dashboard"></i> Dashboard
				</a>
			</li>
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#post">
					<i class="fa fa-fw fa-tag"></i> Posts
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="post" class="collapse">
					<li>
						<a href="index.php?insert_post">Insert Posts</a>
					</li>
					<li>
						<a href="index.php?view_post">View Posts</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?categories">
					<i class="fa fa-fw fa-table"></i>Categories
				</a>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?comments">
					<i class="fa fa-fw fa-book"></i>Comments
				</a>
			</li><!----li end--------->
			<?php if($role=='Admin'){ ?>
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-users"></i> Users
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="users" class="collapse">
					<li>
						<a href="index.php?insert_users">Insert User</a>
					</li>
					<li>
						<a href="index.php?view_users">View User</a>
					</li>
					
				</ul>
			</li><!----li end--------->
		<?php } ?>
			<li><!----li begin--------->
				<a href="index.php?profile">
					<i class="fa fa-fw fa-pencil"></i>Profile
				</a>
			</li><!----li end--------->
			<li><!----li begin--------->
					<a href="logout.php"><!----a begin--------->
						<i class="fa fa-fw fa-power-off"></i>Logout
						
					</a><!----a end--------->
			</li><!----li end--------->
		</ul>
	</div><!----collapse navbar-collapse navbar-ex1-collapse end--->
</div><!-------navbar navbar-inverse navbar-fixed-top end------------------->

<?php } ?>