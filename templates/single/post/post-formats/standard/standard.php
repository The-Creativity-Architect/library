<?php 
/**************************************/
## Standard blog layout
/**************************************/

?>

<div class="standard-container">
	<?php 
		
		if(have_posts()):
			while(have_posts()): the_post();
				
				get_template_part('inc/theme/layouts/standard/content'); 
				
			endwhile;
			
		else:
			get_template_part('inc/theme/views/content-none'); 
		endif; 
		
	?>
</div>