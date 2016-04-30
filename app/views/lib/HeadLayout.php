<?php
class HeadLayout extends ViewObject{
	
	
	public function setVisible(){?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
	    <meta charset="UTF-8" />
	    	<title><?php echo $this->getData("title")?></title>
	    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta content="" name="description" />
		<meta content="" name="author" />
	     <!--[if IE]>
	        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	        <![endif]-->
	    <!-- GLOBAL STYLES -->
	    <!-- GLOBAL STYLES -->
		    <link rel="stylesheet" href="<?php echo Assets::getPublic('/assets/plugins/bootstrap/css/bootstrap.css')?>" />
		    <link rel="stylesheet" href="<?php echo Assets::getPublic('/assets/css/main.css')?>" />
		    <link rel="stylesheet" href="<?php echo Assets::getPublic('/assets/css/theme.css')?>" />
		    <link rel="stylesheet" href="<?php echo Assets::getPublic('/assets/css/MoneAdmin.css')?>" />
		    <link rel="stylesheet" href="<?php echo Assets::getPublic('/assets/plugins/Font-Awesome/css/font-awesome.css')?>" />
	    <!--END GLOBAL STYLES -->	       
		</head>
	<?php 
		$this->showWidgets();
	}
}

?>