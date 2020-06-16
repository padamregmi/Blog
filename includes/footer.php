<?php 
              $get_user = "SELECT * FROM users WHERE role='Admin'";
              $run_user = mysqli_query($con,$get_user);
              $row_user = mysqli_fetch_array($run_user);
              $user_name = $row_user ['user_name'];
              $user_image = $row_user ['user_image'];
                  
              ?>
<footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="admin/images/<?php echo $user_image; ?>" alt="Image placeholder" class="img-fluid" width='200px' height='200px'>
              </p>

              <p>Our company mostly workd on the technological innovation and trends to provide the latest updates regardinga any sorts of technological solutios to the community. <a href="#">Read More</a></p>
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Latest Post</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                      
                      <?php 
                          $get_post = "SELECT * FROM post WHERE post_status='published' ORDER BY post_id DESC LIMIT 3";
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
                                <span class="ml-2"><span class="fa fa-comments"></span><?php echo $post_comment_count;?></span>
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
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">
                      <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                      <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span> Linkedin</a></li>
                      <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                     
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://padamregmi.com.np" target="_blank" >Padam Regmi</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>