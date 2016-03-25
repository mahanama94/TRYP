<?php echo message();?>
<?php if($currentSubject){	?>
		<h2>Manage Subject</h2>
		Subject Name : <?php echo $currentSubject["menu_name"]; ?>
		
		<br>
		<a href= "edit_subject.php?subject=<?php echo $currentSubject["id"]?>">Edit Subject</a>		
		
		<?php } else if($currentPage){ ?>
		<h2>Manage Page</h2>
		Page Name :<?php echo $currentPage["page_name"]; ?>
		
		<?php } 
			else{
				echo "Enter Subject or Page";
			}
?>