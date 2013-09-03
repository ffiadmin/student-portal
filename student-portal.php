<?php
/*
Plugin Name: Student Portal
Plugin URI: https://github.com/ffiadmin/student-portal
Description: This is a plugin for the Grove City College Student Government Association's home page. It is designed to quickly and succinctly describe the mission of SGA, provide details about its members, and serve as a quick reference for the campus's online needs.
Version: 1.0
Author: Oliver Spryn
Author URI: http://forwardfour.com/
License: MIT
*/

	namespace FFI\SP;
	
//Create plugin-specific global definitions
	define("FFI\SP\CDN", false);
	define("FFI\SP\FAKE_ADDR", get_site_url() . "/");
	define("FFI\BE\HOME_PAGE", true);
	define("FFI\SP\PATH", plugin_dir_path(__FILE__));
	define("FFI\SP\REAL_ADDR", get_site_url() . "/wp-content/plugins/student-portal/");
	define("FFI\SP\RESOURCE_PATH", (CDN ? "//ffistatic.appspot.com/sga" : site_url()) . "/wp-content/plugins/student-portal/");
	define("FFI\SP\URL_ACTIVATE", "");
	
	define("FFI\SP\ENABLED", true);
	define("FFI\SP\NAME", "Student Portal");
	
//Instantiate the Interception_Manager
	require_once(PATH . "lib/Interception_Manager.php");
	$intercept = new Interception_Manager();
	$intercept->go();
?>
