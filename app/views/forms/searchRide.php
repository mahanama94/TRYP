<?php include "styles.php"?>
<div id="content">
	<div class="inner">
		<div class="col-lg-12">
	   		<div class="row">
	   			 <header><h2> Search for Ride </h2></header>
	       	</div>
	       	<hr/>
	    </div>
		<div class="row">
			<div class="col-lg-12">
	
				<form class="form-horizontal" action="<?php echo Config::get('rewriteBase/public')?>/home/test2" method ="post">
	
					<div class="form-group">
						<label class="control-label col-lg-1">Start</label>
					
						<div class="col-lg-4">
							<input type="text" id="origin" name="origin" class="form-control" />
						</div>
					
						<label class="control-label col-lg-1">Destination</label>
					
						<div class="col-lg-4">
							<input type="text" id="destination" name="destination" class="form-control" />
						</div>
					</div>
					
					
					
					<div class="form-group">
                        <label class="control-label col-lg-1" >Date</label>

                        <div class="col-lg-4">
                            <div class="input-group input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy" >
                                <input class="form-control" type="text" value="12-02-2012" name="date" type="date"/>
                                <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
                            </div>
                        </div>
                    
                        <label class="control-label col-lg-1">Time</label>

                        <div class="col-lg-4">
                            <div class="input-group bootstrap-timepicker">
                                <input class="timepicker-24 form-control" type="text" name="time" type="time"/>
                                <span class="input-group-addon add-on"><i class="icon-time"></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<label for="tags" class="control-label col-lg-1">Tags</label>

                    	<div class="col-lg-9">
                        	<input name="tags" id="tags" value="foo,bar,baz" class="form-control" />
                    	</div>
					</div>
					
					
					<div class="form-group">
						<div class="form-actions no-margin-bottom" style="text-align:center;">
                    		<button class="btn btn-primary btn-lg" type ="submit" type="submit"><i class="icon-search"></i> Search</button>
                    	</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

	
<?php include "scripts.php"?>			
					
