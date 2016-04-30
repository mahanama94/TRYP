<?php
class PageContainer extends ViewObject{
	
	
	
	public function setVisible(){
		?>
		
		<!-- PAGE CONTENT -->
		<div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2><?php echo $this->getCaption();?></h2>



                    </div>
                </div>

                <hr />

				<?php $this->showWidgets();?>


            </div>




        </div>
       <!--END PAGE CONTENT -->
		
		<?php 
	}
}
?>