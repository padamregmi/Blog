
<?php 
$get_post = "SELECT * FROM post WHERE post_status='published'";
$run_post = mysqli_query($con,$get_post );
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
                    $post_comment_count = $row_post['post_comment_count'];
                    $post_views = $row_post['post_views'];
  
?>
                <div class="col-md-6">
                  <a href="single.php?post=<?php echo $post_id; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
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
?>
               