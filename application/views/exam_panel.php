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
			<div class="navbar-brand pt-2" style="width: 250px;">
				<span class="countdown display-2 font-weight-bold float-right"></span>			
			</div>
			<div class="collapse navbar-collapse" id="navbarNav">
			<?php $candidate = $_SESSION['infodata']; if(empty($candidate)){redirect('welcome');}  ?>
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
	<div class="progress" style="height: 5px;">
		<div class="progress-bar  bg-danger" role="progressbar"  ></div>
	</div>

	<div id="body">     
	    <div class="jumbotron  border text-justify bg-light" style="left: 10%;width:80%;padding:20px 50px;">			       
		<ul class="list-inline text-center pagelink">
			<?= $pagelinks; ?>
		</ul>	
			<hr>
			<?php
				$qs = $question[0];
				$submit = $question[1];
				if(isset($submit['ans_given'])){
					$ans = $submit['ans_given'];
				}else{
					$ans=0;
				}				
			  ?> 
			<p id="des" class="my-4" style="font-size: 20px;"><?= $qs['q_des']; ?></p>
			<input type="hidden" id="q_id" value="<?= $qs['q_id']; ?>">

			<div class="custom-control custom-radio ml-4 mb-3" style="font-size: 20px;"">
				<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="1" <?= ($ans==1)?'checked':''?>>
				<label class="custom-control-label" for="customRadio1">
					<?= $qs['option_1']; ?>
				</label>
			</div>
			<div class="custom-control custom-radio ml-4 mb-3" style="font-size: 20px;"">
				<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="2" <?= ($ans==2)?'checked':''?>>
				<label class="custom-control-label" for="customRadio2">
					<?= $qs['option_2']; ?>
				</label>
			</div>
			<div class="custom-control custom-radio ml-4 mb-3" style="font-size: 20px;"">
				<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="3" <?= ($ans==3)?'checked':''?>>
				<label class="custom-control-label" for="customRadio3">
					<?= $qs['option_3']; ?>
				</label>
			</div>
			<div class="custom-control custom-radio ml-4 mb-3" style="font-size: 20px;"">
				<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="4" <?= ($ans==4)?'checked':''?>>
				<label class="custom-control-label" for="customRadio4">
					<?= $qs['option_4']; ?>
				</label>
			</div>
			
			<br><hr>
	        <p class="text-center">
	            <button class="btn btn-primary mx-4" onclick="prevQs()">&lt;Prev</button>
	            <button class="btn btn-primary mr-4" onclick="">Reset</button>
				<button class="btn btn-primary" onclick="save()">Save</button>
				<button class="btn btn-primary ml-4" onclick="follow()">FollowUp</button>
				<button class="btn btn-primary mx-4" onclick="nextQs()">Next&gt;</button>
	        </p>
		</div>
	</div>
	

	<div class="footer border-top pt-2">
		<p>By using this site you acknowledge and agree to our terms of use & privacy policy. We do not sell personal information to 3rd parties.</p>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/cookie.js')?>"></script>
<script>
	if(getCookie('minutes')){
		var minutes = getCookie('minutes');
		var seconds = getCookie('seconds');
	} else{
		var minutes = <?= $candidate['duration']-1; ?>;
		var seconds = 60;
	}
	
	var limit = 100/((minutes*60)+seconds);

  jQuery(function(){
    jQuery("span.countdown").html(minutes + ":" + seconds);
    var count = setInterval(
		function(){ 
			if((minutes) == 0 && (seconds) == 0) { 
				clearInterval(count);
				jQuery(".jumbotron").hide();
			} else {				 
				if(seconds == 0) { 
					minutes--; 				
					if(minutes < 10) {
						minutes = "0"+minutes; 
					}
					seconds = 59;					
				} 
				seconds--; 
				if(seconds < 10) {
					seconds = "0"+seconds;
				}				
			} 
			setCookie('minutes',minutes);
			setCookie('seconds',seconds);
			jQuery("span.countdown").html(minutes + ":" + seconds);
		}, 
	1000);	
  })

</script>

<script>
	
	$(document).ready(function(){
		var ans = <?= $ans ?>;
		// alert(typeof(ans));
		if(ans >0){
			$('.text-white').parent().addClass('bg-success');
		}else{
			$('.text-white').parent().addClass('bg-primary');
		}
	});

	function save() {
		var ans = <?= $ans ?> ;
		var input_ans = $(".custom-control-input:checked").val();
		// alert(ans+','+input_ans);
		if(input_ans){
			if (input_ans == ans){
				alert('Answer already saved');
				return false;
			}else{
				var q_id = $('#q_id').val();
				if((input_ans != ans) && (ans==0)){
					var base_url = "<?= base_url('exam/save')?>";
					// alert(q_id+','+input_ans);
				}else{
					var base_url = "<?= base_url('exam/updateQs')?>";
				}
				$.ajax({
					type: "POST",
					url: base_url,
					data: {
						q_id,
						input_ans
					},
					datatype: 'json',
					success: function (response) {
						if (response) {
							$('.text-white').parent().addClass('bg-success');
						}
						// alert(response);
					}
				});
			}
		}else{
			alert("Please select an option");
		}
	}
	
	function nextQs(){
		var total = <?= $total?> - 1;
		var offset = "<?= $this->uri->segment(3)?>";
		if(offset<total){	offset++;	}		
		var base_url = "<?= base_url('exam/index/')?>"+offset;
		window.location.href = base_url;		
	}

	function prevQs(){
		var offset = "<?= $this->uri->segment(3)?>";
		if(offset>0){ offset--; }		
		var base_url = "<?= base_url('exam/index/')?>"+offset;
		window.location.href = base_url;		
	}
</script>
</body>
</html>