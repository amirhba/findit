<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Customer registration</title>

    <!-- Bootstrap core CSS -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../public/css/admin_login.css" rel="stylesheet">
    <style>
      body {
      min-height: 75rem;
      padding-top: 4.5rem;
    }

    </style>
  </head>
<body class="text-center">

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Find it</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <a class="nav-link disabled" href="http://localhost/findit/ads/index">AdsPage</a>
          </li>
        </ul>
        
      </div>
    </nav>

  <div class="container">
  
    <form class="form-signin" method="POST" action="<?php echo URL_ROOT; ?>customers/register">

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="customer_name" placeholder="Example:John">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="Lastname" name="customer_lastname" placeholder="Example:Jones">
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="customer_email" placeholder="name@example.com">
  </div>


  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" name="customer_password" placeholder="Johnjones5465">
  </div>


    <div class="form-group">
    <label for="confirmpassword">Confirm password</label>
    <input type="password" class="form-control" name="customer_confirm_password" id="confirmpassword" placeholder="Johnjones5465">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="text" class="form-control" id="age" name="customer_age" placeholder="Example:28">
  </div>

  <div class="form-group">
    <label for="phonenumber">Phone number</label>
    <input type="text" class="form-control" id="phonenumber" name="customer_phone" placeholder="Example:+98919465467">
  </div>


  <div class="form-group">
    <label for="location">Location</label>
    <select class="form-control" id="location" name="customer_location">
      <option value="">Choose...</option>
      <option value="Tehran">Tehran</option>
      <option value="Isfahan">Isfahan</option>
      <option value="Mashhad">Mashhad</option>
      <option value="Sari">Sari</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-lg btn-success" value="Complete registration">
  </div>
</form>

</div>
  </body>
</html>
