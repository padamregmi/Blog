<?php include("includes/db.php"); ?>
<?php 
function show_cat(){
	global $con;
	$select_cat = "SELECT * FROM categories";
	$run_cat = mysqli_query($con,$select_cat);
	while($row = mysqli_fetch_array($run_cat)){
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];
	echo "
				<li class='nav-item dropdown'>
                   <a class='nav-link' href='category.php?cat_id=$cat_id'>$cat_title</a>
                </li>
	";
}
}

?>