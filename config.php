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
            // $title = Pengaturan::all();
            //$theme->setTitle('title');
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
        'home_product'      => 5,
        'main_product'      => 12,
        'related_product'   => 4,
        'latest_product'    => 6,
        'bestseller'        => 6,
        'featured'          => 6,
        'blog'              => 5,
        'testimonial'       => 4,
        'image_product'     => 'large',
        'image_slide'       => 1200,
        'image_mainbanner'  => 750,
        'image_sidebanner'  => 350
    ),
    'banner' => true,
    'themesColor' => array(
        'number'  => 7,
        'warnaDef'=> 'images/red;#D60202',
        'type'    => 'true', 
        'color'   => 'blue:#3884ab;gray:#7c7d7d;green:#90be03;niagara:#03bebc;orange:#bf7102;pink:#dc0055;red:#D60202'
    )
);