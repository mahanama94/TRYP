<div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo Config::get('/rewriteBase/public').'/user/index'?>" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" />
                        
                    </a>
                </header>
                <!-- END LOGO SECTION -->
                
                <ul class="nav navbar-top-links navbar-right">

                    <!--ADMIN SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo Config::get('/rewriteBase/public').'/user/profile'?>"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="<?php echo Config::get('/rewriteBase/public').'/user/settings'?>"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo Config::get('/rewriteBase/public').'/user/logout'?>"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END SETTINGS -->
                </ul>

            </nav>

        </div>