<?php

class SEO_images_core {

    private static $type = 1;

    public static function init() {
        self::validType( get_option( 'digitaldali__seo_images_type' ) );

        add_action( 'template_redirect', array( __CLASS__, 'buffer_go' ), 0 );
        add_action( 'shutdown', array( __CLASS__, 'buffer_stop' ), 1000 );
    }

    public static function seo_images($content) {
        wp_reset_postdata();        

        preg_match_all('/<img ([^>]*)>/', $content, $images);
        foreach($images[1] as $index => $value) {
            $new_img = $imgTitle = $imgSrc = null;
            if(preg_match('/(src|data-src)="([^"]+)"/', $value, $imgSrc)) {
                $imgSrc = $imgSrc[2];
                preg_match('/([^\/]+)\.(jpg|png|svg|gif)$/', $imgSrc, $imgTitle);
                $image_title = $imgTitle[1];
            }
            if(!preg_match('/alt=/', $value)) {
                $new_img = str_replace('<img', '<img alt="' . self::getAltImage($image_title) . '"', $images[0][$index]);
            }
            if(preg_match('/alt=""/', $value)) {
                $new_img = str_replace('alt=""', 'alt="'. self::getAltImage($image_title) . '"', $images[0][$index]);
            }
            if($new_img) {
                $content = str_replace($images[0][$index], $new_img, $content);
            }
        }
        return $content;
    }

    public static function validType($type) {
        if( $type > 0 && $type < 4 ) {
            self::$type = $type;
        }
    }

    public static function getAltImage($image_title) {
        global $post;
        $seo_images_data = array(
            'title' => $post->post_title,
            'url' => get_option('home'),
            'image_title' => $image_title
        );

        switch ( self::$type ) {
            case 1:
                return $seo_images_data['title'] . ' - image '. $seo_images_data['image_title'] .' on ' . $seo_images_data['url'];
            case 2:
                return 'Image on ' . $seo_images_data['url'];
            case 3:
                return 'Image ' . $seo_images_data['image_title'];
        }
    }

    public static function buffer_go() {
        ob_start(__CLASS__.'::seo_images');
    }

    public static function buffer_stop(){
        ob_end_flush();
    }

    public static function activation() {
        add_option('digitaldali__seo_images_type', 1);
    }

    public static function deactivation() {
        delete_option('digitaldali__seo_images_type');
    }
}