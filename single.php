 <?php include("includes/header.php"); ?>
  <?php include("includes/navigation.php"); ?>
  <?php include("includes/db.php"); ?>

    <div class="wrap"><!-------wrap begin------------------->

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">
          <?php 
          if(isset($_GET['post'])){
            $p_id = $_GET['post'];
            $query = "SELECT * FROM post WHERE post_id=$p_id";
            $result  = mysqli_query($con,$query);
          }else{
            header("Location: index.php");
          }

          ?>
          <?php 
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
<div class="col-md-12 col-lg-8 main-content">
            <img src="admin/images/<?php echo $post_image; ?>" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib" class="mr-2"><?php echo $post_author; ?></span>&bullet;
                        <span class="mr-2"><?php echo $post_date; ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count; ?></span>
                      </div>
            <h1 class="mb-4"><?php echo $post_title; ?></h1>
            <a class="category mb-5" href="#"><?php echo $post_category; ?></a>
           
            <div class="post-content-body">
              <p><?php echo $post_content; ?></p>
            <div class="row mb-5">
              <div class="col-md-12 mb-4">
                <img src="images/img_7.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="col-md-6 mb-4">
                <img src="images/img_9.jpg" alt="Image placeholder" class="img-fluid">
              </div>
              <div class="col-md-6 mb-4">
                <img src="images/img_11.jpg" alt="Image placeholder" class="img-fluid">
              </div>
            </div>
          </div>

            
            <div class="pt-5">
              <p>Categories:  <a href="#"><?php echo $post_category; ?></a>, Tags: <a href="#"><?php echo $post_tags; ?></a></p>
            </div>

          <?php
        }
          ?>
          


            <div class="pt-5">
              <h3 class="mb-5">
                <?php
                if(isset($_GET['post'])){
                  $post_id = $_GET['post'];

                }else{
                  $post_id=0;
                }
                $get_comment = "SELECT * FROM comments WHERE comment_status='Approved' AND post_id=$post_id";
                $run_comment = mysqli_query($con,$get_comment );
                $comment_count = mysqli_num_rows($run_comment);
                echo $comment_count . " comment(s)";
                
                 ?>

              </h3>
              <ul class="comment-list">
                
                <li class="comment">
                  
                  <div class="comment-body">
                    <?php
                                  if(isset($_GET['post'])){
                                    $post_id = $_GET['post'];
                                    $get_comment = mysqli_query($con, "SELECT * FROM comments WHERE post_id=$post_id AND comment_status='Approved'");
                                      while($row = mysqli_fetch_array($get_comment)){
                                          $comment_id = $row['comment_id'];
                                          $comment_name = $row['comment_name'];
                                          $comment_body = $row['comment_body'];
                                          $post_id = $row['post_id'];
                                      ?>
                                      <div class="vcard">
                                          <img src="images/person_1.jpg" alt="Image placeholder">
                                       </div>
                                          <h3><?php echo $comment_name; ?></h3>
                                          <p><?php echo $comment_body; ?></p>
                                          <p><a href="#" class="reply rounded">Reply</a></p>
                                          <?php 
                                  }
                                     }
                                  ?>

                                   
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
              <?php
                if(isset($_GET['post'])){
                  $id = $_GET['post'];
                  if(isset($_POST['comment'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $body = $_POST['body'];
                    $comment_obj->addComments($id,$name,$email,$body);
                  }
                }
               ?>
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="single.php?post=<?php echo $post_id; ?>" method="post" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="comment" value="Post Comment" class="btn btn-success">
                  </div>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

         <div class="col-md-12 col-lg-4 sidebar"><!-------col-md-12 col-lg-4 sidebar begin------------------->
              <div class="sidebar-box search-form-wrap">
                <form action="search.php" class="search-form" method="post">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" name="search" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              
             <?php include("includes/sidebar.php"); ?>
          

             <?php include("includes/category.php"); ?>
              

              <?php include("includes/tags.php"); ?>
            </div><!-------col-md-12 col-lg-4 sidebar end------------------->
          

          </div>
        </div>
      </section>
     </div><!-------wrap end------------------->
       <?php include("includes/footer.php"); ?>
     
   
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>
