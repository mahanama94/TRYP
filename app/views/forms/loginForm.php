

<?php //echo var_dump($_SESSION);?>
<form action = "<?php echo Config::get("rewriteBase/public").'/api/getRides';?>" method = "post">	
	<p>
		Index Number : 	<input type="text" name = "userName" >
		<?php echo Session::flash("userNameError");?>
		<br>
		Password : 		<input type="password" name = "password" >
		<?php echo Session::flash("passwordError");?>
	</p>
	<input type="submit" name = "submit" value= "Submit"/>
</form>
