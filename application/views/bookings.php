<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bookings_styles.css')?>">
    <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit | My Bookings</title>
</head>
<body>
    <div class="container">
    <div class="market-header">
		<h1 id="header">BOOKINGS</h1>
    </div>
    <div class="sub-container">
        <div class="solo">
            <h2>Single Sessions</h2>
            <div class="table-container">
            <table>
					<thead>
						<tr>
							<th>Type of Workout</th>
							<th>Coach</th>
							<th>Day</th>
							<th>Time</th>
							<th>Type of Session</th>
                            <th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<?php 
								
						?>
						<?php 
                            echo "<tr>";
							echo "<td>Cardio</td>";
							echo "<td>Patrick Uy</td>";
							echo "<td>Monday</td>";
							echo "<td>10:00 AM - 11:00 AM</td>";
                            echo "<td>Solo</td>";
							echo "<td>Unperformed</td>";
							echo "</tr>";
						?>
					</tbody>
				</table>
            </div>
        </div>
        <div class="group">
            <h2>Multi Sessions</h2>
            <div class="table-container">
            <table>
					<thead>
						<tr>
							<th>Type of Workout</th>
							<th>Coach</th>
							<th>Day</th>
							<th>Time</th>
							<th>Type of Session</th>
                            <th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<?php 
								
						?>
						<?php 
                            echo "<tr>";
							echo "<td>Cardio</td>";
							echo "<td>Patrick Uy</td>";
							echo "<td>Monday</td>";
							echo "<td>11:00 AM - 12:00 PM</td>";
                            echo "<td>Grouped</td>";
							echo "<td>3 sessions left</td>";
							echo "</tr>";
						?>
					</tbody>
				</table>
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