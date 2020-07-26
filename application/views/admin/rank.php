<?php
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

	<title>Questions!</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css')?>">
    <style>
        table{
			background: rgba(255,255,255,0.5);
		}
    </style>
  </head>
  <body>
  	<div id="particles-js">
		  <div style="width: 100%;position:absolute;">
		  <a href="<?= base_url('admin/logout')?>" class="float-right btn btn-outline-warning  p-2 m-2 ">LOGOUT</a>
			  <a href="<?= base_url('admin')?>"
  			class="float-right btn p-2 m-2 btn-outline-warning">Dashboard</a>
		  <div style="width: 50%;margin-top:5%;" class="p-2 mx-auto border rounded border-warning">
		  <table class="table table-hover">
  				<thead class="thead-light">
  					<tr>
  						<th scope="col">rank</th>
  						<th scope="col">roll</th>
  						<th scope="col">Score</th>
  						<th scope="col">Action</th>
  					</tr>
  				</thead>
  				<tbody>
				  <?php $sl = 1;?>
  					<?php foreach($data as $d):?>
  					<tr>
  						<th scope="row"><?= $sl;?></th>
  						<td><?= $d->roll;?></td>
                          <td><?= $d->score;?></td>
                          <td>
                              <a href="" title="answer script">
                              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 0 1 5 10h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg>
                              </a>
                          </td>
					  </tr>
					  <?php $sl++; ?>
					  <?php endforeach; ?>
				  </tbody>
			  </table>
  		</div>
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