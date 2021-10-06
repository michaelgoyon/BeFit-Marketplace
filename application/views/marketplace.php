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
<div class ="marketplacehead">
    <p class="ptext">Marketplace</p>
</div>


<div class="head"><h1>Services</h1></div>
		 
			
<div class="aboutdiv">
	<div class="sub-container">
        <?php 
            foreach($records as $row) {
                echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                echo "<div class='mem'>";
                echo "<img class='img-fluid' src='".base_url()."assets/images/cardio.jpg"."'>";
                echo "<p class='infohead'>".$row->services_title."</p>";
                echo "<p class='infotext'>".$row->users_name."</p>";
                echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                echo "<div class='bookbutton'>Book Now</div>";     
                echo "</a>";       
                echo "</div>";
            }
        ?>
    </div>
</div>
			
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