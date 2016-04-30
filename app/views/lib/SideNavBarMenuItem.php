<?php

class SideNavBarMenuItem extends SideNavItem{
	
	private $labelType = "success", $labelValue = "", $parentMenu = "#menu", $iconType = "question-sign";
	
	public function __construct($name, $data){
		parent::__construct($name, $data);
	}

	
	public function getLabelType(){
		return $this->labelType;
	}
	
	public function getLabelValue(){
		return $this->labelValue;
	}
	
	public function getIconType(){
		return $this->iconType;
	}
	
	
	public function setLabelType($labelType){
		$this->labelType = $labelType;
	}
	
	public function setLabelValue($labelValue){
		$this->labelValue = $labelValue;
	}
	
	public function setDataParent($widget){
		$this->parentMenu = $widget->getName();	
	}
	
	public function setIconType($iconType){
		$this->iconType = $iconType;
	}
	

	
	public function setVisible(){
		?>
		
			<li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-<?php echo $this->getName()?>">
                        <i class="icon-<?php echo $this->getIconType()?>"> </i> <?php echo $this->getCaption()?>    
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; 
                       	<span class="label label-<?php echo $this->getLabelType()?>">
                       
                       		<?php echo $this->getLabelValue()?>
                       
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