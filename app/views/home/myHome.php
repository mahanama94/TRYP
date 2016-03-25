<?php 

	$user = json_decode($data[0], true)["user"];
		
?>
<H1>Welcome to my home <?php echo $user["name"]; echo " Logged in as ".$user["userName"]?></H1>
