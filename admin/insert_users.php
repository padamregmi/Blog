
<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

	<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Users
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Users
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post"  class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Name:</label>
						<div class="col-md-6">
							<input type="text" name="user_name" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Email</label>
						<div class="col-md-6">
							<input type="text" name="user_email" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Password</label>
						<div class="col-md-6">
							<input type="password" name="user_pass" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
				
				
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Image</label>
						<div class="col-md-6">
							<input type="file" name="user_image" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group "> 
						<label class="col-md-3 control-label"> Role</label>
						<div class="col-md-6">
						<select name="role" id="role" class="form-control ">
							<option value="Admin">Admin</option>
							<option value="Editor">Editor</option>
						</select>
						</div>
					</div>
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Admin" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
					
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


  
<?php 
if(isset($_POST['submit'])){
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		$user_role = $_POST['role'];
		$post_id = 0;
		$user_image = $_FILES['user_image']['name'];
		$temp_name = $_FILES['user_image']['tmp_name'];
		move_uploaded_file($temp_name, "images/$user_image");

		$insert_user = "INSERT INTO users(user_name,user_email,user_password,user_image,is_active,post_id,role)VALUES('$user_name','$user_email','$user_pass','$user_image','yes','$post_id','$user_role')";

		$run_user = mysqli_query($con,$insert_user);
		if($run_user){
			echo "<script>alert('A new user in Admin inserted sucessfully')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
		}
?>
<?php } ?>