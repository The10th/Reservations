<?php 
	session_start();
	require('practice_connection.php');
	$query = "SELECT * FROM reservations WHERE id = {$_GET['id']}";
	$res = fetch_record($query);
?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<h1>We're going to edit a reservation here!</h1>
 	<form action="process.php?action=update&id=<?= $res['id'];?>" method='post'>
 		Name:<input type='text' name='contact' value="<?= $res['contact'];?>"><br>
 		Phone Number:<input type='text' name='phone_number' value="<?= $res['phone_number'];?>"><br>
 		Number of guests:<input type='number' name='num_of_guests' value="<?= $res['number_of_guests'];?>"><br>
 		Yes:<input type='radio' name='seated' value='true'>
 		No:<input type='radio' name='seated' value='false' checked><br>
 		<input type='submit' value='add reservation!'>
 	</form>
 </body>
 </html>