<!DOCTYPE html>

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>TRYP | Login Page</title>
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/css/login.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/magic/magic.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('assets/plugins/validationengine/css/validationEngine.jquery.css')?>" />
     <!-- END PAGE LEVEL STYLES -->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo Config::get('/rewriteBase/public').'/user/login'?>" class="form-signin" method ="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                <input type="text" name ="userName" placeholder="Username" class="form-control" />
                <input type="password" name ="password" placeholder="Password" class="form-control" />
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form id="block-validate" action="<?php echo Config::get('/rewriteBase/public').'/user/login'?>" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input name="name" 			type="text" 	placeholder="Name" 			class="form-control" />
                <input name ="userName" 	type="text" 	placeholder="Username" 		class="form-control" />
                <input name="email" 		type="email" 	placeholder="Your E-mail"	class="form-control" 	id="email"/>
                <input name="password" 		type="password" placeholder="password" 		class="form-control" 	id="password"/>
                <input name="confirmPassword" type="password" placeholder="Re type password" class="form-control" id="confirm_password" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      	<script src="<?php Assets::getPublic('/assets/plugins/jquery-2.0.3.min.js')?>"></script>
		<script src="<?php Assets::getPublic('/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?php Assets::getPublic('/assets/js/login.js')?>"></script>
		
		<!-- CHECK AND USE SOME VALIDATION FROM SCRIPTS -->
		<script src="<?php Assets::getPublic('assets/plugins/validationengine/js/jquery.validationEngine.js')?>"></script>
	    <script src="<?php Assets::getPublic('assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js')?>"></script>
	    <script src="<?php Assets::getPublic('assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js')?>"></script>
	    <script src="<?php Assets::getPublic('assets/js/validationInit.js')?>"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
