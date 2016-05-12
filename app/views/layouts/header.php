<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title> <?php if(isset($data["title"])){ echo $data["title"]; }else{ echo "TRYP";}?> </title>

    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/bootstrap/css/bootstrap.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/css/main.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/css/theme.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/css/MoneAdmin.css')?>" />
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/Font-Awesome/css/font-awesome.css')?>" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="<?php Assets::getPublic('/assets/css/layout2.css')?>" />
	<link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/flot/examples/examples.css')?>" />
   	<link rel="stylesheet" href="<?php Assets::getPublic('/assets/plugins/timeline/timeline.css')?>" />
    <!-- END PAGE LEVEL  STYLES -->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >