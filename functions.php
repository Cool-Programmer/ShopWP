<?php 
require_once 'wp-bootstrap-navwalker.php';

function wpshop_theme_support()
{
	// Menus
	register_nav_menus([
		'primary' => 'Primary'
	]);

	// Logo
	add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'wpshop_theme_support');

// Add a class to menu's li tg
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
             $classes[] = 'nav-item';

     return $classes;
}

// Add a class to menu's anchor tag
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

function init_widgets($id)
{
	register_sidebar([
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="panel panel-default">',
		'after_widget' => '</div>',
		'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
		'after_title' => '</h3></div><div class="panel-body">'
	]);

	register_sidebar([
		'name' => 'Showcase',
		'id' => 'showcase',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	]);
}

add_action('widgets_init', 'init_widgets');

// Register custom & modified widgets
function custom_register_widgets()
{
	register_widget('WP_Widget_Categories_Custom');
}

// Add list-group-item to li in category widget
function add_new_class_li_cats($list)
{
	$list = str_replace('cat-item', 'cat-item list-group-item', $list);
	return $list;
}

add_filter('wp_list_categories', 'add_new_class_li_cats');

// Set the excerpt
function set_excerpt_length()
{
	return 10;
}

add_filter('excerpt_length', 'set_excerpt_length');