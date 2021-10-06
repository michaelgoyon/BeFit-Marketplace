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
    <title>BeFit About Us</title>
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
<div class="aboutushead">
    <p class="centertext">ABOUT US</p>
</div>    

<div class="aboutdiv">
	  	<div class="head">
		 <h1>BeFit</h1>
		 </div>
		 <div class="sub-container">
			 <div class="mem">
				 <img class="img-fluid" width="240" src="<?php echo base_url('assets/images/bg2.jpeg')?>">
			 
				 <div class="name">Team</div>
				<div class="text">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempora facere dolores nisi facilis consequatur, odio hic minima nostrum. Perferendis eos earum praesentium, blanditiis sapiente labore aliquam ipsa architecto vitae. Minima soluta temporibus voluptates inventore commodi cumque esse suscipit optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos! </p>
				 </div>
				 </div>
			 
			 <div class="mem">
				 <img class="img-fluid" width="240" src="<?php echo base_url('assets/images/bg2.jpeg')?>">
			 
				 <div class="name">Coaches</div>
				<div class="text">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempora facere dolores nisi facilis consequatur, odio hic minima nostrum. Perferendis eos earum praesentium, blanditiis sapiente labore aliquam ipsa architecto vitae. Minima soluta temporibus voluptates inventore commodi cumque esse suscipit optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos! </p>
				 </div>
				 </div>
			 
			 <div class="mem">
				 <img class="img-fluid" width="240" src="<?php echo base_url('assets/images/bg2.jpeg')?>">
			 
				 <div class="name">Trainees</div>
				<div class="text">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, laudantium, quibusdam? Nobis, delectus, commodi, fugit amet tempora facere dolores nisi facilis consequatur, odio hic minima nostrum. Perferendis eos earum praesentium, blanditiis sapiente labore aliquam ipsa architecto vitae. Minima soluta temporibus voluptates inventore commodi cumque esse suscipit optio aliquam et, dolorem a cupiditate nihil fuga laboriosam fugiat placeat dignissimos!
					</p>
				 </div>
				 </div>
			 
			 </div>
		 </div>
</body>