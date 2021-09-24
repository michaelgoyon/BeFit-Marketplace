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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ratings.css')?>">
    <title>BeFit Homepage</title>
</head>
<body>
	<?php 
		foreach($services as $row) {
			echo "<p>".$row->services_title."</p>";
			echo "<p>".$row->services_price."</p>";
			echo "<p>".$row->services_description."</p>";
			echo "<p>".$row->services_type."</p>";
			echo "<p>".$row->services_time."</p>";
			echo "<p>".$row->services_day."</p>";
			echo "<p>".$row->services_duration."</p>";
		}
	?>

<form action="<?php echo base_url().'user/avail_service/'.$this->uri->segment(3); ?>">
	<input type="submit" value="Buy">
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

</body>
</html>