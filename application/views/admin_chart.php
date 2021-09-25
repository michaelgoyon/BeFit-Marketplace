<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_dashboard_styles.css')?>">
    <title>Admin Dashboard</title>
</head>
<body>
    <div>
        <canvas id="myChart"></canvas>
        <?php print_r($ratings); ?>
    </div>

    <script>
    // === include 'setup' then 'config' above ===
    <?php
        $php_array = array();
        foreach($ratings as $rating){
            array_push($php_array, $rating->services_id);
        }
        $js_array = json_encode($php_array);
        echo "const labels = ". $js_array . ";";
    ?>
        const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            <?php
                $php_array = array();
                foreach($ratings as $rating){
                    array_push($php_array, $rating->ratings_rate);
                }
                $js_array = json_encode($php_array);
                echo "data: ". $js_array . ",";
            ?>
        }]
        };
        const config = {
        type: 'bar',
        data: data,
        options: {}
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>