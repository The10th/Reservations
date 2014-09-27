<?php 
	require('practice_connection.php');
	$query = "SELECT * FROM reservations WHERE id = {$_GET['id']}";
	$res = fetch_record($query);
 ?>
 <html>
 <head>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">s
 	<title></title>
 </head>
 <body>
 	<h1 align='center'>Confirm Reservation Delete</h1>
 	<?php 
 		echo
 		"
 		<div align='center'>
	 		<h3>Name: {$res['contact']}</h3>
	 		<h3>Phone number: {$res['phone_number']}</h3>
	 		<h3>Number of guests: {$res['number_of_guests']}</h3>
	 		<h3>Created at: {$res['created_at']}</h3>
	 		<a href='process.php?action=confirm_delete&id={$_GET['id']}'><button class='btn btn-confirm'>YES</button></a>
	 	 	<a href='index.php'><button class='btn btn-danger'>NO</button></a>
 	 	</div>
 		";
 	 ?>
 	 
 </body>
 </html>