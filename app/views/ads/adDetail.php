<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Find it | Admin dashboard </title>

    <!-- Bootstrap core CSS -->
      <script src="<?php echo URL_ROOT; ?>js/jquery.min.js"></script>
    <link href="<?php echo URL_ROOT; ?>css/bootstrap.css" rel="stylesheet">
  
    

    <!-- Custom styles for this template -->
    <style>
    	/* Show it is fixed to the top */
		body {
		  min-height: 75rem;
		  padding-top: 4.5rem;
		}
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Find it</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
         	<a class="nav-link disabled" href="<?php echo URL_ROOT; ?>ads/index">AdsPage</a>
          </li>
        </ul>
        
      </div>
    </nav>

     <main role='main' class='container'>
      <div class='jumbotron' style='background-color: white;'>

<?php 
	foreach ($data['ad'] as $ad) {
		echo "

			<div class='card text-center'>
		  <div class='card-header'>"
		    . $ad->subject ."
		  </div>
		  <div class='card-body'>
		    <h5 class='card-title'>" . $ad->title . "</h5>
		    <p class='card-text'>" . $ad->description . "</p>
		    <a href='#' class='btn btn-primary'>" . $ad->sellerphone ."</a>
		  </div>
		  <div class='card-footer text-muted'>" . $ad->location ."
		  " . time_ago($ad->created_at) . " 
		  </div>
		</div>

		";
	}

?>
   
    	
        
      </div>
    </main>

     
    





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
  </body>
</html>
