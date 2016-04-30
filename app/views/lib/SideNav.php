<?php
class SideNav extends ViewObject{
	
	public function setVisible(){
		?>
			
		<div id="left">
		
			<?php $this->showWidgets();?>	
			
		</div>
		<?php 
	}
}
?>