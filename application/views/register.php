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
						<p>1. DEFINITIONS

							Undefined terms in this Privacy Policy have the same definition as in our Terms of Service (“Terms”).

							2. PERSONAL INFORMATION WE COLLECT

							2.1 Information needed to use the Airbnb Platform.

							We collect personal information about you when you use the Airbnb Platform. Without it, we may not be able to provide you with all services requested. This information includes:

							Contact Information, Account, Profile Information. Such as your first name, last name, phone number, postal address, email address, date of birth, and profile photo, some of which will depend on the features you use.
							Identity Verification and Payment Information. Such as images of your government issued ID (as permitted by applicable laws), your ID number or other verification information, bank account or payment account information.
							2.2 Information you choose to give us.

							You can choose to provide us with additional personal information. This information may include:

							Additional Profile Information. Such as gender, preferred language(s), city, and personal description. Some of this information as indicated in your account settings is part of your public profile page and will be publicly visible.
							Address Book Contact Information. Address book contacts you import or enter manually.
							Other Information. Such as when you fill in a form, add information to your account, respond to surveys, post to community forums, participate in promotions, communicate with our customer care team and other Members, or share your experience with us. This may include health information if you choose to share it with us.
							2.3 Information Automatically Collected by Using the Airbnb Platform and our Payment Services.

							When you use the Airbnb Platform and Payment Services, we automatically collect personal information. This information may include:

							Geo-location Information. Such as precise or approximate location determined from your IP address or mobile device’s GPS depending on your device settings. We may also collect this information when you’re not using the app if you enable this through your settings or device permissions.
							Usage Information. Such as the pages or content you view, searches for Listings, bookings you have made, and other actions on the Airbnb Platform.
							Log Data and Device Information. Such as details about how you’ve used the Airbnb Platform (including if you clicked on links to third party applications), IP address, access dates and times, hardware and software information, device information, device event information, unique identifiers, crash data, cookie data, and the pages you’ve viewed or engaged with before or after using the Airbnb Platform. We may collect this information even if you haven’t created an Airbnb account or logged in.
							Cookies and Similar Technologies as described in our Cookie Policy.
							Payment Transaction Information. Such as payment instrument used, date and time, payment amount, payment instrument expiration date and billing postcode, PayPal email address, IBAN information, your address and other related transaction details.
							2.4 Personal Information We Collect from Third Parties.

							We collect personal information from other sources, such as:.

							Third-Party Services. If you link, connect, or login to the Airbnb Platform with a third party service (e.g. Google, Facebook, WeChat), you direct the service to send us information such as your registration, friends list, and profile information as controlled by that service or as authorized by you via your privacy settings at that service.
							Background Information. For Members in the United States, to the extent permitted by applicable laws, we may obtain reports from public records of criminal convictions or sex offender registrations. For Members outside of the United States, to the extent permitted by applicable laws and with your consent where required, we may obtain the local version of police, background or registered sex offender checks. We may use your information, including your full name and date of birth, to obtain such reports.
							Enterprise Product Invitations and Account Management. Organizations that use our Enterprise products may submit personal information to facilitate account management and invitations to use enterprise products.
							Referrals and co-travelers. If you are invited to the Airbnb Platform such as a co-traveler on a trip, the person who invited you can submit personal information about you such as your email address or other contact information.
							Other Sources. To the extent permitted by applicable law, we may receive additional information about you, such as references, demographic data or information to help detect fraud and safety issues from third party service providers and/or partners, and combine it with information we have about you. For example, we may receive background check results or fraud warnings from identity verification service providers for use in our fraud prevention and risk assessment efforts. We may receive information about you and your activities on and off the Airbnb Platform, or about your experiences and interactions from our partners. We may receive health information, including but not limited to health information related to contagious diseases.</p>

						<p>Click Accept if you wish to continue.</p>
						<div class="popupBtn">
							<button class="acceptBtn">Accept</button>
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
						<input type="date" id="birthdate" name="birthdate" value="<?php echo set_value('birthdate'); ?>" required>
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
					<div id="heightdiv">
						<label for="height">Height</label><br>
						<input type="text" id="height" name="Height" placeholder="Height in cm">
					</div>
					<div id="weightdiv">
						<label for="weight">Weight</label><br>
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
		const overlay = document.querySelector ('.overlay')
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