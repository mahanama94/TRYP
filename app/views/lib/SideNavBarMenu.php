<?php
class SideNavBarMenu extends SideNavItem{
	
	
	public function setVisible(){
		?>
		
		<ul id="menu" class="collapse">
		
			<?php $this->showWidgets();?>
			
		</ul>
		
		<?php 
	}
}?>