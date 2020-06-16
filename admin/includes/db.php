<?php
$con = mysqli_connect("localhost","root","","blog");
if(!$con){
die("Couldnot connect to the database" . mysqli_error($con));
}
 ?>
