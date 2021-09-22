<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/register_page.css')?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit</title>
</head>
<body>
<div class ="container">
	<div class ="header">
		<a href="<?php echo base_url()?>"><img src="<?php echo base_url('assets/images/befitlogowhite1.png')?>"></a>
	</div>
	<div>
		<div class="form-container">
		<h1>Create your new Account</h1>
		<div class="error-msg">	
			<?php
		    	if(validation_errors()) {
		    		?>
		    		<div>
		    			<?php echo validation_errors(); ?>
		    		</div>
		    		<?php
		    	}
 
				if($this->session->flashdata('message')) {
					?>
					<div>
						<?php echo $this->session->flashdata('message'); ?>
						<script>
							window.addEventListener('DOMContentLoaded', (event) => {
							CometChatWidget.init({
								appID: '192441c86ab4e6a7',
								appRegion: 'us',
								authKey: 'bd9d02296028b3c8ce6791864495cdee3f43007a',
							}).then((response) => {
								const UID = '<?php echo $this->session->flashdata('username'); ?>';
								const USERNAME = '<?php echo $this->session->flashdata('name'); ?>';
								CometChatWidget.createOrUpdateUser({
									uid: UID,
									name: USERNAME,
								});
							});
						});
						</script>
					</div>
					<?php
					unset($_SESSION['message']);
				}
		    ?>
		</div>
			<form method="POST" action="<?php echo base_url().'user/register_data'; ?>" enctype="multipart/form-data">
                <div class="wrapper">
				<input type="radio" name="account" id="trainee" value="Trainee" checked>
					<label for="trainee" class="option trainee">
						<div class="dot"></div>
						<span>Trainee</span>
					</label>
				<input type="radio" name="account" id="coach" value="Coach">
					<label for="coach" class="option coach">
						<div class="dot"></div>
						<span>Coach</span>
					</label>
				</div>
                <div>
					<label for="fname">First Name</label><br>
					<input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>">
				</div>
                <div>
					<label for="lname">Last Name</label><br>
					<input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>">
				</div>
                <div>
					<label for="username">Username</label><br>
					<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
				</div>
                <div>
					<label for="birthdate">Birthdate</label><br>
					<input type="text" id="birthdate" name="birthdate" value="<?php echo set_value('birthdate'); ?>">
				</div>
				<div>
					<label for="email">Email</label><br>
					<input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>">
				</div>
				<div>
					<label for="password">Password</label><br>
					<input type="password" id="password" name="password">
				</div>
				<div>
					<label for="password_confirm">Confirm Password</label><br>
					<input type="password" id="password_confirm" name="password_confirm">
				</div>
                <div>
                    <label for="image"><h1>User Avatar</h1></label><br>
					<input type="file" name="image" id="image" required>
				</div>
				<div class="registerbtn">
					<input type="submit" value="Register">
				</div>
				<br><br><br>
			</form>
		</div>
	</div>
</div>
</body>
</html>