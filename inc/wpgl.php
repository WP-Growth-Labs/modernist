<?php

/**
 * Helper function to convert hex colors to RGB
 *
 */
 function hex_to_rgb($hex_color) {
    if ( $hex_color[0] == '#' ) {
            $hex_color = substr( $hex_color, 1 );
    }
    if ( strlen( $hex_color ) == 6 ) {
            list( $r, $g, $b ) = array( $hex_color[0] . $hex_color[1], $hex_color[2] . $hex_color[3], $hex_color[4] . $hex_color[5] );
    } elseif ( strlen( $hex_color ) == 3 ) {
            list( $r, $g, $b ) = array( $hex_color[0] . $hex_color[0], $hex_color[1] . $hex_color[1], $hex_color[2] . $hex_color[2] );
    } else {
            return false;
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );

    return $r . ', ' . $g . ', ' . $b;
 }

 function hexToHsl($hex) {
    $hex = str_replace('#', '', $hex);
    if( strlen( $hex ) < 6 ) {
        $hex = array($hex[0].$hex[0], $hex[1].$hex[1], $hex[2].$hex[2]);
    } else {
        $hex = array($hex[0].$hex[1], $hex[2].$hex[3], $hex[4].$hex[5]);
    }
    $rgb = array_map(function($part) {
        return hexdec($part) / 255;
    }, $hex);

    $max = max($rgb);
    $min = min($rgb);

    $l = ($max + $min) / 2;

    if ($max == $min) {
        $h = $s = 0;
    } else {
        $diff = $max - $min;
        $s = $l > 0.5 ? $diff / (2 - $max - $min) : $diff / ($max + $min);

        switch($max) {
            case $rgb[0]:
                $h = ($rgb[1] - $rgb[2]) / $diff + ($rgb[1] < $rgb[2] ? 6 : 0);
                break;
            case $rgb[1]:
                $h = ($rgb[2] - $rgb[0]) / $diff + 2;
                break;
            case $rgb[2]:
                $h = ($rgb[0] - $rgb[1]) / $diff + 4;
                break;
        }

        $h /= 6;
    }

    return array( 'h' => $h, 's' => $s, 'l' => $l);
}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
function color_luminance( $hexcolor, $percent ) {
    
    if ( strlen( $hexcolor ) < 6 ) {
    $hexcolor = $hexcolor[0] . $hexcolor[0] . $hexcolor[1] . $hexcolor[1] . $hexcolor[2] . $hexcolor[2];
  }
  $hexcolor = array_map('hexdec', str_split( str_pad( str_replace('#', '', $hexcolor), 6, '0' ), 2 ) );

  foreach ($hexcolor as $i => $color) {
    $from = $percent < 0 ? 0 : $color;
    $to = $percent < 0 ? $color : 255;
    $pvalue = ceil( ($to - $from) * $percent );
    $hexcolor[$i] = str_pad( dechex($color + $pvalue), 2, '0', STR_PAD_LEFT);
  }

  return '#' . implode($hexcolor);
}

 /**
 * Helper function to return the library quicker
 *
 */
 function wpgl_library($folder) {
    return get_template_directory_uri() . '/library/' . $folder;
 }

/**
 * Helper function to display the CTA button
 *
 */
 function wpgl_render_cta( $acf_field ) {

    echo '<a class="button';
    if( $acf_field['mod_call_to_action']['cta_button_style'] != 'default' )
        echo ' ' . $acf_field['mod_call_to_action']['cta_button_style'];
    echo '" ';
    if( $acf_field['mod_call_to_action']['cta_button_link']['target'] === '_blank' )
        echo 'target="_blank" ';
    echo 'href="' . $acf_field['mod_call_to_action']['cta_button_link']['url'] . '">';
    echo $acf_field['mod_call_to_action']['cta_button_text'];
    echo ' ';
    echo $acf_field['mod_call_to_action']['cta_button_icon'];
    echo '</a>';
}

/**
 * Helper function to display SVGs inline
 *
 */
function wpgl_render_inline_svg( $svgPath = '', $classes = '' ) {

    $svg = file_get_contents( $svgPath );
    //$svg = str_replace("{{class-name}}", $array[$index], $svg);

    return $svg;

}

/**
 * Add User Role, plus Custom classes to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function wpgl_user_active_body_class( $classes ) {

    global $post;
    global $current_user;

    // Addd User Class (Designed for WooCommerce)
        $user_roles = $current_user->roles;
        $user_role = array_shift($user_roles);

        if  ( !is_user_logged_in() )  {

            $classes[] = 'role-customer';

        } elseif ( $user_role === 'customer' ) {

            $classes[] = 'role-customer';

        } else {

            $classes[] = 'role-' . $user_role;
            
        }

    // Add Unique Page Class (Post Type + Slug)

        $post_type = get_post_type();
        $post_slug = basename( get_permalink() );

        $classes[] = $post_type . '_' . $post_slug;

    // Add Custom Classes if defined 

        if( !empty( get_field( 'custom_body_class' ) ) )
            $classes[] = get_field( 'custom_body_class' );

    return $classes;
}
add_filter( 'body_class', 'wpgl_user_active_body_class' );

/**
 * Recursively searches content for h1 blocks.
 *
 * @link https://www.billerickson.net/building-a-header-block-in-wordpress/
 *
 * @param array $blocks
 * @return bool
 */
function be_has_h1_block( $blocks = array() ) {
    
    foreach ( $blocks as $block ) {

        if( ! isset( $block['blockName'] ) )
            continue;

        // Custom header block
        if( 'acf/page_title' === $block['blockName'] ) {
            return false;

        // Heading block
        } elseif( 'core/heading' === $block['blockName'] && isset( $block['attrs']['level'] ) && 1 === $block['attrs']['level'] ) {
            return false;

        // Scan inner blocks for headings
        } elseif( isset( $block['innerBlocks'] ) && !empty( $block['innerBlocks'] ) ) {
            $inner_h1 = be_has_h1_block( $block['innerBlocks'] );
            if( $inner_h1 )
                return false;
        }
    }

    return false;
}

/**
 * Dynamically select icon in ACF
 * @link https://www.billerickson.net/dynamic-dropdown-fields-in-acf/
 * @author Bill Erickson
 *
 * @param array $field, the field settings array 
 * @return array $field
 */
function be_acf_dynamic_icons( $field ) {

    $categories = get_categories();

    $field['choices'] = [ 0 => '(None)' ];
    foreach( $categories as $category ) {
        $field['choices'][ $category->term_id ] = $category->name;
    }

    return $field;
}
add_filter( 'acf/load_field/name=dynamic_categories', 'be_acf_dynamic_icons' );

function ms_output_color_scheme( $post = null ) {

    if( !isset( $post ) ) :
        
        $dark = '#333';
        $light = '#f2f2f2';
        $text = '#fff';

    elseif( !empty( get_field( 'post_color_scheme' ) ) ) :

        $dark = get_field( 'post_color_scheme' );
        $light = color_luminance( $dark, 0.75 );

        $lightness = hexToHsl( $dark );
        ( $lightness['l'] > 0.4 ) ? $text = '#000' : $text = '#fff';

    else :

        $dark = get_field( 'author_dark_color', 'user_' . $post->post_author );
        $light = get_field( 'author_light_color', 'user_' . $post->post_author );

        $lightness = hexToHsl( $dark );
        ( $lightness['l'] > 0.4 ) ? $text = '#000' : $text = '#fff';

    endif;

    ?>
    
    <style>

        .entry-content {
            --scheme-light-color: <?php echo $light; ?>;
            --scheme-dark-color: <?php echo $dark; ?>;
            --scheme-text-color: <?php echo $text; ?>;
        }

    </style>

    <?php

}

add_filter( 'gform_submit_button', 'dw_add_span_tags', 10, 2 );
function dw_add_span_tags ( $button, $form ) {

    return $button .= '<span class="button-helper" aria-hidden="true"></span>';

}

function wpgl_nav_classes( $classes, $item ) {
    if( ( !is_post_type_archive( 'post' ) && !is_singular( 'post' ) )
        && $item->title == 'Blog' ){
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
    }
    if( is_singular( 'future' ) && $item->title == 'Futures' ) {
        $classes[] = ' current_page_parent';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'wpgl_nav_classes', 10, 2 );

function wpgl_acf_image( $field, $size = 'full' ) {

    if( empty( $field ) )
        return 'Error';

    if( is_array( $field ) ) {

        $image_id = $field['id'];

    } else {

        $image_id = $field;
    }

    $url = wp_get_attachment_image_src( $field, $size );

    if( file_exists( str_replace( '.jpg', '.webp', $url[0] ) ) ) {
        $src = str_replace( '.jpg', '.webp', $url[0] );
    } else {
        $src = $url[0];
    }

    return $src;

}