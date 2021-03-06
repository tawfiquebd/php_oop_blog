<?php include_once 'inc/header.php';?>

<!--================ Hero sm Banner start =================-->      
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Search Results</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Search</a></li>
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

					if ( !isset($_GET['search']) || $_GET['search'] == NULL ) {
					    echo "<script>location.href ='404.php'; </script>";
					}
					else{
				    	$search = $_GET['search'];

				    	$query = "SELECT * FROM tbl_posts WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
	              		$posts = $dbObj->select($query);
	              		if ($posts) {
	                	while ($result = $posts->fetch_assoc()) {
	                		echo "<h4 class='orange-color'>Showing results for : $search</h4> <br>";

	              
	            ?>


	            <div class="single-recent-blog-post">
	              <div class="thumb">
	                <img class="img-responsive" width="100%" height="300" src="admin/<?php echo $result['image']?>" alt="">
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
	                <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
	                <p><?php echo $formatObj->postBodyShorten($result['body'])?></p>
	                <a class="button" href="post.php?id=<?php echo $result['id']?>">Read More <i class="ti-arrow-right"></i></a>
	              </div>
	            </div> <hr>

	          <?php

		            }	/* End of while loop*/
		            	
		        	} 	/* End of if condition*/

	        		/* End of first else condition*/

		        	else{
	        			echo "<h2 class='search'>Your search keyword was not found</h2>";
		        	} 
				}

	            ?>

        	</div>






<?php include_once 'inc/sidebar.php' ?>

<?php include_once 'inc/footer.php'?>