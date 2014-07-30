<?php //theme support
add_theme_support( 'automatic-feed-links','title','editor','thumbnail','custom-fields' );
//image tumbnail
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'post-item', 210);
add_image_size( 'post-single', 550);
//menus
// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
register_nav_menus( array(
	'main_menu' => ' Main Menu' ,
	'footer_menu' => ' Footer Menu'
) );

?>