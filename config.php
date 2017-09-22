<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Listen on event set up theme.
        'onSetTheme' => function($theme)
        {

        },

        // Listen on event set up layout.
        'onSetLayout' => function($theme)
        {

        },

        // Listen on event before render theme.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            //$theme->asset()->usePath()->add('name', 'test.js');
        },

        // Listen on event before render layout.
        'beforeRenderLayout' => function($theme)
        {

        },

        // Listen on event before render theme and layout
        'beforeRenderThemeWithLayout' => function($theme)
        {

        }

    ),
    'num_display' => array(
        'home_product'      => 8,
        'main_product'      => 20,
        'related_product'   => 4,
        'latest_product'    => 4,
        'bestseller'        => 4,
        'featured'          => 4,
        'blog'              => 5,
        'testimonial'       => 5,
        'image_product'     => 'large',
        'image_slide'       => 1200,
        'image_mainbanner'  => 750,
        'image_sidebanner'  => 350
    ),
    'banner' => true,
    'themesColor' => array(
        'type'=> 'false',
        'warnaDef'=>'main-color:#e94b45;hover-color:#e4716c;button-color:#ff9692;form-newsletter:#fa8782;button-subscribe:#07cb84;hover-button-subscribe:#03b373;button-viewall:#9dca46;hover-button-viewall:#7aa32a',
        'color'=>false
        ),
    'layout' => false,

);