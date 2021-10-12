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
    <title>My Profile</title>
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
	  <ul class="items2">
	  	<li class="with-submenu">
		  	<?php
				foreach($users as $row){
			?>
		  	<img src='<?php echo base_url().'uploads/'.$row->users_avatar; ?>'>
			<?php
			}
			?>
            <ul class="submenu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo base_url();?>user/topup">Wallet</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="<?php echo base_url();?>user/logout">Log Out</a></li>
            </ul>
        </li>
	  </ul>
</div>

	  
<body>
<div class="container">
<p class="infotext">
	<?php 
		foreach($services as $row) {
			echo "<p class='infohead'>".$row->services_title."</p>";
			echo "<div class='servicediv'>";
			echo "<p class='infotext graybg'>"."DETAILS"."</p>";
			echo "<p class='infotext'>"."Price: ".$row->services_price.".00 PHP"."</p>";
			echo "<p class='infotext'>"."Coach: ".$row->users_name."</p>";
			echo "<p class='infotext'>"."Workout: ".$row->services_type."</p>";
			echo "<p class='infotext'>"."Time: ".$row->services_time."</p>";
			echo "<p class='infotext'>"."Day: ".$row->services_day."</p>";
			echo "<p class='infotext'>"."Duration: ".$row->services_duration."</p>";
		}
	?>
</p>
<form action="<?php echo base_url().'user/avail_service/'.$this->uri->segment(3); ?>">
		<div class="registerbtn">
			<input type="submit" value="BUY">
		</div>	
</form>
</div>
</body>
</html>