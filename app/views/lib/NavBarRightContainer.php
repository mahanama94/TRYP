<?php
class NavBarRightContainer extends ViewObject{
	
	
	public function setVisible(){
		?>
		
		<ul class="nav navbar-top-links navbar-right">
			
			<?php 
				$this->showWidgets();
			?>
			
		</ul>
		
	<?php
	
	}
}
?>