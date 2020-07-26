<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Exam-Portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
</head>
<body>

<div class="container p-2 mt-1" id="container">

	<div class="header">
		<nav class="navbar navbar-expand-lg">
			<div class="navbar-brand pt-2" style="width: 150px;">
				<!-- <span>SYSTEM:</span>  -->
				<h3 class="my-color">OTHER INSTRUCTIONS</h3>
				<a href="#" style="font-size: 12px;" class="text-white">
					Click here if the image and name shown in the screen is not yours
				</a>
			</div>
			<!-- <a class="navbar-brand" href="#">Navbar</a> -->
			<div class="collapse navbar-collapse" id="navbarNav">
			<?php $candidate = $_SESSION['infodata']; ?>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-3">
						<span>Candidate Name:</span>
						<h2 class="my-color"><?= $candidate['name']?></h2>
						<p>Subject : <span class="my-color"><?= $candidate['sub_name']?></span></p>
					</li>
					<li class="nav-item">
						<img src="<?= base_url('uploads/').$candidate['image']?>" alt="candidate image" height="100%"
							width="100">
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div id="body">
		<div class="jumbotron my-4 border text-justify bg-light" style="left: 10%;width:80%;padding:50px;">
			<p class="bg-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis soluta dolores
				eaque
				minus enim repellat ea in vero accusamus, recusandae saepe excepturi animi similique cupiditate. Quod,
				nulla, earum veritatis tempore quas id possimus cumque illo beatae laborum inventore sit et, blanditiis
				sapiente odio! Eaque eum impedit qui dignissimos, tempore maxime.</p>
			<hr>
			<p class=" mt-4" style="font-size: 20px;">
				<span>Choose your default language :
					<select name="" id="">
						<option value="" selected>--select--</option>
						<option value="">English</option>
						<option value="">Bengali</option>
					</select>
				</span>
			</p>
			<p class="text-danger">Please not all question will appear in your default language.
				This language can be changed for a particular question later on.</p>

			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="customCheck1">
				<label class="custom-control-label" for="customCheck1">Lorem ipsum dolor sit amet consectetur,
					adipisicingelit. Voluptas exercitationem provident autem officiis consequuntur tenetur. Mollitia a
					id deleniti cum laboriosam, possimus ea autem obcaecati veritatis alias labore animi
					doloremque.</label>
			</div>
			<hr>
			<p class="text-center">
				<a href="<?= base_url('welcome/login')?>" class="btn btn-lg btn-primary mx-4">&lt;Previous</a>
				<a href="<?= base_url('exam')?>" class="btn btn-lg btn-primary">Ready to begin</a>
			</p>
		</div>
	</div>

	<div class="footer border-top pt-2">
		<p>By using this site you acknowledge and agree to our terms of use & privacy policy. We do not sell personal
			information to 3rd parties.</p>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>