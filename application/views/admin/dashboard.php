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

	<title>Dashboard!</title>
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
  			<a style="z-index: 2;" href="<?= base_url('admin/logout')?>"
  				class="float-right btn btn-outline-warning  p-2 m-2 ">LOGOUT</a>
  			<div style="width: 65%;margin-top:5%;" class="p-2 mx-auto border rounded border-warning">
  				<table class="table table-hover">
  					<thead class="thead-light">
  						<tr>
  							<th scope="col">#</th>
  							<th scope="col">Subject
  								<a href="#" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#addSubject">Add
  									Subject</a>
  							</th>
  							<th scope="col">Question</th>
							  <th scope="col">Candidate</th>
							  <th>Actions</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php $sl = 1;?>
  						<?php foreach($data as $d):?>
  						<tr>
  							<th scope="row"><?= $sl;?></th>
  							<td>
  								<a href="<?= base_url('admin/editSubject/').$d->sub_id?>"
									  class="text-dark font-weight-bold"><?= $d->sub_name;?></a>	
									  <!-- <span class="badge badge-danger">							 -->
									<?php
									 echo ($d->status=='closed')?'<span class="badge badge-danger">':'<span class="badge badge-success">';
									 echo $d->status;
									 ?>
									 </span>
  							</td>
  							<td>
  								<a href="<?= base_url('admin/question/').$d->sub_id?>"
  									class="text-dark"><?= $d->total_qs;?>
  									questions</a>
  							</td>
  							<td>
  								<a href="<?= base_url('admin/candidate/').$d->sub_id?>"
  									class="text-dark cnd-link"><?= $d->total_c;?>
  									candidates</a>
							  </td>
							  <td>
							  <a href="<?= base_url('admin/deleteSubject/').$d->sub_id?>"
									  class="text-danger mr-4" title="delete">
									  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash bg-white p-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</a>
								<?php echo ($d->status=='closed')? '
								  <a href="rank/'.$d->sub_id.'" class="" title="generate report">
								  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
</svg>
								  </a>':'' ?>
							  </td>
  						</tr>
  						<?php $sl++; ?>
  						<?php endforeach;?>
  					</tbody>
  				</table>
  			</div>
  			<p class=" text-white" style="margin-left: 18%;"><b>Note</b> : last entered data comes first in the list.</p>
  		</div>
	  </div>
	  
	  <!-- Modal -->
<div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Subject....</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/addSubject')?>" method="POST" style="width: 80%;" class="mx-auto">
				<div class="form-group">
					<label for="exampleInputPassword1">Subject Name :</label>
					<input type="text" class="form-control" name="sub_name" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Advertisement No. :</label>
					<input type="text" class="form-control" name="advt_no" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Exam Duration (in minutes) :</label>
					<input type="text" class="form-control" name="duration" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Positive Marking :</label>
					<input type="text" class="form-control" name="positive" id="">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Negative Marking :</label>
					<input type="text" class="form-control" name="negative" id="">
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