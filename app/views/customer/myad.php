<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Find it || sell or buy what you need</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/ad-index.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal"><a class='btn btn-dark' href="<?php echo URL_ROOT; ?>ads/index">Ads page</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
      </nav>
      <?php
      if(isset($_SESSION['customer_name'])){
      	echo "<a class='btn btn-outline-danger' href=' " . URL_ROOT . "customers/logout'>Logout</a>";
      }
      ?>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><strong><?php if(isset($_SESSION['customer_name'])) {echo ucwords($_SESSION['customer_name']);}?></strong> You have <?php 
        foreach ($data['adsNumber'] as $adsnum) {
          echo $adsnum->total;
        }
       ?> Ads!</h1>
      <p class="lead">Help us keeping Find it clean and fast with removing unnecessary ads</p></p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
      	<?php

      	foreach ($data['ads'] as $ad) {
        if($ad->admin_permission == 0){
          $situation = 'Wait for confirmation';
          $class = 'btn btn-lg btn-block btn-warning';
        }else{
          $situation = 'Confirmed and showen';
          $class = 'btn btn-lg btn-block btn-success';
        }

      		echo "


      			<div class='card mb-4 box-shadow'>
		          <div class='card-header'>
		            <h4 class='my-0 font-weight-normal'>" . $ad->title ."</h4>
		          </div>
		          <div class='card-body'>
		            <h1 class='card-title pricing-card-title'>" . $ad->price . "</h1>
		            <ul class='list-unstyled mt-3 mb-4'>
		              <li>" . $ad->description . "</li>
		            </ul>
		            <a href='#'' class='" . $class . "'>" . $situation . "</a>
		          </div>
		        </div>

      		";
      	}
     
        ?>

        
      </div>


      <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Your advertise title here .. </h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Price here .. </h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>And a little description here .. </li>
            </ul>
            <a href="<?php echo URL_ROOT ?>ads/newAd"  class="btn btn-lg btn-block btn-outline-primary">submit your advertise for free !</a>
          </div>
        </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
      	 <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../public/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../public/js/vendor/popper.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
