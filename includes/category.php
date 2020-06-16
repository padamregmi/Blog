 
<?php 
$get_cat = "SELECT * FROM categories ORDER BY cat_id LIMIT 6";
$run_cat = mysqli_query($con,$get_cat);
?>
 <div class="sidebar-box">
  	<h3 class="heading">Categories</h3>
        <ul class="categories">
        	<?php
        		while($row_cat = mysqli_fetch_array($run_cat)){
        			$cat_id = $row_cat['cat_id'];
        			$cat_title = $row_cat['cat_title'];
              $get_post = "SELECT * FROM post WHERE post_category_id=$cat_id AND post_status='published'";
              $run_post = mysqli_query($con,$get_post);
              $count_cat = mysqli_num_rows($run_post );
        			echo "
        			<li>
        			<a href='category.php?cat_id=$cat_id''>$cat_title<span>($count_cat)</span></a>
        			</li>

        			";
             
               }   
               ?>
         </ul>
</div>
