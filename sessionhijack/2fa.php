<?php
	session_start();
	include_once 'data.php';
	include_once 'codes.php';
	
	if (isset($_POST['login'])) {
		if ($_POST['code'] == $codes[$_GET['user']]) {
			$_SESSION['authuser'] = $_POST['user'];
			header("Location: welcome.php"); return;		
		}
		else{
			echo "Incorrect Code";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enter code</title>
	<style type="text/css">
		table{
			border: 1px solid black;
			border-collapse: collapse;
		}
		th,td{
			padding: 5px;
			border: 1px solid black;
		}
	</style>
</head>
<body>

	<h4>Welcome <?= $_GET['user'] ?>, please enter the code: <?= $codes[$_GET['user']] ?></h4>
	<form method="post" id="form">
		<input type="hidden" name="user" value="<?= $_GET['user']?>">
		<label for="code">Code: </label>
		<input type="text" name="code" id="code">
	</form><br><br>
	<button form="form" name="login">Login</button><br>
	<button form="form" name="logout">Logout</button>
	<br><br><br>
</body>
</html>