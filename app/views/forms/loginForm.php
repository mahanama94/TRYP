<!DOCTYPE html>

<head>	
	<script type="text/javascript" >
	function test(){
		var userName = document.forms["loginForm"]["userName"].value;
		var password = document.forms["loginForm"]["password"].value;

		if(userName == ""){
			alert("user name cannot be empty")
			return ;
		}
		if(password == ""){
			alert("password cannot be empty");
		}
	}
	</script>
</head>

<form name = "loginForm" action"<?php echo Config::get('/rewriteBase/public')?>" method="post">	
	<p>
		Index Number : 	<input type="text" name = "userName" >
		<?php echo Session::flash("userNameError");?>
		<br>
		Password : 		<input type="password" name = "password" >
		<?php echo Session::flash("passwordError");?>
	</p>
	<input type="submit"  onclick="test()" name = "submit" value="submit"/>
</form>

<p>Suggestions: <span id="txtHint"></span></p>
</html>