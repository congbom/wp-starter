<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
	<div class="header">
		
	</div>
	
	<div class="main">
		<?php the_content();?>
	</div>
	
	<div class="footer">
		
	</div>
	
	<?php wp_footer();?>
</body>
</html>
