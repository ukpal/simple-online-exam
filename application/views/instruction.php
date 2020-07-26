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
				<h2 class="my-color">INSTRUCTIONS</h2>
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
						<img src="<?= base_url('uploads/').$candidate['image']?>" alt="candidate image" height="100%" width="100">
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<div id="body">
	<h1 class="" style="margin-left: 110px;"><u>General Instructions:</u></h1>
        <div class="jumbotron my-4 border text-justify bg-light" style="left: 10%;width:80%;padding:50px;">
            <p class=""><b>1.</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae facilis fugit perferendis distinctio amet saepe itaque soluta neque ea, officia, libero doloremque autem incidunt nisi. Dignissimos libero dolorem aperiam quos fuga, perspiciatis nesciunt impedit repellat sint nam voluptatum, et vel expedita neque quo fugit animi porro vero eligendi unde cumque!</p>
            <p><b>2.</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae facilis fugit perferendis distinctio amet saepe itaque soluta neque ea, officia, libero doloremque autem incidunt nisi. Dignissimos libero dolorem aperiam quos fuga, perspiciatis nesciunt impedit repellat sint nam voluptatum, et vel expedita neque quo fugit animi porro vero eligendi unde cumque!</p>
            <p><b>3.</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae facilis fugit perferendis distinctio amet saepe itaque soluta neque ea, officia, libero doloremque autem incidunt nisi. Dignissimos libero dolorem aperiam quos fuga, perspiciatis nesciunt impedit repellat sint nam voluptatum, et vel expedita neque quo fugit animi porro vero eligendi unde cumque!</p>
            <p><b>4.</b> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae facilis fugit perferendis distinctio amet saepe itaque soluta neque ea, officia, libero doloremque autem incidunt nisi. Dignissimos libero dolorem aperiam quos fuga, perspiciatis nesciunt impedit repellat sint nam voluptatum, et vel expedita neque quo fugit animi porro vero eligendi unde cumque!</p>
            <p class="text-right"><a href="<?= base_url('welcome/other')?>" class="btn btn-lg btn-primary">Next &gt;</a></p>
		</div>
	</div>

	<div class="footer border-top pt-2">
		<p>By using this site you acknowledge and agree to our terms of use & privacy policy. We do not sell personal information to 3rd parties.</p>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>