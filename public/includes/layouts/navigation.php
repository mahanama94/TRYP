<?php 
	
	/*
	 * use returned data
	 * loop for eac subjec in the resulting mysql query
	 */
	
	$subject_set = getSubjects();					
	while($subject= mysqli_fetch_assoc($subject_set)){
?>
<!-- SUBJECTS PANE -->
<ul class="subjects">
<!-- Diaplay menu name and the subject ID  -->
	<li <?php 
			if($currentSubject && $subject["id"]== $currentSubject["id"]){
				echo "class = \"selected\"";
				}
			else{
				echo "";
			}
		?>
	>
		<a href ="manage_content.php?subject=<?php echo urlencode($subject['id'])?>">
			<?php echo $subject["menu_name"];?>
		</a>
	
		<!-- PAGES PANE -->
		<ul class="pages">
	
			<?php 
			/**
			 * fetch page details from database for each page in the subject given
			 * use returned data and display the available pages
			 */
			$page_set = getPages($subject["id"]);
			while($page= mysqli_fetch_assoc($page_set)){
			?>
			
			<!--  Display the menu name of the page  -->
			<li<?php if($currentPage && ($currentPage["id"]== $page["id"])){
					echo " class = \"selected\"";
				}
				else{
					echo "";
				}
			?>
			>
				<a href ="manage_content.php?page=<?php echo urlencode($page['id'])?>">
					<?php echo $page["page_name"];?>
				</a>
			</li>
			<?php }?>
		</ul>
</li> 
</ul>

<!--  ADD NEW SUBJECT PANE -->
<?php }?>
<ul class ="Subjects">
	<li>
		<a href="new_subject.php">+ Add Subject </a>
	</li>
</ul>

