<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/marketplace_styles.css')?>">
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
<div class ="ptext">
    Marketplace
</div>
    <div class="containbox">
	<?php 
		foreach($records as $row) {
            echo "<div class='box'>";
            echo "<img class='boximg' src='".base_url()."assets/images/cardio.jpg"."'>";
			echo "<p class='infohead'>".$row->services_title."</p>";
            echo "<p>".$row->users_name."</p>";
            echo "<p>".$row->services_price."</p>";
            echo "<div class='bookbutton'><a href='".base_url().'user/service/'.$row->services_id."'>Book Now</a></div>";            
            echo "</div>";
		}
	?>
    </div>
</body>
</html>