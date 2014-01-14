<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta name="author" content="Time Universal">	
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<link type="image/x-icon" rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
	<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
	
	<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
	<header>
		
	</header>
	
	<article>
		
	</article>
	
	<footer>
		
	</footer>
	
	<?php wp_footer();?>
</body>
</html>
