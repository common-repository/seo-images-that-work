<?php
/**
 * @package SEO_images
 * @version 1.03
 */
/*
 * Plugin Name: SEO Images
 * Author: DigitalDali
 * Text Domain: digitaldali-seo-images
 * Version: 1.0
 * License: GPLv2 or later
 */

/*  Copyright 2017  DigitalDali  (email: info@digitaldali.pro)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('DIGITALDALI_SEO_DIR', plugin_dir_path(__FILE__));

register_activation_hook( __FILE__, array( 'SEO_images_core', 'activation' ) );
register_deactivation_hook( __FILE__, array( 'SEO_images_core', 'deactivation' ) );

require_once( DIGITALDALI_SEO_DIR . 'includes' . DIRECTORY_SEPARATOR .'digitaldali-seo-images_core.php' );

if( is_admin() ) {
	require_once( DIGITALDALI_SEO_DIR . 'includes' . DIRECTORY_SEPARATOR . 'digitaldali-seo-images_admin.php' );
	add_action( 'init', array( 'SEO_images_admin', 'init' ) );
} else {
	add_action( 'init', array( 'SEO_images_core', 'init' ) );
}