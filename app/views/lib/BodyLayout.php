<?php
class  BodyLayout extends ViewObject{
	
	public function setVisible(){
	?>
		<!-- BEGIN BODY -->
		<body class="padTop53 " >

    		<!-- MAIN WRAPPER -->
    		<div id="wrap">	
    		
    		<?php 
    			$this->showWidgets();
    		?>
    		
    		</div>
    		<!-- END WRAPPER -->
    	</body>
    	<!-- END BODY -->
	<?php 	
	}
}
?>