
<form action = "<?php echo Config::get("rewriteBase/public").'/home/signup';?>" method = "post">	
	<p>
		Index Number : 	<input type="text" name = "userName" >
		<br>
		Password : 		<input type="password" name = "password" >
	</p>
	<input type="submit" name = "submit" value= "Submit"/>
</form>