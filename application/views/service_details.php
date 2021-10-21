<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/service_details.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ratings.css')?>">
  <script defer src="https://widget-js.cometchat.io/v3/cometchatwidget.js"></script>
    <title>BeFit Homepage</title>
</head>

<body>
<div class="infodiv">
    <img class="infoimg" src="<?php echo base_url('assets/images/cardio.jpg')?>">
    <p class="infotext">
	<?php 
		foreach($services as $row) {
			echo "<p class='infohead'>".$row->services_title."</p>";
			echo "<p class='infotext'>".$row->services_description."</p>";;
			echo "<div class='servicediv'>";
			echo "<p class='infotext graybg'>"."DETAILS"."</p>";
			echo "<p class='infotext'>"."Price: ".$row->services_price." PHP"."</p>";
			echo "<p class='infotext'>"."Coach: ".$row->users_name."</p>";
			echo "<p class='infotext'>"."Workout: ".$row->services_type."</p>";
			echo "<p class='infotext'>"."Time: ".$row->services_time."</p>";
			echo "<p class='infotext'>"."Day: ".$row->services_day."</p>";
			echo "<p class='infotext'>"."Duration: ".$row->services_duration."</p>";
		}
	?>
	</p>	

	<form action="<?php echo base_url().'user/checkout/'.$this->uri->segment(3); ?>">
		<div class="registerbtn">
            
			<input type="submit" value="BUY" >
		</div>	
	</form>
    <button onclick="chatCoach()">Chat</button>
	</div><!--- closing tag for servicediv --->
</div><!--- closing tag for infodiv --->

<div class="reviewdiv">
<p class="infotext orangebg">REVIEWS</p>
<?php 
	foreach($ratings as $row) {
		echo "<div>";
		echo "<p class='infohead'>★".$row->ratings_rate." by ".$row->users_username."</p>";
		echo "<p class='infotext'>".$row->ratings_comment."</p>";
		echo "<hr>";
		echo "</div>";
	}
?>
<label><p class="infotext">WRITE A REVIEW:</p></label>
<form method="POST" action="<?php echo base_url().'user/submit_review/'.$this->uri->segment(3); ?>">
    <span class="star-cb-group">
      <input type="radio" id="rating-5" name="rating" value="5" />
      <label for="rating-5">5</label>
      <input type="radio" id="rating-4" name="rating" value="4" checked="checked" />
      <label for="rating-4">4</label>
      <input type="radio" id="rating-3" name="rating" value="3" />
      <label for="rating-3">3</label>
      <input type="radio" id="rating-2" name="rating" value="2" />
      <label for="rating-2">2</label>
      <input type="radio" id="rating-1" name="rating" value="1" />
      <label for="rating-1">1</label>
      <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" />
      <label for="rating-0">0</label>
    </span>
	<div class="input-form">
		<textarea type="text" name="review_comment" rows="3" cols="70"></textarea>
	</div>
	<div class="registerbtn">
		<input type="submit" value="Submit">
	</div>	
</form>
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

    function chatCoach() {
        CometChatWidget.openOrCloseChat(true);
        CometChatWidget.chatWithUser('<?php echo $coach[0]->users_username; ?>');
    }
</script>
			
<footer>
      <ul>
        <li><a href="<?php echo base_url('user/marketplace/')?>"><p class="infohead">Marketplace</p></a></li>
        <li><a href="">Cardio</a></li>
        <li><a href="">Yoga</a></li>
        <li><a href="">Strength</a></li>
      </ul>

      <ul>
        <li><a href="<?php echo base_url('user/nutrition/')?>"><p class="infohead">Nutrition</p></a></li>
        <li><a href="">Foods</a></li>
        <li><a href="">Macros</a></li>
        <li><a href="">Exercise</a></li>
      </ul>

      <ul>
        <li><a href="<?php echo base_url('user/faq/')?>"><p class="infohead">FAQ</p></a></li>
        <li><a href="">Services</a></li>
        <li><a href="">Payment</a></li>
        <li><a href="">Refund</a></li>
      </ul>
      <ul>
        <li><a href="<?php echo base_url('user/aboutus/')?>"><p class="infohead">About</p></a></li>
        <li><a href="">Team</a></li>
        <li><a href="">Coaches</a></li>
        <li><a href="">Trainees</a></li>
      </ul>
      
      <hr>
      <a href=""><img src="<?php echo base_url('assets/images/befitlogo.png')?>"/></a>
  </footer>

</body>
</html>

