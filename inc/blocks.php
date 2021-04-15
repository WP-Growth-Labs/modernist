<?php

function my_mario_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'modernist-blocks',
                'title' => __( 'Modernist Studio', 'modernist-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'my_mario_block_category', 10, 2);

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register the section heading block.
        acf_register_block_type(array(
            'name'              => 'ethos',
            'title'             => __('Ethos'),
            'description'       => __('The block to display each Ethos.'),
            'render_template'   => 'template-parts/blocks/block-ethos.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'location',
            'keywords'          => array( 'ethos' ),
            'post_types' => array('page'),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'page_title',
            'title'             => __('Page Title'),
            'description'       => __('The block to display page titles.'),
            'render_template'   => 'template-parts/blocks/block-page-title.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'schedule',
            'keywords'          => array( 'title', 'section' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => true,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'fancy_separator',
            'title'             => __('Fancy Separator'),
            'description'       => __('A block to display an overlapping seperator section.'),
            'render_template'   => 'template-parts/blocks/block-separator.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'spacer', 'section' ),
            'enqueue_script' => get_template_directory_uri() . '/library/js/fancy-separator.js',
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                'jsx'               => true,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'giant_text_block',
            'title'             => __('Giant Text Block'),
            'description'       => __('A block to the giant text used across the site.'),
            'render_template'   => 'template-parts/blocks/block-giant-text.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'text', 'section' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'image_row',
            'title'             => __('Image Row'),
            'description'       => __('A block to display a row of client logos'),
            'render_template'   => 'template-parts/blocks/block-image-row.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'image', 'section' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

         acf_register_block_type(array(
            'name'              => 'call_to_action',
            'title'             => __('Call To Action'),
            'description'       => __('A block to display a call to action.'),
            'render_template'   => 'template-parts/blocks/block-call-to-action.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'call to action', 'section', 'cta' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

         acf_register_block_type(array(
            'name'              => 'services',
            'title'             => __('Service Links'),
            'description'       => __('A block to display a call to action.'),
            'render_template'   => 'template-parts/blocks/block-services.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'services', 'section' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

         acf_register_block_type(array(
            'name'              => 'squares',
            'title'             => __('Square Boxes'),
            'description'       => __('A block to side-by-side square boxes.'),
            'render_template'   => 'template-parts/blocks/block-square-columns.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'blocks', 'section', 'square' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

         acf_register_block_type(array(
            'name'              => 'ms_tabs',
            'title'             => __('MS Tabs'),
            'description'       => __('A block to tabbed content areas'),
            'render_template'   => 'template-parts/blocks/block-tabs.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'blocks', 'section', 'tabs' ),
            'enqueue_script' => get_template_directory_uri() . '/library/js/ms-tabs.js',
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

         acf_register_block_type(array(
            'name'              => 'ms_related_posts',
            'title'             => __('MS Related Posts'),
            'description'       => __('A block to show related posts'),
            'render_template'   => 'template-parts/blocks/block-related.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'posts', 'section', 'related' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

          acf_register_block_type(array(
            'name'              => 'ms_futures',
            'title'             => __('MS Futures'),
            'description'       => __('A block to show the Futures Archive'),
            'render_template'   => 'template-parts/blocks/block-futures.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'futures', 'section', 'related' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_slider',
            'title'             => __('MS Slider'),
            'description'       => __('A block to display a slider'),
            'render_template'   => 'template-parts/blocks/block-slider.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'blocks', 'section', 'tabs' ),
            'enqueue_assets'    => function() {
                wp_enqueue_script( 'wpgl-slick', get_template_directory_uri() . '/library/js/slick.min.js', array(), null, true );
            },
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_hotspot',
            'title'             => __('MS Image Hotspot'),
            'description'       => __('A block to display an image with hotspots on it.'),
            'render_template'   => 'template-parts/blocks/block-image-hotspot.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'blocks', 'section', 'tabs' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_author',
            'title'             => __('MS Guest Author'),
            'description'       => __('A block to display a guest author block.'),
            'render_template'   => 'template-parts/blocks/block-guest-author.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'blocks', 'section', 'author' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_lottie',
            'title'             => __('MS Lottie'),
            'description'       => __('A block to display Lottie animations.'),
            'render_template'   => 'template-parts/blocks/block-lottie.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'lottie', 'animation', 'section' ),
            'enqueue_assets'    => function() {
                wp_enqueue_script( 'wpgl-lottie', get_template_directory_uri() . '/library/js/lottie.min.js', array(), null, true );
                wp_enqueue_script( 'wpgl-lottie-player', get_template_directory_uri() . '/library/js/lottie-player.js', array(), null, true );
            },
            'supports' => array( 
                'anchor'            => true,
                'align'             => true,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_infographic',
            'title'             => __('MS Infographic'),
            'description'       => __('A block to display the infographic on the "Show" page.'),
            'render_template'   => 'template-parts/blocks/block-infographic.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'lottie', 'infographic', 'section' ),
            'enqueue_assets'    => function() {
                wp_enqueue_script( 'wpgl-lottie', get_template_directory_uri() . '/library/js/lottie.min.js', array(), null, true );
                wp_enqueue_script( 'wpgl-lottie-player', get_template_directory_uri() . '/library/js/lottie-player.js', array(), null, true );
                wp_enqueue_script( 'wpgl-slick', get_template_directory_uri() . '/library/js/slick.min.js', array(), null, true );
            },
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));

        acf_register_block_type(array(
            'name'              => 'ms_subscribe',
            'title'             => __('MS Subscribe'),
            'description'       => __('A block to display the mailchimp subscribe form.'),
            'render_template'   => 'template-parts/blocks/block-subscribe.php',
            'category'          => 'modernist-blocks',
            'mode'              => 'auto',
            'icon'              => 'editor-insertmore',
            'keywords'          => array( 'call to action', 'subscribe', 'cta' ),
            'supports' => array( 
                'anchor'            => true,
                'align'             => false,
                ),
        ));
    }
}