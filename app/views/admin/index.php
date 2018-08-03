<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Find it | Admin dashboard </title>

    <!-- Bootstrap core CSS -->
      <script src="../public/js/jquery.min.js"></script>
    <link href="../public/css/bootstrap.css" rel="stylesheet">
  
    

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
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ads Page</a>
          </li>
          <li class="nav-item">
          	<?php
          	if(isset($_SESSION['admin_id'])){
          		echo '<a class="nav-link disabled" href=" ' . URL_ROOT . 'admins/logout">Logout</a>';
          	}
            ?>
          </li>
        </ul>
        
      </div>
    </nav>

    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Advertising management</h1>
        <p class="lead"><strong>Hi <?php echo $_SESSION['admin_name'];?></strong> ! have a good day . decide what you want to publish or delete . </p></p>This is the list of submitted advertising from customers </p>
        <div class="table-responsive">
	        <table class="table table-striped table-dark">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Subject</th>
			      <th scope="col">Description</th>
			      <th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody id="adsOutput">
			    
			  </tbody>
			 </table>
		</div>
		  <nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-center" id="pageOutput">
			    <?php 
			    	for($i = 1 ; $i <= $data['total_pages'] ; $i++){
			    		echo "<li id='pagesNum' class='page-item'><a href='javascript::void(0);'  name='page'  class='page-link' currentPage=" . $i ." >" . $i ."<a></li>";
			    	}
			    ?>
			  </ul>
			</nav>

      </div>
    </main>

     
    





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">

    $('.page-link').on('click',function(){
    	var page = this.getAttribute('currentPage');
    	if(page == 1 ){
    		$("#adsOutput").html('');
    		adsOutput();
    	}else{



    	var vars = {
    		page:page
    	};
    	$.post('<?php echo URL_ROOT;?>admins/page',vars,function(data){
    		var adminid = '<?php echo $_SESSION['admin_id'];?>';
    		var response = jQuery.parseJSON(data);
    		$('#adsOutput').html('');
    		for(var item in response){
    			$('#adsOutput').append('<tr>');
				$('#adsOutput').append('<th score="row">' +item);
				$('#adsOutput').append('<td>' + response[item].title + '</td>');
				$('#adsOutput').append('<td>' + response[item].subject + '</td>');
				$('#adsOutput').append('<td>' + response[item].description + '</td>');
				$("#adsOutput").append('<td><input type="submit" class="publish btn btn-success" value="publish" adid=' + response[item].id +  ' adminid=' +adminid +' ><input type="submit" class="delete btn btn-danger" value="delete" adid=' + response[item].id +  ' adminid=' +adminid +' ></td>' );

 	  		}
  
    	})





    	}
   
    })

	$(document).ready(function(){
		adsOutput();
	})

		
	function adsOutput(){
		$.getJSON('<?php echo URL_ROOT;?>admins/index',function(data){
			var adminid = '<?php echo $_SESSION['admin_id'];?>';
			$.each(data,function(i,item){
				$('#adsOutput').append('<tr>');
				$('#adsOutput').append('<th score="row">' + i);
				$('#adsOutput').append('<td>' + data[i].title + '</td>');
				$('#adsOutput').append('<td>' + data[i].subject + '</td>');
				$('#adsOutput').append('<td>' + data[i].description + '</td>');
				$("#adsOutput").append('<td><input type="submit" class="publish btn btn-success" value="publish" adid=' + data[i].id +  ' adminid=' +adminid +' ><input type="submit" class="delete btn btn-danger" value="delete" adid=' + data[i].id +  ' adminid=' +adminid +' ></td>' );

				console.log(data);
				
			})
		})
	}
	

	$("#adsOutput").on('click','.delete',function(){
		var adid = this.getAttribute('adid');
		var vars = {
			adid:adid
		};
		$.post('<?php echo URL_ROOT ;?>admins/noPermissionSets',vars,function(data){
			$('#adsOutput').html('');
			adsOutput();
		})

	})
	


	$("#adsOutput").on('click','.publish',function(){
		var adid = this.getAttribute('adid');
		var adminid = this.getAttribute('adminid');
		var vars = {
			adid:adid,
			adminid:adminid
		};
		$.post('<?php echo URL_ROOT ;?>admins/permissionSets',vars,function(data){
			$('#adsOutput').html('');
			adsOutput();
		})

	})
		
    </script>
  </body>
</html>
