<?php
class Logo extends ViewObject{
	
	public function setVisible(){
		?>
		<!-- LOGO SECTION -->
		<header class="navbar-header">
		
		<a href="index.html" class="navbar-brand">
			<img src="<?php echo Assets::getPublic('/assets/img/logo.png')?>" alt="" /></a>
		</header>
		<!-- END LOGO SECTION -->
		<?php 
	}
}
?>