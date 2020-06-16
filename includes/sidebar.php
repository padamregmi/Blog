
<?php 
              $get_user = "SELECT * FROM users WHERE role='Admin'";
              $run_user = mysqli_query($con,$get_user);
              $row_user = mysqli_fetch_array($run_user);
              $user_name = $row_user ['user_name'];
              $user_image = $row_user ['user_image'];
                  
              ?>


 <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="admin/images/<?php echo $user_image; ?>" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2><?php echo $user_name; ?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                    <p><a href="#" class="btn btn-success btn-sm rounded">Read my bio</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- END sidebar-box -->  
        
          <div class="sidebar-box">
            <h3 class="heading">Recent Posts</h3>
              <div class="post-entry-sidebar">
                  <ul>
              <?php 
                $get_post = "SELECT * FROM post WHERE post_status='published' ORDER BY post_id DESC LIMIT 5";
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
             
                    <li>
                      <a href="single.php?post=<?php echo $post_id; ?>">
                        <img src="admin/images/<?php echo $post_image;?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?php echo $post_title;?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo $post_date;?></span>
                          </div>
                        </div>
                      </a>
                    </li>
           <?php 
          }
          ?>
          </ul>
         </div>
      </div>