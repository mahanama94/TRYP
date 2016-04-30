<?php 
	$sampleProfie = array(
		
		"basicInformation" => array(
				"name" => "Test user 1",
				"age" => 50
		),
		
		"trypRating" => array(
				"hardBraking" => 5,
				"braking" => 10
		),
		"userRating" => array(
				"reliability" => 50,
				"onTime" => 55
		)
			
	);


?>


<div id="content">
 	<div class="inner">
		<div class="row">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Driver Information
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic-information" data-toggle="tab">Basic Information</a>
                                </li>
                                <li><a href="#tryp-rating" data-toggle="tab">TRYP Rating</a>
                                </li>
                                <li><a href="#user-rating" data-toggle="tab">User Rating</a>
                                </li>
                                <li><a href="#contact" data-toggle="tab">Contact</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="basic-information">
                                    <h4>Basic Information</h4>
                                    <p>Name : <?php echo $sampleProfie["basicInformation"]["name"]?></p>
                                </div>
                                <div class="tab-pane fade" id="tryp-rating">
                                    <h4>TRYP rating</h4>
                                    <p>Hard Brakings per kilometer : <?php echo $sampleProfie["trypRating"]["hardBraking"]?></p>
                                </div>
                                <div class="tab-pane fade" id="user-rating">
                                    <h4>User Rating</h4>
                                    <p>.</p>
                                </div>
                                <div class="tab-pane fade" id="contact">
                                    <h4>Contact</h4>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
      		</div>
	</div>
</div>		