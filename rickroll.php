<?php
/*

Plugin Name: How To RickRoll Your WordPress Clients
Plugin URI: https://bonniewalker.net/
Description:  I think the name says it all. For code sample and demonstration purposes only. I really don't recommend that you actually RickRoll your clients, unless they have a really good sense of humor.
Version: 18.11alpha
Author: Bonnie Walker
Author URI: https://bonniewalker.net
Copyright 2019 Bonnie Walker (hello@bonniewalker.net)
License: GPLv2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt)
Requires at least: 4.9
Tested up to: 4.9.8

Text Domain: rickroll
Domain Path: /lang/

*/

global $wpdb;

define ('YARR_VERSION', '18.11alpha');
define ('YARR_INCLUDES_DIR', plugin_dir_path (__FILE__).'includes/');
define ('YARR_DEFAULT_VIDEO_LINK', 'https://vimeo.com/148751763');

//includes
include_once ( YARR_INCLUDES_DIR . 'site-admin/yarr-wp-settings-reading-menu.php' );
include_once ( YARR_INCLUDES_DIR . 'site-admin/yarr-wp-admin-dashboard-hacks.php' );
include_once ( YARR_INCLUDES_DIR . 'site-admin/yarr-wp-users-rickroll-report.php' );

//hooks
//plugin activation / deactivation
register_activation_hook( __FILE__, 'yarr_activate' );
register_deactivation_hook( __FILE__, 'yarr_deactivate' );

//admin settings, menu and dashboard
add_action( 'admin_init', 'yarr_settings_reading_init' );
add_action('wp_dashboard_setup', 'yarr_wp_dashboard_widgets');
add_action('admin_menu', 'yarr_rickrolled_users_menu');

//users page

add_filter('manage_users_columns' , 'yarr_add_rickroll_user_column');
add_filter( 'manage_users_custom_column', 'yarr_date_rickrolled_custom_column', 10, 3 );

//oEmbed filter
add_filter('oembed_fetch_url', 'yarr_autoplay_oembed', 10, 3);


function yarr_activate() {

    if ( version_compare (get_bloginfo('version'), '4.9', '<')) {
        deactivate_plugins( basename(__FILE__));//deactivate the plugin
        //maybe echo a message?
        echo '<div id="message" class="error">
                <h2>How To RickRoll Your WP Clients</h2>
                <p>How To RickRoll Your WP Clients requires WordPress version 4.9 or higher.  Please upgrade your WordPress version first, then install this plugin.  Thanks!</p>
                    </div>';
        }//if
    

//plugin may be deactivated for maintenance; don't want to override any custom settings

          
    if (is_multisite() ) {
         
        echo ' <div id="message"><h2>How To RickRoll Your WordPress Clients</h2>
                <p>The How To RickRoll Your WordPress Clients plugin was activated, however, I noticed that you are using WordPress Multisite and I wanted to point out that this plugin is not quite Multisite ready yet! I am working on it! Proceed with caution for now!</p>
                    </div>';

        }//if

              
              if (!get_option('yarr_video_link')) add_option('yarr_video_link', YARR_DEFAULT_VIDEO_LINK);

}//activate

function yarr_deactivate(){

//if you make any maintenance scripts, deactivate them on deactivation
//unschedule cron events
//wp_clear_scheduled_hook( 'yarr_whatever_hook' );
       
           
}//deactivate




function yarr_autoplay_oembed( $provider, $url, $args ) {

    //i could not get this to work for youtube, even though the autoplay var is supposed to work there too; vimeo has less ads anyway!
    if (strpos($provider, 'vimeo')!==FALSE) {
        
        $provider = add_query_arg('autoplay', 1, $provider);
    }

    return $provider;
}


//add a column to the users page and name it
function yarr_add_rickroll_user_column( $columns ) {

  
    $columns['yarr_date_rickrolled'] = esc_html__( 'RickRolled', 'rickroll' );

    return $columns;
}

//populate the custom column on users page with date rickrolled
function yarr_date_rickrolled_custom_column( $default, $column_name, $user_id ) {

    // Set row value to user_nicename if applicable.
    if ( 'yarr_date_rickrolled' === $column_name ) {
        $got_rickrolled = get_user_meta( $user_id , 'yarr_been_rickrolled' );

        if ( ! empty( $got_rickrolled ) ) {
            $default = date('Y-m-d', strtotime($got_rickrolled[0]));
        } else {
            $default = '-- not yet --';
        }
    }

    return $default;
}



?>