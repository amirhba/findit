<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>What you want to sell ?</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/newAd-form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">

        <?php 

          if(isset($data['alertTitle'])){
            echo "

              <div class='alert alert-success' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                  </button>
                <h4 class='alert-heading'>" . $data['alertTitle'] . "</h4>
                <p>" .  $data['alertText'] . "</p>
                <a href='" . URL_ROOT . "customers/myAds' class='btn btn-dark'>See your advertise situation</a>
                <hr>
                <p class='mb-0'>" . $data['alertFooter'] . "</p>
                  
              </div>

            ";
          }

        ?>


        <h2><strong>Dear <?php echo ucwords($_SESSION['customer_name']); ?></strong></h2>
        <p class="lead">You have something that useless for you ? ok let us help you sell it very fast</p>
      </div>

        <div class="mb-3">
          <h4 class="mb-3">Complete below form</h4>
          <form class="needs-validation" method="POST" action="<?php echo URL_ROOT; ?>ads/newAd" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Whats That ?</label>
                <input type="text" class="form-control" id="firstName" name="ad_title" placeholder="Example: iPhone 7" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              
            </div>

            <div class="mb-3">
              <label for="description">Explain it a little</label>
              <div class="input-group">
              	<textarea class="form-control" name="ad_description" placeholder="Example: three numbers of iPhone 7 with their accessory "></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Price ?  <span class="text-muted">($)</span></label>
              <input type="text" class="form-control"  name="ad_price" placeholder="1000">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="username">And your phone number ? </label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">+98</span>
                </div>
                <input type="text" class="form-control" id="username" name="seller_phone" placeholder="Example:9191568798" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Location</label>
                <select class="custom-select d-block w-100" name="ad_location" id="country" required>
                  <option value="">Choose...</option>
                  <option value="Tehran">Tehran</option>
                  <option value="Mashhad">Mashhad</option>
                  <option value="Isfahan">Isfahan</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Subject</label>
                <select class="custom-select d-block w-100" id="state" name="ad_subject" required>
                  <option value="">Choose...</option>
                  <?php 
                  	foreach ($data['subjects'] as $subject) {
               	   		echo "<option value=" . $subject->name .">". $subject->name ."</option>";
                  	}

                  ?>
               
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              
            <hr class="mb-4">
            
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">i have read and i agree with the find it rules </label>
            </div>
            <hr class="mb-4">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send for us and wait for confirmation">
            <a class="btn btn-danger btn-lg btn-block" href="<?php echo URL_ROOT; ?>ads/index">Cansel submitting and get back to the homepage</a>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Find it</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../public/js/jquery-slim.min.js"><\/script>')</script>
    <script src="../public/js/popper.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      
    </script>
  </body>
</html>
