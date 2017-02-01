<?php
/**
 * This function helps with the quick creation of custom widget areas.
 * It accepts 3 arguments: Widget ID/name, theme location and priority.
 * Requires the Genesis Framework.
 *    
 * @package      Seo Theme
 * @link         https://seothemes.net/seo-theme
 * @author       Seo Themes
 * @copyright    Copyright © 2017 Seo Themes
 * @license      GPL-2.0+
 * @param        string   $id      
 * @param        string   $location     
 * @param        int      $priority    default = 1
 * @return       true 
 */
function custom_widget_area($id, $location, $priority = 1 ) {

    // Format the id for use as widget name
    $name  = ucwords( str_replace( '-', ' ', $id) );

    // Register sidebar with 
    genesis_register_sidebar( array(
        'id'            => $id,
        'name'          => $name,
        'description'   => 'This is the ' . strtolower($name) . ' widget area which will appear in the ' . str_replace( '_', ' ', $location) . ' section.',
    ) );

    // Display the widget area theme location and priority
    add_action( $location, function() use ($id) {
        genesis_widget_area( $id, array(
            'before' => '<div class="' . $id . '"><div class="wrap">',
            'after'  => '</div></div>',
        ) );
    }, $priority );
    
}

// Example widget areas
custom_widget_area( 'before-header', 'genesis_header', 1 );
custom_widget_area( 'before-footer', 'genesis_footer', 2 );
custom_widget_area( 'after-footer',  'genesis_footer', 3 );
