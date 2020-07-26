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

	<title>Hello, world!</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css')?>">
    <style>
    </style>
  </head>
  <body>
  	<div id="particles-js">
		  <div style="width: 100%;position:absolute;">
		  <a href="<?= base_url('admin/logout')?>" class="float-right btn btn-outline-warning  p-2 m-2 ">LOGOUT</a>
			  <a href="<?= base_url('admin')?>"
  			class="float-right btn p-2 m-2 btn-outline-warning">Dashboard</a>
		  <div style="width: 65%;margin-top:5%;" class="p-2 mx-auto border rounded border-warning">
		  <form class="text-white" id="subjectForm" action="<?= base_url('admin/editQs')?>" method="POST">
			  <input type="hidden" name="q_id" value="<?= $data[0]['q_id'];?>">
  				<div class="form-group ">
  					<label for="Sub_name">Question Description</label>
					  <input type="text" class="form-control" name="q_des" value="<?= $data[0]['q_des'];?>">
				</div>
				<div class="row mb-3">
					<div class="col">
					<label for="">Option 1</label>
					<input type="text" class="form-control" name="option_1" value="<?= $data[0]['option_1'];?>">
					</div>
					<div class="col">
					<label for="">Option 2</label>
					<input type="text" class="form-control" name="option_2" value="<?= $data[0]['option_2'];?>">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col">
					<label for="">Option 3</label>
					<input type="text" class="form-control" name="option_3" value="<?= $data[0]['option_3'];?>">
					</div>
					<div class="col">
					<label for="">Option 4</label>
					<input type="text" class="form-control" name="option_4" value="<?= $data[0]['option_4'];?>">
					</div>
                </div>
                <div class="form-group mb-3">
  					<label for="Sub_name">Correct Option</label>
  					<input type="number" class="form-control" name="answer" value="<?= $data[0]['answer'];?>" min="1" max="4">
				</div>
				<p class="text-center mt-4">					
				  <a href="<?= base_url('admin/question/').$data[0]['sub_id']?>" class="mx-2 btn btn-outline-warning">Back</a>
				  <button type="submit" class="mx-2 btn btn-outline-warning">Save</button>
				</p>
  			</form>
  		</div>

  	</div>

  	<!-- Optional JavaScript -->
  	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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