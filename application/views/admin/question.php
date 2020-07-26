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
    </style>
  </head>
  <body>
  	<div id="particles-js">
		  <div style="width: 100%;position:absolute;">
		  <a href="<?= base_url('admin/logout')?>" class="float-right btn btn-outline-warning  p-2 m-2 ">LOGOUT</a>
			  <a href="<?= base_url('admin')?>"
  			class="float-right btn p-2 m-2 btn-outline-warning">Dashboard</a>
		  <div style="width: 80%;margin-top:5%;" class="p-2 mx-auto border rounded border-warning">
		  <table class="table text-white table-hover">
  				<thead class="thead-light">
  					<tr>
  						<th scope="col">#</th>
  						<th scope="col">Description
						  <a href="<?= base_url('admin/getQs/0')?>" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#addQuestion">Add Question</a>
						  </th>
  						<th scope="col">Option1</th>
  						<th scope="col">Option2</th>
  						<th scope="col">Option3</th>
  						<th scope="col">Option4</th>
						  <th scope="col">Answer</th>
						  <th></th>
  					</tr>
  				</thead>
  				<tbody>
				  <?php $sl = 1;?>
  					<?php foreach($data as $d):?>
  					<tr>
  						<th scope="row"><?= $sl;?></th>
  						<td><a href="<?= base_url('admin/getQs/').$d->q_id?>" class="text-white"><?= $d->q_des;?></a></td>
  						<td><?= $d->option_1;?></td>
  						<td><?= $d->option_2;?></td>
  						<td><?= $d->option_3;?></td>
  						<td><?= $d->option_4;?></td>
						  <td><?= $d->answer;?></td>
						  <td>
						  <a href="<?= base_url('admin/deleteQs/').$d->q_id?>"
									  class="text-danger ml-4" title="delete">
									  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash bg-white p-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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
	  
	  	  <!-- Modal -->
<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Question....</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/addQs')?>" method="POST" style="width: 90%;" class="mx-auto">
				<div class="form-group">
					<label for="exampleInputPassword1">Question Description :</label>
					<!-- <input type="text" class="form-control" name="q_des" id=""> -->
					<textarea name="q_des" class="form-control" id="" cols="20" rows="5" ></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Option 1 :</label>
					<input type="text" class="form-control" name="option_1" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Option 2 :</label>
					<input type="text" class="form-control" name="option_2" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Option 3 :</label>
					<input type="text" class="form-control" name="option_3" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Option 4 :</label>
					<input type="text" class="form-control" name="option_4" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Correct Option :</label>
					<input type="number" class="form-control" name="answer" id=""  min="1" max="4">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" >Submit</button>
				</form>
			</div>
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