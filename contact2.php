<?php 
$title = 'Contact ';

include 'template/header.php';?>
<?php 
	$name = $email = $phone= $title = $massage = '';
	$error=[]; 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$title = $_POST['title'];
		$massage = $_POST['massage'];


		if(empty($name)){
			$error['nameErr'] = 'Name is required';
		}
		if(empty($email)){
			$error['emailErr'] = 'Email is required';
		}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$error['emailErr'] = '  Email is required ';
		}
	
		if(empty($title)){
			$error['titleErr'] = 'title is required   ';
		}
		if(empty($massage)){
			$error['massageErr'] = 'massage is required   ';
		}
		if (count($error) == 0) {
			$name = mysqli_real_escape_string($conn, $name);
			$email = mysqli_real_escape_string($conn, $email);
			$title = mysqli_real_escape_string($conn, $title);
			$massage = mysqli_real_escape_string($conn,$massage);
	
			$insert = mysqli_query($conn, "INSERT INTO contact SET name='$name' ,email = '$email' ,title = '$title', `message` = '$massage'");
			
				echo'<div class="text-center alert alert-success"> the massage send </div>';
			
		}else{ 
			echo'<div class="text-center alert alert-danger"> error </div>';
		}
}



?>
<!doctype html>
<html lang="en">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="ftco-section img bg-hero" 
style="  background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url(assets/img/bg.jpg);
background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover; "> 

<div class="container">
<div class="row justify-content-center">
	<div class="col-md-6 text-center mb-5">
		<h2 class="heading-section">Contact us </h2>
	</div>
</div>
<div class="row justify-content-center">
	<div class="col-lg-11">
		<div class="wrapper">
			<div class="row no-gutters justify-content-between">
				<div class="col-lg-6 d-flex align-items-stretch">
					<div class="info-wrap w-100 p-5">
						<h3 class="mb-4">Contact us</h3>

				<div class="dbox w-100 d-flex align-items-start">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-map-marker"></span>
					</div>
					<div class="text pl-4">
					<p><span>Address:</span> Prince Mohammad bin Abdulaziz street, Riyadh</p>
					</div>
				</div>
				<div class="dbox w-100 d-flex align-items-start">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-phone"></span>
					</div>
					<div class="text pl-4">
					<p><span>Phone:</span> <a href="tel://1234567920">+966540211257</a></p>
					</div>
				</div>
				<div class="dbox w-100 d-flex align-items-start">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-paper-plane"></span>
					</div>
					<div class="text pl-4">
					<p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
					</div>
				</div>
				<div class="dbox w-100 d-flex align-items-start">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="fa fa-globe"></span>
					</div>
					<div class="text pl-4">
					<p><span>Website</span> <a href="#">yoursite.com</a></p>
					</div>
				</div>
			</div>
				</div>
				
				<div class="col-lg-5">
					<div class="contact-wrap w-100 p-md-5 p-4">
						<h3 class="mb-4">Complete the data </h3>
		


		<div id="form-message-warning" class="mb-4"></div> 
<div id="form-message-success" class="mb-4">
Your message was sent, thank you!
</div>
		<form method="POST">
			<div class="row">
				<!-- start name -->
				<div class="col-md-12">
					<div class="form-group"> 

						<input type="text" class="form-control" id="name" name="name" placeholder="Name" require
						value="<?=isset($name)? $name : '' ?>">
						<div class="text-danger"><?= isset($error['nameErr']) ? $error['nameErr'] : '' ?></div>
					</div>
				</div>
				<!-- stop name -->
			
				<!-- start email -->
				<div class="col-md-12"> 
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email"require
						value="<?=isset($email)? $email:''?>">
						<div class="text-danger"><?= isset($error['emailErr']) ? $error['emailErr'] : '' ?></div>
					</div>
				</div>
				<!-- stop email -->
				<!-- start title -->
				<div class="col-md-12">
					<div class="form-group">
						<input type="text" class="form-control" name="title" id="title" placeholder="title" require
						value="<?=isset($title)?$title:''?>">
						<div class="text-danger"><?= isset($error['titleErr']) ? $error['titleErr'] : '' ?></div>
					</div>
				</div>
				<!-- stop title -->
				<!-- start massage -->
				<div class="col-md-12">
					<div class="form-group">
						<textarea name="massage" class="form-control" id="massage" cols="30" rows="5" placeholder="$massage"require
						value="<?=isset($massage)? $massage:''?>"> </textarea>
						<div class="text-danger"><?= isset($error['massageErr']) ? $error['massageErr'] : '' ?></div>
					</div>
				</div>
				<!-- stop massage -->
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" value="Send Message" class="btn btn-primary">
						<div class="submitting"></div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>
	</body>
</html> 
<?php include 'template/footer.php'; ?>