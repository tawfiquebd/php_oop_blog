<?php include_once 'inc/header.php';?>

<!--================ Hero sm Banner start =================-->      
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Category</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">PHP</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm Banner end =================-->    

  <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">


				<?php
					if (!isset($_GET['category']) || $_GET['category'] == NULL) {
					    header("location: 404.php");
					}
					else{
				    	$cat_id = $_GET['category'];
				  	}

	              $query = "SELECT * FROM tbl_posts WHERE cat_id = '$cat_id' ";
	              $posts = $dbObj->select($query);
	              if ($posts) {
	                while ($result = $posts->fetch_assoc()) {
	                  
	            ?>
	            <div class="single-recent-blog-post">
	              <div class="thumb">
	                <img width="100%" height="300" class="img-responsive" src="admin/<?php echo $result['image']?>" alt="">
	                <ul class="thumb-info">
	                  <li><a href="#"><i class="ti-user"></i><?php echo $result['author']?></a></li>
	                  <li><a href="#"><i class="ti-notepad"></i><?php echo $formatObj->dateFormat($result['date'])?></a></li>
	                  <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
	                </ul>
	              </div>
	              <div class="details mt-20">
	                <a href="post.php?id=<?php echo $result['id']?>">
	                  <h3><?php echo $result['title'] ?></h3>
	                </a>

              	 	<?php echo $formatObj->postBodyShorten($result['body'])?>
              	 	
	                <a class="button" href="post.php?id=<?php echo $result['id']?>">Read More <i class="ti-arrow-right"></i></a>
	              </div>
	            </div>
	          <?php

	            }
	            /* End of while loop*/
	        	} /* End of if condition*/
	        	else{
	        		echo "<h4>No posts found in this category!</h4>";
	        	} // End of else condition

	            ?>
        	</div>






<?php include_once 'inc/sidebar.php' ?>

<?php include_once 'inc/footer.php'?>