<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bootstrap Gray Login Theme">
	<meta name="author" content="Ari Effendi">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/style.css" rel="stylesheet">

	<title>Layanan surat keluar - JSI</title>
</head>
<body>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<a class="brand">Login</a>
	</div>
</div>
<div class="row">
	<div class="dialog">
		
		<div class="block">
		<div><center><h3>SI Surat Keluar</h3></center></div>
		<form name="frm-login" method="post" action="autentifikasi.php">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input class="input-medium user" id="prependedInput" type="text" name="username" placeholder="Username">
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input class="input-medium pass" id="prependedInput" name="password" type="password" placeholder="Password">
			</div>
			<button class="btn btn-success btn-block btn-login" type="submit">
				Login
			</button>
		</form>
		</div>
	</div>
</div>

</body>
</html>
