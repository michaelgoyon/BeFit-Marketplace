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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/marketplace_styles.css')?>">
    <title>BeFit Homepage</title>
</head>

<body>
    <div class="header">
        <img class="img-fluid" width="360" src="<?php echo base_url('assets/images/marketplacebg.jpg') ?>">
        <div class="centered">
            <h1>BeFit Marketplace</h1>
        </div>
    </div>

    <?php
    foreach($details as $traineerow){
        echo "<div class='head'><h1>Recommended for You</h1></div>;";
    }
    ?>
    <div class="aboutdiv">
        <div class="sub-container">
            <?php 

            foreach($records as $row) {
                if($row->services_availability == 1) {
                    foreach($details as $traineerow){

                        if ($traineerow->Health == 'Heart Problem'){
                          if($row->services_type == 'Aerobics'){
                            echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                            echo "<div class='mem'>";
                            if ($row->services_image == !NULL){
                                echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                            }
                            else{
                                echo "<img class='img-fluid' src='".base_url()."assets/images/stockaerobics.jpeg"."'>";
                            }
                            echo "<p class='infohead'>".$row->services_title."</p>";
                            echo "<p class='infotext'>".$row->users_name."</p>";
                            echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                            echo "<div class='bookbutton'>Book Now</div>";     
                            echo "</a>";       
                            echo "</div>";
                          }
                        }
                        
        
                        else if ($traineerow->Health =='Diabetic'){
                          if($row->services_type == 'Cardio'){
                            echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                            echo "<div class='mem'>";
                            if ($row->services_image == !NULL){
                                echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                            }
                            else{
                                echo "<img class='img-fluid' src='".base_url()."assets/images/stockcardio.jpeg"."'>";
                            }
                            echo "<p class='infohead'>".$row->services_title."</p>";
                            echo "<p class='infotext'>".$row->users_name."</p>";
                            echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                            echo "<div class='bookbutton'>Book Now</div>";     
                            echo "</a>";       
                            echo "</div>";
                          }
                        }
        
                        else if ($traineerow->Health =='Asthma'){
                            if($row->services_type == 'Aerobics'){
                              echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                              echo "<div class='mem'>";
                              if ($row->services_image == !NULL){
                                echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                              }
                              else{
                                echo "<img class='img-fluid' src='".base_url()."assets/images/stockaerobics.jpg"."'>";
                              }
                              echo "<p class='infohead'>".$row->services_title."</p>";
                              echo "<p class='infotext'>".$row->users_name."</p>";
                              echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                              echo "<div class='bookbutton'>Book Now</div>";     
                              echo "</a>";       
                              echo "</div>";
                            }
                        }
                        
                        else if ($traineerow->Health =='Obesity'){
                            if(($row->services_type == 'Strength') || ($row->services_type == 'Endurance')) {
                               echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                               echo "<div class='mem'>";
                               if ($row->services_image == !NULL){
                                 echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                               }
                               else{
                                if($row->services_type == 'Strength'){
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockstrength.jpeg"."'>";
                                }
                                else if ($row->services_type == 'Endurance'){
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockendurance.jpeg"."'>";
                                }
                               }
                               echo "<p class='infohead'>".$row->services_title."</p>";
                               echo "<p class='infotext'>".$row->users_name."</p>";
                               echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                               echo "<div class='bookbutton'>Book Now</div>";     
                               echo "</a>";       
                               echo "</div>";
                            }
                        
                        }

                        else if ($traineerow->Health =='None'){
                            
                               echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                               echo "<div class='mem'>";
                               if ($row->services_image == !NULL){
                                 echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                               }
                               else{
                                if ($row->services_type == 'Aerobics'){
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockaerobics.jpg"."'>";
                                }
                                else if ($row->services_type == 'Cardio'){
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockcardio.jpeg"."'>";
                                }
                                else if ($row->services_type == 'Strength') {
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockstrength.jpeg"."'>";
                                }
                                else if ($row->services_type == 'Endurance'){
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockendurance.jpeg"."'>";
                                }
                                else{
                                    echo "<img class='img-fluid' src='".base_url()."assets/images/stockcardio.jpeg"."'>";
                                }
                               }
                               echo "<p class='infohead'>".$row->services_title."</p>";
                               echo "<p class='infotext'>".$row->users_name."</p>";
                               echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                               echo "<div class='bookbutton'>Book Now</div>";     
                               echo "</a>";       
                               echo "</div>";
                            
                        
                        }
            
        
                      /*else if ($traineerow->Health =='None'){
                          foreach($top_services as $top){
                              echo "<a href='".base_url().'user/service/'.$top->services_id."'>"; 
                              echo "<div class='mem'>";
                              echo "<img class='img-fluid' src='".base_url()."assets/images/cardio.jpg"."'>";
                              echo "<p class='infohead'>".$top->services_title."</p>";
                              echo "<p class='infotext'>".$top->users_name."</p>";
                              echo "<p class='infotext'>".$top->services_price."PHP"."</p>";
                              echo "<div class='bookbutton'>Book Now</div>";     
                              echo "</a>";       
                              echo "</div>";  
                          }
                      }*/
                    }
                }
            }
        ?>
        </div>
    </div>

    <div class="head">
        <h1>Services</h1>
    </div>
    <div class="aboutdiv">
        <div class="sub-container">
            <?php 
            foreach($records as $row) {
                if($row->services_availability == 1) {
                    echo "<div class='mem'>";
                    echo "<a href='".base_url().'user/service/'.$row->services_id."'>"; 
                    if ($row->services_image == !NULL){
                        echo "<img class='img-fluid' src='".base_url().'uploads/'.$row->services_image."'>"; 
                    }
                    else{
                        if ($row->services_type == 'Aerobics'){
                            echo "<img class='img-fluid' src='".base_url()."assets/images/stockaerobics.jpg"."'>";
                        }
                        else if ($row->services_type == 'Cardio'){
                            echo "<img class='img-fluid' src='".base_url()."assets/images/stockcardio.jpeg"."'>";
                        }
                        else if ($row->services_type == 'Strength') {
                            echo "<img class='img-fluid' src='".base_url()."assets/images/stockstrength.jpeg"."'>";
                        }
                        else if ($row->services_type == 'Endurance'){
                            echo "<img class='img-fluid' src='".base_url()."assets/images/stockendurance.jpeg"."'>";
                        }
                        else{
                            echo "<img class='img-fluid' src='".base_url()."assets/images/stockcardio.jpeg"."'>";
                        }
                        
                    }
                    echo "<p class='infohead'>".$row->services_title."</p>";
                    echo "<p class='infotext'>".$row->users_name."</p>";
                    echo "<p class='infotext'>".$row->services_price."PHP"."</p>";
                    echo "<div class='bookbutton'>Book Now</div>";     
                    echo "</a>";       
                    echo "</div>";
                }
            }
        ?>
        </div>
    </div>
</body>

</html>