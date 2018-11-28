<?php

/*

How To RickRoll Your WordPress Clients
WordPress Plugin
WordPress 4.9.x
Created: Astley 2018

*/


if ( preg_match( '#' . basename( __FILE__ ) . '#', $_SERVER['PHP_SELF'] ) ) {
    wp_die( 'You are not allowed to call this page directly.' );
}


function yarr_settings_reading_init() {

add_settings_section(
  'yarr_settings',
  'How To RickRoll Your WordPress Clients',
  'yarr_settings_reading_page',
  'reading'
);

add_settings_field(
    'yarr_video_link',
    'URL of RickRoll Video:',
    'yarr_settings_video_link',
    'reading',
    'yarr_settings'
);

register_setting( 'reading', 'yarr_video_link' );

}//function

function yarr_settings_reading_page( $arg ) {
  
    echo '<p>Videos, even Rick Astley\'s, tend to move around, so if the original video link that came with this plugin is no longer working, enter the URL of your favorite RickRoll video online.  Can also be used to annoy clients who like to participate in Holiday Song Avoidance challenges.</p>
    <p>Hint: Vimeo videos tend to autoplay better if you can find the offending video on Vimeo, it will probably "roll" better.</p>';
}

function yarr_settings_video_link( $arg ) {
     
    if (!($current_yarr_video_link = get_site_option('yarr_video_link')))
        $current_yarr_video_link = YARR_DEFAULT_VIDEO_LINK;

    echo '<input type="url" name="yarr_video_link" value="'.esc_url($current_yarr_video_link).'" size="60" />';

}
?>