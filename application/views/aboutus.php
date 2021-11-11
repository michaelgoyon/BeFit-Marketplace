<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/aboutus_styles.css')?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit About Us</title>
</head>

<body>
<div class="header">
    <img src="<?php echo base_url('assets/images/aboutusbg.jpg') ?>">
    <div class="centered">
      <h1>About Us</h1>
    </div>
  </div>

<div class="aboutdiv">
	  	<div class="head">
		 <h1>Who We Are</h1>
		 </div>
		 <div class="sub-container">
			 <div class="mem">
				 <img class="img-fluid" width="360" src="<?php echo base_url('assets/images/team.jpg')?>">
			 
				 <div class="name">Team</div>
				<div class="text">
					<p>The team behind BeFit is commited to develop a platform where fitness coaches / trainers can market and sell the services they offer whether it be virtual exercise sessions, personalized fitness coaching, and more. It also provides users with varying workout options for beginners to athletes. This includes live and on-demand classes in yoga, Zumba, HIIT, strength training, cardio, and other disciplines.</p>

				 </div>
				 </div>
			 
			 <div class="mem">
				 <img class="img-fluid" width="360" src="<?php echo base_url('assets/images/trainer.png')?>">
			 
				 <div class="name">Coaches</div>
				<div class="text">
					<p>Coaches who are registered on the application can create and add their services that will be displayed on the marketplace. Coaches can view trainees who has applied to their service and has an option to accept or decline their application based on the capacity they can handle. Once the payment has been settled, coaches can now start their service to their trainees for how long the indicated service duration is. Coaches can cashout their currency to the admins upon request. </p>
				 </div>
				 </div>
			 
			 <div class="mem">
				 <img class="img-fluid" width="360" src="<?php echo base_url('assets/images/trainee.jpg')?>">
			 
				 <div class="name">Trainees</div>
				<div class="text">
					<p>Users who registered as trainees will be asked for their health information in order to help set up their profile. These information will be important on what services will be recommended to them, as well as give their future coaches a better idea on what their health is. They can apply for services they are interested in, BeFit will also recommended services based on their profile.
					</p>
				 </div>
				 </div>
			 
			 </div>
		 </div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        CometChatWidget.init({
            "appID": "192441c86ab4e6a7",
            "appRegion": "us",
            "authKey": "bd9d02296028b3c8ce6791864495cdee3f43007a"
        }).then(response => {
            console.log("Initialization completed successfully");
            CometChatWidget.login({
                "uid": "<?php echo $this->session->userdata('userusername'); ?>"
            }).then(response => {
                CometChatWidget.launch({
                    "widgetID": "8116fe55-3361-44c1-bb27-c0e5e54d7954",
                    "docked": "true",
					"alignment": "right", //left or right
                    "roundedCorners": "true",
                    "height": "600px",
                    "width": "800px",
                    "defaultID": '<?php echo $this->session->userdata('userusername'); ?>', //default UID (user) or GUID (group) to show,
                    "defaultType": 'user' //user or group
                });
            }, error => {
                console.log("User login failed with error:", error);
                //Check the reason for error and take appropriate action.
            });
        }, error => {
            console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        });
    });
</script>
</body>
</html>