<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/profile_styles.css') ?>">
	<title>My Profile</title>
</head>

<body>
	<div class="container">
		<p class="infotext">
			<?php
			foreach ($services as $row) {
				echo "<p class='infohead'>" . $row->services_title . "</p>";
				echo "<div class='servicediv'>";
				echo "<p class='infotext graybg'>" . "DETAILS" . "</p>";
				echo "<p class='infotext'>" . "Price: " . $row->services_price . ".00 PHP" . "</p>";
				echo "<p class='infotext'>" . "Coach: " . $row->users_name . "</p>";
				echo "<p class='infotext'>" . "Workout: " . $row->services_type . "</p>";
				echo "<p class='infotext'>" . "Time: " . $row->services_time . "</p>";
				echo "<p class='infotext'>" . "Day: " . $row->services_day . "</p>";
				echo "<p class='infotext'>" . "Duration: " . $row->services_duration . "</p>";
			}
			?>
		</p>
		<form action="<?php echo base_url() . 'user/avail_service/' . $this->uri->segment(3); ?>">
			<div class="registerbtn">
				<input type="submit" value="BUY">
			</div>
		</form>
	</div>
</body>

</html>