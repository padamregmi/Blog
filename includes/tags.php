<?php 
$get_post = "SELECT * FROM post ORDER BY post_id LIMIT 5";
$run_post = mysqli_query($con,$get_post );

?>

<div class="sidebar-box">
  <h3 class="heading">Tags</h3>
    <ul class="tags">
      <?php 
      while($row_post=mysqli_fetch_array($run_post)){
                     $post_id = $row_post['post_id'];
                    $post_tags = $row_post['post_tags'];
          echo "
          <li><a href='#''> $post_tags</a></li>
          ";
      
    }
      ?>
     </ul>
</div>