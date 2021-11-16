<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/register_page.css') ?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
	<title>BeFit</title>
</head>

<body>
	<div class="overlay">
		<div class="popup">
			<div class="contentHead">
				<h1>Data Privacy Policy</h1>
			</div>
			<div class="contentBox">
				<div class="content">
					<div class="contentParagraph">
						<h2>BeFit Marketplace Data Privacy Policy</h2>
						<p>Effective Date: November 10, 2021</p>
						<br>
						<p>This policy explains what information we collect when you use BeFit's
							sites, services, mobile applications, products, and content ("Services). It also
							has information about how we store, use, transfer, and delete that
							information. Our aim is not just to comply with privacy law. It's to earn your
							trust.</p>
						<br>
						<h2>Information We Collect & How We Use It</h2>
						<p>BeFit doesn't make money from ads. So we don't collect data in order to
							advertise to you. The tracking we do at BeFit is to make our product work
							as well as possible.
						</p>
						<p>In order to give you the best possible experience using BeFit, we collect
							information from your interactions with our network. Some of this
							information, you actively tell us (such as your email address, which we use to
							track your account or communicate with you). </p>
						<p>Other information, we collect based on actions you take while using BeFit Marketplace, such as what pages you access
							and your interactions with our product features (like highlights, follows, and
							applause). </p>
						<p>This information includes records of those interactions, your
							Internet Protocol address, information about your device (such as device or
							browser type), and referral information.</p>
						<br>
						<h2>We use this information to:</h2>
						<ul>
							<li>provide, test, improve, promote and personalize BeFit Marketplace App</li>
							<li>fight spam and other forms of abuse</li>
							<li>generate aggregate, non-identifying information about how people use</li>
						</ul>
						<br>
						<div class="popupBtn">
							<p>Click <b>Accept</b> if you wish to continue.</p>
							<button class="acceptBtn"><b>Accept</b></button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<div class="header">
			<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/befitlogowhite1.png') ?>"></a>
		</div>
		<div>
			<div class="form-container">
				<h1>Create your new Account</h1>
				<div class="error-msg">
					<?php
					if (validation_errors()) {
					?>
						<div>
							<?php echo validation_errors(); ?>
						</div>
					<?php
					}

					if ($this->session->flashdata('message')) {
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
										const ROLE = '<?php echo $this->session->flashdata('account'); ?>';
										CometChatWidget.createOrUpdateUser({
											uid: UID,
											name: USERNAME,
											role: ROLE
										});
									});
								});
							</script>
						</div>
					<?php
						unset($_SESSION['message']);
						unset($_SESSION['account']);
					}
					?>
				</div>
				<form method="POST" action="<?php echo base_url() . 'user/register_data'; ?>" enctype="multipart/form-data">
					<div class="wrapper">
						<input type="radio" name="account" id="trainee" value="Trainee" onclick="traineereg()" checked>
						<label for="trainee" class="option trainee">
							<div class="dot"></div>
							<span>Trainee</span>
						</label>
						<input type="radio" name="account" id="coach" value="Coach" onclick="coachreg()">
						<label for="coach" class="option coach">
							<div class="dot"></div>
							<span>Coach</span>
						</label>
					</div>
					<div>
						<div class="label">
							<label for="fname">First Name</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="fname" name="fname" value="<?php echo set_value('fname'); ?>">
					</div>
					<div>
						<div class="label">
							<label for="fname">Last Name</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="lname" name="lname" value="<?php echo set_value('lname'); ?>">
					</div>
					<div>
						<div class="label">
							<label for="fname">Username</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>">
					</div>
					<div>
						<div class="label">
							<label for="fname">Birthdate</label>
							<p class="required">Required</p>
						</div>
						<input type="date" id="birthdate" name="birthdate" value="<?php echo set_value('birthdate'); ?>" required>
					</div>
					<div>
						<div class="label">
							<label for="fname">Email</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>">
					</div>
					<div>
						<div class="label">
							<label for="fname">Password</label>
							<p class="required">Required</p>
						</div>
						<input type="password" id="password" name="password">
					</div>
					<div>
						<label for="password_confirm">Confirm Password</label><br>
						<input type="password" id="password_confirm" name="password_confirm">
					</div>
					<div id="heightdiv">
						<div class="label">
							<label for="fname">Height</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="height" name="Height" placeholder="Height in cm">
					</div>
					<div id="weightdiv">
						<div class="label">
							<label for="fname">Weight</label>
							<p class="required">Required</p>
						</div>
						<input type="text" id="weight" name="Weight" placeholder="Weight in kg">
					</div>
					<div id="bmidiv">
						<label for="bmi">BMI</label><br>
						<input type="text" id="bmi" name="BMI" readonly>
					</div>
					<button type="button" id="computediv" onclick="compute_bmi()">Compute</button>
					<div id="healthdiv" class="input-form">
						<label for="health">Health Condition</label>
						<select class="select" name="Health">
							<option value="" disabled selected>Select Health Condition</option>
							<option value="None">None</option>
							<option value="Heart Problem">Heart Problem</option>
							<option value="Asthma">Asthma</option>
							<option value="Diabetic">Diabetic</option>
							<option value="Diabetic">Obesity</option>
						</select>
					</div>
					<div id="div1" class="hide">
						<label for="requirement">
							<h1>Valid ID</h1>
						</label><br>
						<input type="file" name="req" id="req">
					</div>
					<div>
						<label for="image">
							<h1>User Avatar</h1>
						</label><br>
						<input type="file" name="image" id="image" required>
					</div>
					<div class="registerbtn">
						<input type="submit" value="Register">
					</div>
					<div class="sign-in">
						<p>Already have an account? </p><a href="<?php echo base_url() . 'user/login' ?>">Sign In</a>
					</div>
					<br><br><br>
				</form>
			</div>
		</div>
	</div>
	<script>
		const overlay = document.querySelector('.overlay')
		const popup = document.querySelector('.popup');
		const close = document.querySelector('.popupBtn');

		window.onload = function() {
			setTimeout(function() {
				popup.style.display = "block";
			}, 2000)
			setTimeout(function() {
				overlay.style.display = "block";
			}, 2000)
		}

		close.addEventListener('click', () => {
			popup.style.display = "none";
			overlay.style.display = "none";
		})

		function traineereg() {
			document.getElementById('div1').style.display = 'none';
			document.getElementById('heightdiv').style.display = 'block';
			document.getElementById('weightdiv').style.display = 'block';
			document.getElementById('bmidiv').style.display = 'block';
			document.getElementById('computediv').style.display = 'block';
			document.getElementById('healthdiv').style.display = 'block';
		}

		function coachreg() {
			document.getElementById('div1').style.display = 'block';
			document.getElementById('heightdiv').style.display = 'none';
			document.getElementById('weightdiv').style.display = 'none';
			document.getElementById('bmidiv').style.display = 'none';
			document.getElementById('computediv').style.display = 'none';
			document.getElementById('healthdiv').style.display = 'none';
		}

		function compute_bmi() {
			var h = parseInt(document.getElementById("height").value);
			var w = parseInt(document.getElementById("weight").value);
			var bmiresult = (w / ((h / 100) * (h / 100)));
			bmiresult = parseFloat(bmiresult).toFixed(2);
			document.getElementById("bmi").value = bmiresult;
		}
	</script>
</body>

</html>