<?php 
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Categories
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Categories
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" action="" class="form-horizontal col-md-6" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<div class="col-md-9">
							<input type="text" name="cat_title" class="form-control" placeholder="Category Title">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-9"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Insert Category" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
				<div class="col-md-6">
					<div class="table-responsive"><!---------table-responsive begin---------->
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Category ID: </th>
								<th>Category Title:</th>
								<th>Delete Category:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=0;
								$select_cat = "SELECT * FROM categories";
								$run_cat = mysqli_query($con,$select_cat);
								while($row_cat = mysqli_fetch_array($run_cat)){
									$cat_id = $row_cat['cat_id'];
									$cat_title = $row_cat['cat_title'];
									$i++;

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $cat_title; ?></td>
								<td>
									<a href="index.php?delete_cats=<?php echo $cat_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div><!---------table-responsive end---------->
				</div>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php
if(isset($_POST['submit'])){
	$cat_title = $_POST['cat_title'];
	$insert_cat = "INSERT INTO categories(cat_title)VALUES('$cat_title')";
	$run_insert_cat = mysqli_query($con, $insert_cat);
	if($run_insert_cat){
		echo "<script>alert('Categories inserted sucessfully')</script>";
		echo "<script>window.open('index.php?categories','_SELF')</script>";
	}
}
 ?>

<?php } ?>
