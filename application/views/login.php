<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam-Portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
            padding: 0;
            background: #000;
        }
        section{
            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: -2;
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.7)) ,url(<?=base_url( 'assets/images/bg.jpg' )?>);
            background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
        }
        .shadow{
            position: relative;
            margin: 200px auto 0;
            width: 40%;
            height: 50vh;
            text-align: center;
            border: 5px solid #fff;
            /* background: linear-gradient(0deg,#000,#262626); */
            border-radius:20px;
        }
       
        .form-container{
            width: 100%;
            height: 100%;
            background-color: #f3f4f7;
            border-radius:20px;
            position: relative;
            
            text-align: center;
        }
        h4 span{
            color: #2f89fc;
        }
        form{
			width: 50%;
			margin: 5% auto;
		}
    </style>
</head>
<body>
    <section>
        <div class="shadow p-1">
            <div class="form-container  mx-auto pt-4">

            <h2 class="mb-4 p-2" style="background-color:#caccd1;">Authentication needed</h2>
			<form action="<?= base_url('welcome/authenticate')?>" method="POST">
				<div class="input-group mb-4">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupPrepend">
							<img src="<?= base_url('assets/images/user.png')?>" height="20"/>
						</span>
					</div>
					<input type="text" class="form-control" name="roll" aria-describedby="inputGroupPrepend" placeholder="enter roll" autofocus>
				</div>
				<div class="input-group mb-4">
					<div class="input-group-prepend">
						<span class="input-group-text" id="inputGroupPrepend">
							<img src="<?= base_url('assets/images/lock.png')?>" height="20"/>
						</span>
					</div>
					<input type="date" class="form-control" name="dob" aria-describedby="inputGroupPrepend" placeholder="enter dob">
				</div>
				<button type="submit" class="btn btn-block btn-primary sbmt-btn">Submit</button>
			</form>
            </div>
        </div>
    </section>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function(){
        if($(window).innerWidth() <= 1000){
            alert('screen small');
        }
    });
</script>