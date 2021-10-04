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
    <title>BeFit Homepage</title>
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
</div>
<body>
<div class="infodiv" id="weightloss">
    <img class="infoimg" src="<?php echo base_url('assets/images/cardio.jpg')?>">
    <p class="infotext">
	<?php 
		foreach($services as $row) {
			echo "<p class='infohead'>".$row->services_title."</p>";
			echo "<p class='infotext'>"."Price: ".$row->services_price." PHP"."</p>";
			echo "<p class='infotext'>"."Coach: ".$row->users_name."</p>";
			echo "<p class='infotext'>"."Description: ".$row->services_description."</p>";
			echo "<p class='infotext'>"."Workout: ".$row->services_type."</p>";
			echo "<p class='infotext'>"."Time: ".$row->services_time."</p>";
			echo "<p class='infotext'>"."Day: ".$row->services_day."</p>";
			echo "<p class='infotext'>"."Duration: ".$row->services_duration."</p>";
		}
	?>
	</p>	

<form action="<?php echo base_url().'user/avail_service/'.$this->uri->segment(3); ?>">
	<div class="registerbtn">
		<input type="submit" value="Buy">
	</div>	
</form>

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
		<label>Comment: </label>
		<input type="text" name="review_comment">
	</div>
	<div class="registerbtn">
		<input type="submit" value="Submit">
	</div>	
</form>

<?php 
	foreach($ratings as $row) {
		echo "<div>";
		echo "<p>★".$row->ratings_rate." by ".$row->users_username."</p>";
		echo "<p>".$row->ratings_comment."</p>";
		echo "</div>";
	}
?>
</div>



</body>
</html>

