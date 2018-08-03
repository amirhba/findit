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
    <link href="<?php echo URL_ROOT; ?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo URL_ROOT;?>css/ad-index.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <?php 
       if(isset($_SESSION['customer_id'])){
        $linkValue = 'Profile';
        $linkHref  = '' . URL_ROOT . 'customers/myads'; 
       }else{
        $linkValue = 'Register';
        $linkHref  = '' . URL_ROOT . 'customers/register';
       }
      ?>
      
      <h5 class="my-0 mr-md-auto font-weight-normal"><a class='btn btn-dark' href="<?php echo $linkHref; ?>"><?php echo $linkValue; ?></a></h5>
        <nav class="navbar">
      <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
      <nav class="my-2 my-md-0 mr-md-3">
      	<div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Subjects
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              
            <?php foreach($data['subjects'] as $subject) : ?>
                  
                <form method="GET" action="<?php echo URL_ROOT;?>ads/filterbysubject">
                <input type="hidden" name="subject_val" value="<?php echo $subject->name; ?>">
                <input type="submit" class="dropdown-item" value="<?php echo $subject->name;?>">
                </form>
              
          <?php endforeach ;?>
           
          </div>
        </div>
      </nav>
    
      <?php
      if(isset($_SESSION['customer_name'])){
      	echo "<a class='btn btn-outline-danger' href=' " . URL_ROOT . "customers/logout '>Logout</a>";
      }else{
      	echo "<a class='btn btn-outline-primary' href=' " . URL_ROOT . "customers/login'>Login</a>";
      }
      ?>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><strong><?php if(isset($_SESSION['customer_name'])) {echo ucwords($_SESSION['customer_name']);}?></strong> what you need ?</h1>
      <p class="lead">Find what you need in findit . The latest things for sells shown below<p>you can select sepecific subject and lookup much more easier</p></p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
      	<?php

      	foreach ($data['ads'] as $ad) {
      		echo "


      			<div class='card mb-4 box-shadow'>
		          <div class='card-header'>
		            <h4 class='my-0 font-weight-normal'>" . $ad->title ."</h4>
		          </div>
		          <div class='card-body'>
		            <h1 class='card-title pricing-card-title'>" . $ad->price . " $</h1>
		            <ul class='list-unstyled mt-3 mb-4'>
		              <li>" . $ad->description . "</li>
		            </ul>
                <form method='GET' action='http://localhost/findit/ads/detail'>
                <input type='hidden' name='ad_id' value='" . $ad->id . "'>
		            <input type='submit' class='btn btn-lg btn-block btn-primary' value='More detail'>
                </form>
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
    <script>window.jQuery || document.write('<script src="<?php echo URL_ROOT;?>js/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo URL_ROOT;?>js/popper.min.js"></script>
    <script src="<?php echo URL_ROOT;?>js/bootstrap.js"></script>
    <script src="<?php echo URL_ROOT;?>js/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
