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
<div class ="ptext">
    FAQs
</div>
    <!---<section>
        <h2>FAQ</h2>
        <div class="faqjs">
            <div class="question">
                <h3>What is FAQS?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="answer">
                <p>
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.  
                </p>    
            </div>
        </div>
    </section>--->

    <div class="faqdiv">
        <button class="accordion">How do I avail a service?<i class="arrow down"></i></p></button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <button class="accordion">What payment methods do you accept?<i class="arrow down"></i></button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <button class="accordion">Im new to exercise, what should I do?<i class="arrow down"></i></button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <button class="accordion">Is the service refundable?<i class="arrow down"></i></button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <button class="accordion">When do I start?<i class="arrow down"></i></button>
        <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                 ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                 velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
  
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/app.js"></script>
</body>
</html>
  