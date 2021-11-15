<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/view_profile_styles.css')?>">
	<script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | My Profile</title>
</head>

	  
<body>
<div class="container">
	<div class="body-container">
		<div class="dtls-container">
			<?php
				foreach($coachdata as $row){
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
    </div>
<div>
				<div class="info-row">
					<h1 id="header">SERVICES / SCHEDULE</h1>
				</div>
				<table>
					<thead>
						<tr>
							<th>Name of Workout</th>
							<th>Day</th>
							<th>Time</th>
							<th>Session</th>
							<th>Duration</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($coachservices as $row) {
								echo "<tr>";
						?>
						<?php 
								echo "<td><a href='".base_url().'user/service/'.$row->services_id."'>".$row->services_title."</a></td>";
								echo "<td>".$row->services_day."</td>";
								echo "<td>".$row->services_time."</td>";
								echo "<td>".$row->services_session."</td>";
								echo "<td>".$row->services_duration." sessions</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
	</div>
</body>

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

    function chatCoach() {
        CometChatWidget.openOrCloseChat(true);
        CometChatWidget.chatWithUser('<?php echo $coach[0]->users_username; ?>');
    }
</script>
</body>
</html>