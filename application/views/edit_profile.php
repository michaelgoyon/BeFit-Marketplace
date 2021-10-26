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
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>My Profile</title>
</head>

	  
<body>
<div class="form-container">
	<?php 
		$username = $this->uri->segment(3);
		if($_SESSION['userusername'] == $username) {
		echo '<h1>UPDATE YOUR PASSWORD</h1>';
    ?>
		<form method="post" action="<?php echo base_url();?>user/update_data">
		<div class="error-msg"><?php echo validation_errors();?></div>
		<div class="input-form">
		<label>Enter Current Password: </label>
		<input type="password" name="c_pass">
		</div>
	    <div class="input-form">
		<label>Enter New Password: </label>
		<input type="password" name="n_pass">
		</div>
		<div class="input-form">
		<label>Re-Enter New Password: </label>
		<input type="password" name="r_pass">
		</div>
		<div class="registerbtn">
		<input type="submit" value="Submit"/>
		</div>
		<?php
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

<div class="form-container">
	<?php 
		$username = $this->uri->segment(3);
		if($_SESSION['userusername'] == $username) {
		echo '<h1>UPDATE YOUR PROFILE</h1>';
    ?>
		<form method="post" action="<?php echo base_url();?>user/update_profile">
		<div class="input-form">
		<label>Enter Age: </label>
		<input type="input" name="new_age">
		</div>
	    <div class="input-form">
		<label>Enter Height: </label>
		<input type="input" name="new_height">
		</div>
		<div class="input-form">
		<label>Enter Weight: </label>
		<input type="input" name="new_weight">
		</div>
        <div class="input-form">
		<label>Enter BMI: </label>
		<input type="input" name="new_bmi">
		</div>
        <div class="input-form">
		<label>Enter Health Problem: </label>
		<input type="input" name="new_health">
		</div>
		<div class="registerbtn">
		<input type="submit" value="Submit"/>
		</div>
		<?php
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
</body>
</html>