
<h2><?php echo $formHeading;?> : <?php echo $currentSubject["menu_name"]; ?></h2>

<form action=
	<?php if($formHeading == "Edit Subject"){
			echo "edit_subject.php?subject=".$currentSubject["id"];
		}
		else{
			echo "create_subject.php";
		}
		?>
	 method ="post">
	
	<p>Subject name :
		<input type="text" name = "menu_name" value = "<?php echo $currentSubject['menu_name']; ?>"/>
	</p>
	
	<p>Position :
		<select name ="position">
		<?php 
			$subject_count = mysqli_num_rows(getSubjects());
			if($currentSubject["position"]==""){
				$subject_count = $subject_count + 1;
			}
			for($count =1; $count <= $subject_count; $count++){
				echo "<option value\"$count\"";
				if($currentSubject["position"]== $count){
					echo " selected";
				}
				echo ">$count</option>";
			}
		?>
		</select>
	</p>
	
	<p>Visible : 
		<input type="radio" name="visible" value ="0"
			<?php if($currentSubject["visible"]== 0){
					echo "checked ";
			}
			?>
		/>No
		&nbsp;
		<input type="radio" name="visible" value ="1"
			<?php if($currentSubject["visible"]== 1){
					echo "checked ";
			}
			?>
		
		/>Yes
	</p>
	
	<input type="submit" name = "submit" value=<?php echo $formHeading?>/>
</form>

<br/>
	<a href="manage_content.php">Cancel</a>