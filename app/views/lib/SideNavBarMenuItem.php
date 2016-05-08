<?php

class SideNavBarMenuItem extends SideNavItem{
	
	private $data = array(
			"labelType" => "success",
			"labelValue" => "",
			"parentMenu" => "#menu",
			"iconType" => "question-sign"
	);
	
	public function __construct($name, $data){
		parent::__construct($name, $data);
	}


	public function setVisible(){
		?>
		
			<li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-<?php echo $this->getName()?>">
                        <i class="icon-<?php echo $this->getData("iconType");?>"> </i> <?php echo $this->getCaption()?>    
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; 
                       	<span class="label label-<?php echo $this->getData("labelType")?>">
                       
                       		<?php echo $this->getData("labelValue")?>
                       		
                       	</span>
                       &nbsp;
                    </a>
                    <ul class="collapse" id="component-nav-<?php echo $this->getName()?>">
                    
                   		<?php $this->showWidgets();?>
                    
                    </ul>
                    
        	</li>

		<?php
	}
}
?>