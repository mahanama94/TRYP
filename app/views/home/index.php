<!DOCTYPE html>
<body>
	<p>
	
	<?php echo var_dump($data)?>
	Wecome <?php echo $data["userData"]["Name"]?></p>
	
	<a href="<?php echo Config::get("rewriteBase/public")."/web/viewTrips"?>">View my trips </a>
</body>


</html>