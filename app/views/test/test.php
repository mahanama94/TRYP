<?php 
	$view = new Controller();
	$view->view("/lib/HeadLayout");
	$view->view("/lib/BodyLayout");
	$view->view("/lib/HeadLayout");
	$view->view("/lib/FooterLayout");
	$view->view("/lib/TopNav");
	$view->view("/lib/Logo");
	$view->view("/lib/NavBarRightContainer");
	$view->view("/lib/DropDown");
	$view->view("/lib/DropDownMessages");
	$view->view("/lib/DropDownTask");
	$view->view("/lib/DropDownAlert");
	$view->view("/lib/DropDownLogin");
	$view->view("/lib/SideNav");
	$view->view("/lib/SideNavItem");
	$view->view("/lib/MediaWell");
	$view->view("/lib/SideNavBarMenu");
	$view->view("/lib/SideNavBarMenuItem");
	$view->view("/lib/SideNavBarSubMenuItem");
	$view->view("/lib/PageContainer");
	
	
	$data = array("title"=>"TestTitle");
	//Main layouts
	$layout = new HeadLayout("Heading",$data);
	$body = new BodyLayout("Body", $data);
	$footer = new FooterLayout("Footer", $data);
	
	//navigation
	$topNav = new TopNav("TopNavigation", $data);
	
	//Nav bar content
	$logo = new Logo("logo", $data);
	
	//Navbar right container
	$navBarRightContainer = new NavBarRightContainer("rightNavBar", $data);
	
	//dropdown messages
	$dropDownMessages = new DropDownMessages("messages", $data);
	$dropDownTask = new DropDownTask("task", $data);
	$dropDownAlert = new DropDownAlert("alert", $data);
	$dropDownLogin = new DropDownLogin("login", $data);	

	
	//add items to nav bar right container
	$navBarRightContainer->addWidget($dropDownMessages);
	$navBarRightContainer->addWidget($dropDownTask);
	$navBarRightContainer->addWidget($dropDownAlert);
	$navBarRightContainer->addWidget($dropDownLogin);
	
	
	//add items to nav bar
	$topNav->addWidget($logo);
	$topNav->addWidget($navBarRightContainer);
	
	//Side nav bar
	$sideNavBar = new SideNav("SideNav", $data);
	$mediaWell = new MediaWell("mediaWell", $data);
	$navBarMenu = new SideNavBarMenu("navBarMenu", $data);
	$navBarMenuItem1 = new SideNavBarMenuItem("menuItem", $data);
	$navBarMenuItem1->setCaption("Test Menu");
	$subMenuItem = new SideNavBarSubMenuItem("subMenu1", $data);
	
	$navBarMenuItem1->addWidget($subMenuItem);
	$navBarMenuItem1->setDataParent($navBarMenu);
	
	$navBarMenu->addWidget($navBarMenuItem1);
	
	$sideNavBar->addWidget($mediaWell);
	$sideNavBar->addWidget($navBarMenu);
	
	$blankPage = new PageContainer("blankPage", $data);
	
	// add items to layout
	$layout->addWidget($body);
	$body->addWidget($topNav);
	$body->addWidget($sideNavBar);
	$body->addWidget($blankPage);
	$body->addWidget($footer);
	$layout->setVisible();
?>