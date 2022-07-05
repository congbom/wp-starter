<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <?php if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<a class="text-white text-decoration-none" title="Home" href="'. esc_url( home_url( '/' ) ) .'">'. get_bloginfo( 'name' ) .'</a>';
                } ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleContent" aria-controls="navbarToggleContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggleContent">
                <?php wp_nav_menu( array(
                    'menu_class'        => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'container'         => false,
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                ); ?>
                <form class="d-flex" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>