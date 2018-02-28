<?php
/*
Plugin Name: SlideShowConci
Plugin URI: http://chernianu.com
Description: Test Task - Plugin For Conci
Author: Anton Chernianu <anton@chernianu.com>
Author URI: http://chernianu.com
Version: 1.0
*/ 

function conci_install() {
	
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";

	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) {
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
				`id_conci` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(40) NOT NULL,
				`text` text NOT NULL,
				`image` text NOT NULL,
				PRIMARY KEY(`id_conci`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$wpdb->query($sql);
	}

}

function conci_uninstall() {
	global $wpdb;
	$table_name = $wpdb->prefix . "conci";

	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
	
}

register_activation_hook(__FILE__, 'conci_install');
register_deactivation_hook(__FILE__, 'conci_uninstall');
