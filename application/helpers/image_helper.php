<?php
function image_thumb( $image_path, $height, $width ) {
    // Get the CodeIgniter super object
    $CI =& get_instance();
    
    $imageDir = dirname( $image_path );
    
    if(!file_exists("$imageDir/thumbs") && !dir("$imageDir/thumbs")) {
    	mkdir(dirname( $image_path ) . '/thumbs/');
    }
    
    // Path to image thumbnail
    //$image_thumb = dirname( $image_path ) . '/thumbs/' . $height . '_' . $width . '.jpg';
    $hash = hash_file('md5', $image_path);
    $image_thumb = dirname( $image_path ) . '/thumbs/' . $hash . '.jpg';

    if ( !file_exists( $image_thumb ) ) {
        // LOAD LIBRARY
        $CI->load->library( 'image_lib' );

        // CONFIGURE IMAGE LIBRARY
        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_path;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = TRUE;
        $config['height']           = $height;
        $config['width']            = $width;
        $CI->image_lib->initialize( $config );
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }

    return '<img src="' . dirname( $_SERVER['SCRIPT_NAME'] ) . '/' . $image_thumb . '" />';
}