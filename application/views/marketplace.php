<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/index_styles.css')?>">
    <title>BeFit Homepage</title>
</head>
<body>
	<?php 
		foreach($records as $row) {
			echo "<p><a href='".base_url().'user/service/'.$row->services_id."'>".$row->services_title."</a></p>";
		}
	?>
</body>
</html>