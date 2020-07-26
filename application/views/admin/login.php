<?php error_reporting(0);
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Admin, Login!</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css')?>">
    <style>
    </style>
  </head>
  <body>
  	<div id="particles-js" style="height: 59vh;">
  		<div style="width: 100%;position:absolute;">
  			<div style="width: 55%;margin-top:15%;" class=" mx-auto ">
  				<div class="jumbotron shadow-lg bg-white">
  					<h1 class="display-4">Admin Workspace!</h1>
  					<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
  						attention to featured content or information.</p>
  					<hr class="my-4 bg-primary">
  					<p class="">It uses utility classes for typography and spacing to space content out within the larger
  						container.</p>
  					<p class="text-center">
						<!-- Button trigger modal1 -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
						LOGIN
						</button>
						<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-slash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
						</svg>
						<!-- Button trigger modal2 -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
						REGISTER
						</button>  
					  </p>
  				</div>
  			</div>
  		</div>
	  </div>
	  
	  <!-- Modal1 -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Admin Login.....</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/loginProcess')?>" method="POST" style="width: 70%;" class="mx-auto">
			<div class="modal-body text-center">				
					<input type="text" class="form-control mb-2" placeholder="enter your email" name="email" >
					<input type="password" class="form-control" placeholder="enter your password" name="password">					
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Login</button>				
			</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal2 -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Admin Register....</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<form action="<?= base_url('admin/adminRegister')?>" method="POST" style="width: 70%;" class="mx-auto">
					<input type="text" class="form-control" placeholder="enter your name" name="name">
					<input type="text" class="form-control my-2" placeholder="enter your email" name="email">
					<input type="password" class="form-control" placeholder="enter your password" name="password">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Register</button>
				</form>
			</div>
		</div>
	</div>
</div>

 
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  	</script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	  </script>
	   <script src="<?= base_url('assets/js/particles.js')?>"></script>
      
	  <script>
		  particlesJS.load('particles-js', '<?= base_url('assets/js/particles.json')?>', function() {
	console.log('particles.js loaded - callback');
  });
	  </script>
  </body>
</html>