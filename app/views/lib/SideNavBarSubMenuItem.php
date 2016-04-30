<?php
class SideNavBarSubMenuItem extends SideNavBarMenuItem{
	
	
	public function setVisible(){
		?>
		
						<li class=""><a href="button.html"><i class="icon-<?php echo $this->getIconType()?>"></i><?php echo $this->getCaption()?> </a></li>
		
		<?php 
	}
	
}?>