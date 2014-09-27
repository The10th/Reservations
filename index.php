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


	<title>A Simple Reservation App</title>

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
			<td><a href='process.php?action=delete&id={$reservation['id']}'><button class='btn btn-danger'>delete</button></a></td>
			<td><a href='process.php?action=edit&id={$reservation['id']}'><button class='btn btn-success'>edit</button></a></td>
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
	<div class='guestForms' align='center'>
		<h2>Make a new reservation</h2>
		<form action='process.php?action=add' method='post'>
			<br>Name:
			<br><input type='text' name='contact' placeholder='name'><br>
			<br>Phone Number:
			<br><input type='text' name='phone_number' placeholder='phone #'><br>

			<br>Number of guests <br>
			<input type='number' name='num_of_guests' placeholder='# of guests'><br>

			<br>Have guests been seated?<br>
			Yes: <input type='radio' name='seated' value='true'>
			No: <input type='radio' name='seated' value='false'><br>
			<br> <input class='btn btn-info'type='submit' value='add reservation!'>
		</form>
	</div>
</body>
</html>
