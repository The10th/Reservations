<?php 
session_start();
require('practice_connection.php');
$query = "SELECT * FROM reservations WHERE id = {$_GET['id']}";
$res = fetch_record($query);
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<title></title>
</head>
<body>
	<div class='jumbotron'>
		<h1 align='center'>EDIT A RESERVATION</h1>
	</div>
	<div align='center'>
		<form action="process.php?action=update&id=<?= $res['id'];?>" method='post'>
			Name:
			<br><input type='text' name='contact' value="<?= $res['contact'];?>" placeholder='name'><br>
			<br> Phone #:
			<br><input type='text' name='phone_number' value="<?= $res['phone_number'];?>"placeholder='phone #'><br>
			<br> # of Guests:
			<br><input type='number' name='num_of_guests' value="<?= $res['number_of_guests'];?>" placeholder='# of guests'><br>
			<br>Seated?<br>
			Yes: <input type='radio' name='seated' value='true'> 
			No: <input type='radio' name='seated' value='false' checked><br>
			<br><input class='btn btn-danger' type='submit' value='EDIT'>
		</form>
	</div>	
</body>
</html>