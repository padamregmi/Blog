<?php 
if(isset($_POST['search'])){
	$search = $_POST['search'];
	$query = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";
	$result = mysqli_query($con,$query);
	$found = mysqli_num_rows($result);
	if($found === 0){
		echo "
			<div class='alert alert-danger'>No search result found.</div>
		";
	}else{
		while($row_post=mysqli_fetch_array($result)){
                     $post_id = $row_post['post_id'];
                    $post_title = $row_post['post_title'];
                    $post_author = $row_post['post_author'];
                    $post_category = $row_post['post_category'];
                    $post_status = $row_post['post_status'];
                    $post_image = $row_post['post_image'];
                    $post_content = $row_post['post_content'];
                    $post_date = $row_post['post_date'];
                    $post_tags = $row_post['post_tags'];
                    $post_comment_count = $row_post['post_comment_count'];
                    $post_views = $row_post['post_views'];
  
?>
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="admin/images/<?php echo $post_image; ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> <?php echo $post_author; ?></span>&bullet;
                        <span class="mr-2"><?php echo $post_date; ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count; ?> </span>
                      </div>
                      <h2><?php echo $post_title; ?></h2>
                    </div>
                  </a>
                </div>
<?php 
}

               
	}
}
?>