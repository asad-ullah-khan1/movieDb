<?php
	
	$id = $_GET['id'];
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.themoviedb.org/3/movie/".$id."?language=en-US&api_key=a33e6d5aa4e0622f7dbe190d7b397a01",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_POSTFIELDS => "{}",
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo "";
	}
	$singleMovie = json_decode($response, true);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>ifi Movies Database</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		

		#singleTitle{
			   position: relative;
			   background: #5C97FF;
			   overflow: hidden;
			   color: #fff;
		}
		/* You could use :after - it doesn't really matter */
		#singleTitle:before {
		    content: ' ';
		    display: block;
		    position: absolute;
		    left: 0;
		    top: 0;
		    width: 100%;
		    height: 100%;
		    z-index: 1;
		    opacity: 0.6;
		    background-image: url('https://image.tmdb.org/t/p/w500/<?php echo $singleMovie['backdrop_path']; ?>');
		    background-repeat: no-repeat;
		    background-position: 50% 0;
		    -ms-background-size: cover;
		    -o-background-size: cover;
		    -moz-background-size: cover;
		    -webkit-background-size: cover;
		    background-size: cover;
		}

	</style>

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
	      <li class="nav-item">
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
	
	<div class="container-fluid">
			<div class="row">
				<div class="col-md-12" id="singleTitle">
						<h3 class="display-4 p-5 m-5"><?php echo $singleMovie['original_title']; ?></h3>	

				</div>
			</div>
	</div>

	<div class="container-fluid">
		
		<!-- breadcrumbs -->
		<section class="row my-1">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
				  <li class="breadcrumb-item "><a href="popular.php">Popular Movies</a></li>
				  <li class="breadcrumb-item "><a href="single.php"><?php echo $singleMovie['original_title']; ?></a></li>
				  
				</ol>
			</div>
		</section>
		
		<h3 class="text-uppercase">Movie Title: <?php echo $singleMovie['original_title']; ?></h3>
		
		<!-- Movie Details section -->
		<section class="row" id="singleMovie">

		
		<div class="col-md-6 my-5">
			<img src="https://image.tmdb.org/t/p/w500/<?php echo $singleMovie['poster_path']; ?>" alt="<?php echo $singleMovie['original_title']; ?>">
		</div>
		<div class="col-md-6 my-5">
			<h3>Movie Poster</h3>
			<img src="https://image.tmdb.org/t/p/w500/<?php echo $singleMovie['backdrop_path']; ?>" class="img-fluid" alt="<?php echo $singleMovie['original_title']; ?>">

			<h3 class="mt-2">Movie Tagline</h3>
			<span><?php echo $singleMovie['tagline']; ?></span>
			<div class="my-5" id="movie-overview">
				<h3>Movie Overview</h3>
				<p><?php echo $singleMovie['overview']; ?></p>			
			</div>
			<div class="movie-details">
				<h3>Release Date</h3>
				<p>Released On: <span id="release_date"><?php echo $singleMovie['release_date']; ?></span></p>
				<h3>Categories</h3>
				<p> 
					<span id="release_date">
					<?php 
						foreach ($singleMovie['genres'] as $category => $value) { ?>
							<span><a href="category.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></span>
					<?php }
						
					?>
					</span>
				</p>
				
			</div>
		</div>
				


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