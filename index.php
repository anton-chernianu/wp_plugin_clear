<?php
/*
Plugin Name: Conci Slideshow
Plugin URI: http://chernianu.com
Description: Test Task - Plugin For Conci
Author: Anton Chernianu <anton@chernianu.com>
Author URI: http://chernianu.com
Version: 1.0
*/ 

// Register Admin Scripts
function register_admin_script() {
	wp_enqueue_script( 'conci_img_upload', plugin_dir_url( __FILE__ ) . '/assets/js/conci-admin.js', array('jquery', 'media-upload'), '0.0.2', true );
	wp_enqueue_style('conci_admin_css', plugin_dir_url( __FILE__ ) . '/assets/css/conci-admin.css');
}
add_action( 'admin_enqueue_scripts', 'register_admin_script' );

// Register Front Scripts
function conci_front_script(){
	wp_enqueue_script( 'tiny_slide', plugin_dir_url( __FILE__ ) . '/assets/js/tiny-slider.js');
	wp_register_style( 'tiny_slide_css',plugin_dir_url( __FILE__ ) . '/assets/css/tiny-slider.css');
	wp_enqueue_style( 'tiny_slide_css' );
}
add_action( 'wp_enqueue_scripts', 'conci_front_script' );

// Activation Plugin
function conci_install() {
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";
	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) {
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
				`id_conci` int(11) NOT NULL AUTO_INCREMENT,
				`img` varchar(250) NOT NULL,
				`text` text NOT NULL,
				PRIMARY KEY(`id_conci`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$wpdb->query($sql);
	}
}

// Deactivation Plugin
function conci_uninstall() {
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
}

// Plugins Hooks
register_activation_hook(__FILE__, 'conci_install');
register_deactivation_hook(__FILE__, 'conci_uninstall');
// register_uninstall_hook(__FILE__, 'conci_uninstall');

// Create Menu Item
function create_menu(){
	add_menu_page('Conci Slideshow', 'Conci Slideshow', 8, 'conci_slideshow_page', 'conci_editor');
	// add_submenu_page('conci_slideshow_page','Создать Conci Slideshow', 'Создать', 8, 'conci_slideshow_page2', 'conci_editor');
}
add_action('admin_menu', 'create_menu');

// Main Navigation
function conci_editor() {
	wp_enqueue_media();
	switch ($_GET['c']) {
		case 'add':
			$action = 'add';
			break;
		case 'edit':
			$action = 'edit';
			break;
		default:
			$action = 'all';
			break;
	}
	include_once("includes/$action.php");
}

// ShortCode Setting
function conci_short() {
	ob_start();
	include_once('includes/shortcode.php');
	return ob_get_clean();
}
add_shortcode('conci-slideshow', 'conci_short');