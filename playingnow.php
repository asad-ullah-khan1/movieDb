<?php
	require_once('curl-playing.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>ifi Movies Database</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
	  <a class="navbar-brand" href="index.php">ifi Movie db</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="popular.php">Popular Movies</a>
	      </li>
	     <li class="nav-item">
	        <a class="nav-link" href="upcoming.php">Upcoming movies</a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="playingnow.php">Now Playing movies</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="latest.php">Latest</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav>
	
	
	<div class="container">
		
		<!-- popular movies section -->
		<section class="row">


				<?php
					foreach ($popmovies['results'] as $movie => $item) { ?>
					
					<div class="col-md-4 my-2">
						
						<h5><a href="single.php?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></h5>
						<img class="img-fluid" src="https://image.tmdb.org/t/p/w500/<?php echo $item['poster_path']; ?>" alt="">
						<p class="my-2">
							<?php echo $item['overview']; ?>
						</p>
						<p>
							vote count : <span class="float-right"> <?php echo $item['vote_count']; ?></span><br>
							
							id :<span class="float-right"> <?php echo $item['id']; ?></span><br>
							
							vote average :<span class="float-right"> <?php echo $item['vote_average']; ?></span><br>
							
							popularity :<span class="float-right"> <?php echo $item['popularity']; ?></span><br>
							
							Language :<span class="float-right"> <?php echo $item['original_language']; ?></span><br>
							release date :<span class="float-right"> <?php echo $item['release_date']; ?></span><br>
						</p>
					</div>

				<?php } ?>


		</section>
	</div>
	<!-- End of main container -->
	

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>