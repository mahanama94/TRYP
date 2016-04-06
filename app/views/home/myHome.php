<?php
	$userData = json_decode($data, true);
	echo var_dump($userData);
?>
<H1>Welcome to my home <?php echo $userData["name"]; echo " Logged in as ".$userData["userName"]?></H1>
