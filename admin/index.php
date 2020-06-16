<?php 
session_start();
include("includes/db.php");
if(!isset($_SESSION['user_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Technology Admin Area</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
   <body>
   		<div id="wrapper"><!-------wrapper begin----------------->
   			<?php
   				include('includes/sidebar.php');
   			?>
   			<div id="page-wrapper"><!-------page-wrapper begin----------------->
   				<div class="container-fluid"><!-------container-fluid begin----------------->
   					<?php 
   						if(isset($_GET['dashboard'])){
   								include('dashboard.php');
   						}
              if(isset($_GET['insert_post'])){
                  include("insert_post.php");
              }
              if(isset($_GET['view_post'])){
                  include("view_post.php");
              }

               if(isset($_GET['approve_post'])){
                  include("approve_post.php");
              }
               if(isset($_GET['unapprove_post'])){
                  include("unapprove_post.php");
              }
              if(isset($_GET['delete_post'])){
                  include("delete_post.php");
              }

              if(isset($_GET['edit_post'])){
                  include("edit_post.php");
              }
               if(isset($_GET['categories'])){
                  include("categories.php");
              }
               if(isset($_GET['delete_cats'])){
                  include("delete_cats.php");
              }
              if(isset($_GET['comments'])){
                  include("comments.php");
              }
               if(isset($_GET['approve_comment'])){
                  include("approve_comment.php");
              }
               if(isset($_GET['unapprove_comment'])){
                  include("unapprove_comment.php");
              }
               if(isset($_GET['delete_comment'])){
                  include("delete_comment.php");
              }
             
              if(isset($_GET['view_users'])){
                  include("view_users.php");
              }
              if(isset($_GET['delete_user'])){
                  include("delete_user.php");
              }
               if(isset($_GET['insert_users'])){
                  include("insert_users.php");
              }
              
               if(isset($_GET['profile'])){
                  include("profile.php");
              }

               if(isset($_GET['settings'])){
                  include("settings.php");
              }

   					?>
   				</div><!-------container-fluid end----------------->
   			</div><!-------page-wrapper end----------------->
   		</div><!-------wrapper end----------------->

   
  </body>
 </html>
 <?php } ?>