<?php
/*
Plugin Name: Conci Slideshow
Plugin URI: http://chernianu.com
Description: Test Task - Plugin For Conci
Author: Anton Chernianu <anton@chernianu.com>
Author URI: http://chernianu.com
Version: 1.0
*/ 

function register_admin_script() {
	wp_enqueue_script( 'wp_img_upload', plugin_dir_url( __FILE__ ) . '/assets/js/conci-admin.js', array('jquery', 'media-upload'), '0.0.2', true );
}
add_action( 'admin_enqueue_scripts', 'register_admin_script' );


function conci_install() {
	
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";

	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) {
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
				`id_conci` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(40) NOT NULL,
				`text` text NOT NULL,
				-- `image` text NOT NULL,
				PRIMARY KEY(`id_conci`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$wpdb->query($sql);
	}

	// app_option('conci_on_page', 5);

}

function conci_uninstall() {
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";

	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
	
	// delete_option('conci_on_page');
}
register_activation_hook(__FILE__, 'conci_install');
register_deactivation_hook(__FILE__, 'conci_uninstall');
// register_uninstall_hook(__FILE__, 'conci_uninstall');

function create_menu(){
	add_menu_page('Conci Slideshow', 'Conci Slideshow', 8, 'conci_slideshow_page', 'conci_editor');
	// add_submenu_page('conci_slideshow_page','Создать Conci Slideshow', 'Создать', 8, 'conci_slideshow_page2', 'conci_editor');
}

add_action('admin_menu', 'create_menu');

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
 
function conci_short() {
	ob_start();
	echo 'hello friend';
	return ob_get_clean();
}

add_shortcode('conci-slideshow', 'conci_short');


