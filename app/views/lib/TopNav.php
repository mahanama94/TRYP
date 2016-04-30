<?php
class TopNav extends ViewObject{
	
	
	public function setVisible(){
	?>
		<!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                
                <?php 
    				$this->showWidgets();
    			?>
    		
    		</nav>

        </div>
        <!-- END HEADER SECTION -->
	
	<?php 
	}
}
?>