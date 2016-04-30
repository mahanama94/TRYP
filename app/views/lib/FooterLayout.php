<?php
class FooterLayout extends ViewObject{
	
	
	public function setVisible(){
		?>
		<!-- FOOTER -->
		<div id="footer">
			<p>&copy;  TRYP UOM &nbsp;2016 &nbsp;</p>
		</div>
		<!--END FOOTER -->
		
		
		<!-- GLOBAL SCRIPTS -->
			<script src="<?php echo Assets::getPublic('/assets/plugins/jquery-2.0.3.min.js')?>"></script>
			<script src="<?php echo Assets::getPublic('/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
			<script src="<?php echo Assets::getPublic('/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
		<!-- END GLOBAL SCRIPTS -->
		<?php
	}
}
?>