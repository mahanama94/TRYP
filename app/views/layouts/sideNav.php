<?php 
	$testData = array(
			//details of trip 1
			array(
					"start" =>array(
								"latitude"=> 7.2906,
								"longitude" => 80.6337,
						),
					"end" =>array(
								"latitude"=> 7.1204,
								"longitude" => 80.3213,
						),
					"tripNumber"=>1250,
					"status"=>"sent",
					"userName" => "User 1"
			),
			//details of trip 2
			array(
					"start" =>array(
								"latitude"=>6.7881,
								"longitude" => 79.8913,
						),
					"end" =>array(
								"latitude"=>6.9271,
								"longitude" =>79.8612,
						),
					"tripNumber"=>1251,
					"userName" => "User 2"
						
			),
			//details of trip 3
			array(
					"start" =>array(
								"latitude"=> 6.0535,
								"longitude" => 80.2210,
						),
					"end" =>array(
								"latitude"=> "",
								"longitude" => "",
						),
					"tripNumber"=>1252,
					"userName" => "User 3"
			
			)
	);

?>

	<!-- REMOVVE THE TEST JAVASCRIPT CODE ADD THE FILE -->
	<script type="text/javascript">
			function cancelRequest(number ){
					alert("Cancel Request : "+number);
				}

			function sendRequest(number ){
				alert("Send Request : "+number);
			}
        </script>

<div id="left">
			
			<!-- Profile picture  -->
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo Assets::getPublic('/assets/img/user.gif')?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Joe Romlin</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

			<!-- / Profile picture -->

			<!-- Nav bar menu -->				
            <ul id="menu" class="collapse">

				<!-- Menu item  -->
				 
				<?php foreach($testData as $tripData => $property){?>
	                <li class="panel">
                    	<a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav-<?php echo $property['tripNumber'];?>">
	                        <i class="icon-user"> </i> <?php echo $property["userName"];?>
	                        <span class="pull-right">
                         	<i class="icon-angle-left"></i>
	                        </span>
	                    </a>
	                    
	                    <ul class="collapse" id="component-nav-<?php echo $property['tripNumber'];?>">
                       			
                       		
                       			
                       		<?php 
                       			if (isset($property["status"])){
                       		?>
                       			
	                       		<li class=""><a href="#" onclick="cancelRequest(<?php echo $property['tripNumber']?>)"><i class="icon-remove"></i> Cancel request</a></li>
                       		<?php 
                       		
                       			}else{
                       		?>
	                       	
	                       		<li class=""><a href="#" onclick="sendRequest(<?php echo $property['tripNumber']?>)"><i class="icon-ok"></i> Send request </a></li>
	                       	
	                       	<?php 
                       			}
	                       	?>
	                       	
	                    </ul>
	                </li>
                <?php }?>
                <!-- /Menu item  -->
                
            </ul>
            
            <!-- /Nav bar menu -->
        </div>
        
        