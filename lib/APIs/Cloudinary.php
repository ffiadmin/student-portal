<?php
/**
 * Cloudinary API class
 *
 * This class is designed to interact with the Cloudinary
 * content delivery service. Some of this classes abilities
 * include:
 *  - Obtain the name of the Cloudinary cloud name from the 
 *    API table in the database.
 *  - Generate the URL to an image on Cloudinary.
 *
 * @author    Oliver Spryn
 * @copyright Copyright (c) 2013 and Onwards, ForwardFour Innovations
 * @license   MIT
 * @namespace FFI\SP
 * @package   lib.APIs
 * @since     1.0
*/

namespace FFI\SP;

require_once(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . "/wp-blog-header.php");

class Cloudinary {
/**
 * Hold the Cloudinary API cloud name.
 *
 * @access private
 * @static
 * @type   bool|string
*/

	private static $cloudName = false;
	
/**
 * Fetch the Cloudinary API cloud name.
 * 
 * @access private
 * @return void
 * @static
 * @since  3.0
*/

	private static function getCloudName() {
		global $wpdb;
		
		if (!self::$cloudName) {
			$APIs = $wpdb->get_results("SELECT `CloudinaryCloudName` FROM `ffi_sp_apis`");
			self::$cloudName = $APIs[0]->CloudinaryCloudName;
		}
	}
	
/**
 * Generate the URL to a person's profile image.
 * 
 * @access public
 * @param  string   $imageKey The key of the image to fetch from Cloudinary
 * @return string             The URL of the image with the supplied key
 * @static
 * @since  3.0
*/

	public static function profile($imageKey) {
		self::getCloudName();

		return "//cloudinary-a.akamaihd.net/" . self::$cloudName . "/image/upload/e_saturation:-70,h_220,w_175/" . $imageKey;
	}
	
/**
 * Generate the URL to the splash screen's background image.
 * 
 * @access public
 * @param  string   $imageKey The key of the image to fetch from Cloudinary
 * @return string             The URL of the image with the supplied key
 * @static
 * @since  3.0
*/

	public static function background($imageKey) {
		self::getCloudName();

		return "//cloudinary-a.akamaihd.net/" . self::$cloudName . "/image/upload/h_500,w_2000/" . $imageKey;
	}
	
/**
 * Generate the URL to the splash screen's jewel icon.
 * 
 * @access public
 * @param  string   $imageKey The key of the image to fetch from Cloudinary
 * @return string             The URL of the image with the supplied key
 * @static
 * @since  3.0
*/

	public static function icon($imageKey) {
		self::getCloudName();

		return "//cloudinary-a.akamaihd.net/" . self::$cloudName . "/image/upload/w_48/" . $imageKey;
	}
}
?>