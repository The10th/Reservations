<?php
session_start();
require('practice_connection.php');
$query = "SELECT * FROM reservations";
$reservations = fetch_all($query);
?>
<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" href="bootstrap.css">
	<script type="text/javascript" src='bootstrap.js'></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

	<title>A Simple Reservation App</title>

</head>
<body>
	<div id='container' class='container'>
		<div class='jumbotron'>
			<h1>Reservations</h1>
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
					<td>{$reservation['number__of_guests']}</td>
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
			if(isset($_SESSION['error']))
		{
			echo "<div align='center'><p class='flashEmit'>{$_SESSION['error']}</p></div>";
			unset($_SESSION['error']);
		}
		if(isset($_SESSION['success']))
		{
			echo "<div align='center'><p class='flashEmit'>{$_SESSION['success']}</p></div>";
			unset($_SESSION['success']);
		}
		?>
		<div class='row'>
			<div class='col-md-4'>
				<ul class="nav nav-list">
				    <li class="nav-header">What we are?</li>
				    <li class="active"><a href="#">Home</a></li>
				    <li><a href="#">Menu</a></li>
				    <li><a href="#">Catering</a></li>
				    <li><a href="#">About Us</a></li>
				    <li><a href="#">Contact Us</a></li>
				</ul>
			</div>
			<div class='col-md-8'>
				<div class='guestForms'>
					<h3>Make a new reservation</h3>
					<form action='process.php?action=add' method='post'>
						<br>Name:
						<br><input type='text' name='contact' placeholder='name'><br>
						<br>Phone Number:
						<br><input type='tel' maxlength="10" name='phone_number' placeholder='phone #'><br>

						<br>Number of guests <br>
						<input type='number' name='num_of_guests' placeholder='# of guests'><br>

						<br>Seated?<br>
						Yes: <input type='radio' name='seated' value='true'>
						No: <input type='radio' name='seated' value='false'><br>
						<br> <input class='btn btn-info'type='submit' value='add reservation!'>
					</form>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
