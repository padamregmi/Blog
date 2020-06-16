 <?php include("includes/header.php"); ?>
  <?php include("includes/navigation.php"); ?>
  <?php include("includes/db.php"); ?>

    <div class="wrap"><!-------wrap begin------------------->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Categories</h2>
            </div>
          </div>

        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                  <?php include("includes/cat_posts.php"); ?>
              </div>
            </div>
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