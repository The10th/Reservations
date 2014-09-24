<?php
	session_start();
	require('practice_connection.php');
	$query = "SELECT * FROM reservations";
	$reservations = fetch_all($query);
 ?>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="css.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


 	<title>YAY!</title>
 
 </head>
 <body>
 	<div class='jumbotron'>
 		<h1 align='center'>Reservations</h1>
 	</div>

 	<table class ='table'>
 		<thead>
 			<th>Guest Name</th>
 			<th>Number of Guests</th>
 			<th>Contact Number</th>
 			<th>Reservation made at:</th>
 			<th>Seated?</th>
 			<th>DELETE</th>
 			<th>EDIT</th>
 		</thead>
 		<?php 

 			foreach ($reservations as $reservation) 
 			{
 				echo 
 				"<tr>
 					<td>{$reservation['contact']}</td>
 					<td>{$reservation['number_of_guests']}</td>
 					<td>{$reservation['phone_number']}</td>
 					<td>{$reservation['created_at']}</td>
 				    <td>".($reservation['seated']? 'yes': 'no')."</td>
 					<td><button class='btn btn-warning'><a href='process.php?action=delete&id={$reservation['id']}'>DELETE</a></button></td>
		 			<td><button class='btn btn-default'><a href='process.php?action=edit&id={$reservation['id']}'>EDIT</a></button></td>
 				</tr>";
 			}
 		 ?>
 	</table>
 	<?php 
 		if(isset($_SESSION['success']))
 		{
 			echo "<p>{$_SESSION['success']}</p>";
 			unset($_SESSION['success']);
 		}
 	 ?>
	  <div align='center'>
	 	<h2>Make a new reservation</h2>
		 	<form action='process.php?action=add' method='post'>
		 		Name:<input type='text' name='contact'><br>
		 		Phone #:<input type='text' name='phone_number'><br>
		 		# guests:<input type='number' name='num_of_guests'><br>
		 		seated?
		 		Yes:<input type='radio' name='seated' value='true'>
		 		No:<input type='radio' name='seated' value='false'><br>
		 		<input class='btn btn-info'type='submit' value='add reservation!'>
		 	</form>
	 </div>
 </body>
 </html>
