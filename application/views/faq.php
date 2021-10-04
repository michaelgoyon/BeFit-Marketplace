<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/faq_styles.css')?>">
    <title>BeFit FAQ</title>
</head>
<div class="nav">
      <ul class="items">
      <li><a href="<?php echo base_url('user/marketplace/')?>"><img class="navlogo" src="<?php echo base_url('assets/images/befitlogo.png')?>"></a></li>
      <li class="navitems"><a href="<?php echo base_url('user/marketplace/')?>">Marketplace</a></li>
	  <li class="navitems"><a href="<?php echo base_url('user/nutrition/')?>">Nutrition</a></li>
      <li class="navitems"><a href="<?php echo base_url('user/faq/')?>">FAQ</a></li>
      <li class="navitems"><a href="<?php echo base_url('user/aboutus/')?>">About</a></li>
      <li class="navitems"><a href="<?php echo base_url('user/profile/'.$this->session->userdata('userusername'))?>">Profile</a></li>
</div>

<body>
    <div class="container-fluid">
        <div class ="accordion">
            <h2>Frequently Asked Questions</h2>
            <div class ="icon"></div>
        </div>
        <div class ="panel">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                 sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                  ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                  Duis aute irure dolor in reprehenderit in voluptate velit
                   esse cillum dolore eu fugiat nulla pariatur. Excepteur sin
                   t occaecat cupidatat non proident, sunt in culpa qui officia 
                   deserunt mollit anim id est laborum."</p>
        </div>

        <div class ="accordion">
            <h5>What does befit do?</h5>
            <div class ="icon"></div>
        </div>
        <div class ="panel">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                 sed do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                  ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                  Duis aute irure dolor in reprehenderit in voluptate velit
                   esse cillum dolore eu fugiat nulla pariatur. Excepteur sin
                   t occaecat cupidatat non proident, sunt in culpa qui officia 
                   deserunt mollit anim id est laborum."</p>
        </div>
    </div>
</body>