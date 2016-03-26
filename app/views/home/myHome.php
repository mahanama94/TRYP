<?php 
	
	$data = json_decode($data, true);
	$user = $data["user"];
	
	if(isset($data["error"])){
		$error = $data["error"];
	}
	else{
		$error = "";
	}
?>
<H1>Welcome to my home <?php echo $user["name"]; echo " Logged in as ".$user["userName"]?></H1>
