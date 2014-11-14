<?php 
	require('practice_connection.php');
	$query = "SELECT * FROM reservations WHERE id = {$_GET['id']}";
	$res = fetch_record($query);
 ?>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 	<title></title>
 </head>
 <body>
 	<div id='container' class='container'>
	 	<h1 class='jumbotron' align='center'>confirm deletion</h1>
	 	<?php 
	 		echo
	 		"
	 		<div class='sup' align='center'>
		 		<h3>Name: <span class='emphasis'>{$res['contact']}</span></h3>
		 		<h3>Phone number: <span class='emphasis'>{$res['phone_number']}</span></h3>
		 		<h3>Number of guests: <span class='emphasis'>{$res['number__of_guests']}</span></h3>
		 		<h3>Reservation Made At: <span class='emphasis'>{$res['created_at']}</span></h3>
		 		<a href='process.php?action=confirm_delete&id={$_GET['id']}'><button class='btn btn-success'>YES</button></a>
		 	 	<a href='index.php'><button class='btn btn-danger'>NO</button></a>
	 	 	</div>
	 		";
	 	 ?>
 	 </div>
 	 
 </body>
 </html>