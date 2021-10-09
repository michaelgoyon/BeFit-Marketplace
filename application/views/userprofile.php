<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profile_styles.css')?>">
    <title>My Profile</title>
</head>

<div class="nav">
      <ul class="items">
        <li><a href="<?php echo base_url('user/marketplace/')?>"><img class="navlogo" src="<?php echo base_url('assets/images/befitlogo.png')?>"></a></li>
        <li class="navitems"><a href="<?php echo base_url('user/marketplace/')?>">Marketplace</a></li>
		<li class="navitems"><a href="<?php echo base_url('user/nutrition/')?>">Nutrition</a></li>
        <li class="navitems"><a href="<?php echo base_url('user/faq/')?>">FAQ</a></li>
        <li class="navitems"><a href="<?php echo base_url('user/aboutus/')?>">About</a></li>
        <li class="navitems"><a href="<?php echo base_url('user/profile/'.$this->session->userdata('userusername'))?>">Profile</a></li>
      </ul>
	  <ul class="items2">
	  	<li class="with-submenu">
		  	<?php
				foreach($users as $row){
			?>
		  	<img src='<?php echo base_url().'uploads/'.$row->users_avatar; ?>'>
			<?php
			}
			?>
            <ul class="submenu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo base_url();?>user/topup">Wallet</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="<?php echo base_url();?>user/logout">Log Out</a></li>
            </ul>
        </li>
	  </ul>
</div>

	  
<body>
<div class="container">
	<div class="body-container">
		<div class="dtls-container">
			<?php
				foreach($users as $row){
			?>
			<div class="info-row">
				<img class="fixed-img" src='<?php echo base_url().'uploads/'.$row->users_avatar; ?>'>
			</div>
			<div class="info-row">
				<p class="name"><?php echo $row->users_name; ?></p>
			</div>
			<div class="info-row">
				<p><?php echo $row->users_account; ?></p>
			</div>
			<div class="btn-edit">
				<a href="#">Edit Profile</a>
			</div>
			<div class="info-row">
				<h1 id="header">ABOUT</h1>
			</div>
			<div class="info-row2">
				<p>Username:</p>
				<p><?php echo $row->users_username; ?></p>
			</div>
			<div class="info-row2">
				<p>Birthdate:</p>
				<p><?php echo $row->users_birthdate; ?></p>
			</div>
			<div class="info-row2">
				<p>Email:</p>
				<p><?php echo $row->users_email; ?></p>
			</div>
			<?php
				}
			?>
		</div>
		<h2 id="border"></h2>
		<div class="form-container">
			<?php 
				$username = $this->uri->segment(3);
				if($_SESSION['userusername'] == $username) {
					echo '<h1>UPDATE YOUR PASSWORD</h1>';
					echo '<form method="post" action="<?php echo base_url();?>user/update_data">';
					echo '<div class="error-msg"><?php echo validation_errors();?></div>';
					echo '<div class="input-form">';
					echo '<label>Enter Current Password: </label>';
					echo '<input type="password" name="c_pass">';
					echo '</div>';
					echo '<div class="input-form">';
					echo '<label>Enter New Password: </label>';
					echo '<input type="password" name="n_pass">';
					echo '</div>';
					echo '<div class="input-form">';
					echo '<label>Re-Enter New Password: </label>';
					echo '<input type="password" name="r_pass">';
					echo '</div>';
					echo '<div class="registerbtn">';
					echo '<input type="submit" value="Submit"/>';
					echo '</div>';
					if($this->session->flashdata('message')) {
						?>
						<div>
							<?php echo $this->session->flashdata('message'); ?>
						</div>
						<?php
						unset($_SESSION['message']);
					}
					echo '</form>';
				}
			?>
		</div>
		<?php
		$username = $this->uri->segment(3);
		if($users[0]->users_account == "Coach" && $_SESSION['userusername'] == $username) {
		?>
		<h2 id="border"></h2>
		<h1>CREATE WORKOUT OFFERS</h1>
			<div class="workout-container">
		
				<form method="post" action="<?php echo base_url();?>user/add_service">
					<div class="input-form2">
						<label>Workout Title</label>
						<input type="text" name="workout_title">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Price</label>
						<input type="text" name="workout_price">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Description</label>
						<textarea type="text" name="workout_description" rows="10" cols="70"></textarea>
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Type</label>
						<input type="text" name="workout_type">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Day</label>
						<input type="text" name="workout_day">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Time</label>
						<input type="text" name="workout_time">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Session</label>
						<input type="text" name="workout_session">
						<div></div>
					</div>
					<div class="input-form2">
						<label>Workout Duration</label>
						<input type="text" name="workout_duration">
						<div></div>
					</div>
					<div class="registerbtn2">
						<input type="submit" value="Add"/>
					</div>
				</form>
			</div>
			<div>
				<div class="info-row">
					<h1 id="header">YOUR SCHEDULE</h1>
				</div>
				<table>
					<thead>
						<tr>
							<th>Option</th>
							<th>Type of Workout</th>
							<th>Availability</th>
							<th>Day</th>
							<th>Time</th>
							<th>Session</th>
							<th>Duration</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($services as $row) {
								echo "<tr>";
						?>
								<td><a href="<?php echo base_url().'user/delete_services?id='.$row->services_id;?>">REMOVE</a></td>
						<?php 
								echo "<td>".$row->services_type."</td>";
								echo "<td>".($row->services_availability == 1 ? "Available" : "Unavailable")."</td>";
								echo "<td>".$row->services_day."</td>";
								echo "<td>".$row->services_time."</td>";
								echo "<td>".$row->services_session."</td>";
								echo "<td>".$row->services_duration."</td>";
							}
						?>
					</tbody>
				</table>
			</div>
		<?php 
			}
		?>
		<?php
		$username = $this->uri->segment(3);
		if($users[0]->users_account == "Coach" && $_SESSION['userusername'] == $username) {
		?>
		<div class="info-row">
			<h1 id="header">CONFIRM TRAINEES</h1>
		</div>
		<?php 
			}
		?>
		<div class="btn-logout">
			<a href="<?php echo base_url();?>user/logout">LOG OUT</a>
		</div>
	</div>
</div>
</body>
</html>