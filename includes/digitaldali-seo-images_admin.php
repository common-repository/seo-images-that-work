<?php

class SEO_images_admin {
	public static function init() {
        add_action('admin_menu', array(__CLASS__, 'init_menu'), 0);
    }

    public static function init_menu() {
    	add_options_page('SEO images - Настройки', 'SEO Images', 'manage_options', __FILE__, array(__CLASS__, 'view_page_settings'));
    }

    public static function view_page_settings() {
    	$update = self::page_settings_handle_post();
    	$data = array(
    		'update' => $update
    	);
    	self::view('setting', $data);
    }

    public static function page_settings_handle_post() {
    	if(
    		isset( $_POST['seo-image-type'] ) &&
    		isset( $_POST['_wpnonce'] ) &&
    		wp_verify_nonce( $_POST['_wpnonce'], 'digitaldali-update-options' )
    	) {
    		$type = intval($_POST['seo-image-type']);
    		update_option( 'digitaldali__seo_images_type', $type );
    		return true;
    	}
    	return false;
    }

    public static function view($file, $data) {
    	require DIGITALDALI_SEO_DIR . 'views' . DIRECTORY_SEPARATOR . $file . '.php';
    }
}