<?php
if($_POST["submit"]){
	if(!$_POST["name"]){
		$error="<br />Please enter your name";
	}
	if(!$_POST["email"]){
		$error.="<br />Please enter your email";
	}
	if (!$_POST['comment']) {
		 $error.="<br />Please enter a comment";
	 }		
	if($_POST["email"]!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error.="<br />Please enter valid email<br />";
	}	
	if($error){
		$results='<div class="alert alert-danger"><strong>There were error(s)</strong> in your form: '.$error.'</div>';
	}else{
		if(mail("chunfang2007@gmail.com", "comments from duplicate", " Name: ".$_POST['name']." Email: ".$_POST['email']."Comments: ".$_POST['comment'])){
			$results='<div class="alert alert-success"><strong>Thank you!</strong></div>';
		}else{
			$results='<div class="alert alert-danger"><strong>Sorry, There were error sending your message</strong>Please try later</div>';
		}
	}
}
?>
<!doctype html>
<html>
<head>
<title>practice contact form</title>

<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<style>
	.emailform{
		border:1px solid grey;
		border-radius:10px;
		margin-top:20px;
		color:red;
	}
	form{
		padding-bottom:20px;
	}
</style>
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3 emailform">
		<h1>let's do it again</h1>
		<?php echo $results;?>
		<p class="lead">Please keep in touch. I will get back ASAP</p>
		<form method="post">
			<div class="form-group">
				<label for="name"> Your Name: </label>
				<input type="text" name="name" class="form-control" 
				placeholder="Your Name" value="<?php echo $_POST['name']; ?>" />
			</div>
			<div class="form-group">
				<label for="email"> Your Email: </label>
				<input type="email" name="email" class="form-control" 
				placeholder="Your Email" value="<?php echo $_POST['email']; ?>" />
			</div>
			<div class="form-group">
				<label for="comment">Your Comment:</label>
				<textarea class="form-control" name="comment"><?php echo $_POST['comment']; ?></textarea>
			</div>
			<input type="submit" name="submit" class="btn btn-success btn-lg" Value="Submit" />
					
		</form>
	</div>
	</div>
	</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>