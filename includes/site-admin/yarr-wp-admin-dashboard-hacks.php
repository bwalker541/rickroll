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


function yarr_wp_dashboard_widgets () {
  

	if(count(get_included_files()) == 1) exit("Direct access not permitted.");
 
 $current_user = wp_get_current_user();

//if they have been rickrolled already, move on!
 if (!( $yarr_user_meta = get_user_meta($current_user->ID, 'yarr_been_rickrolled', true))) { 

      //Completely remove wp default dashboard widgets 
      remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );      //Quick Press widget
      remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      //Recent Drafts
      remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );      //WordPress.com Blog
      remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );      //Other WordPress News
      remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );    //Incoming Links
      remove_meta_box( 'dashboard_plugins',       'dashboard', 'normal' );    //Plugins
      remove_meta_box( 'wp_welcome_panel', 'dashboard-network', 'normal');
      remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
     // remove_meta_box('try_gutenberg_panel', 'dashboard', 'normal');//attempted to clear out new gutenberg thingy; it didn't work
    

    remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal');
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal');
    
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

    wp_add_dashboard_widget('yarr_dash_widget', 'A Special Message From Your WordPress Developer', 'yarr_custom_dashboard_widget');    

  }//not been rickrolled yet
      
}//function

function yarr_custom_dashboard_widget(){

  
  if(count(get_included_files()) == 1) exit("Direct access not permitted.");
  
  $current_user = wp_get_current_user();

if (!($yarr_never_give_up = get_site_option('yarr_video_link')))
  $yarr_never_give_up = YARR_DEFAULT_VIDEO_LINK;

  
  $embed_code = wp_oembed_get($yarr_never_give_up, array( 'width' => 300) );

  echo '<div style="display: block; margin: auto 0 auto 0;"><p>Please standby for an important message from your WordPress Developer:</p>'.$embed_code.'</div>';

  echo '<p style="text-align: center;"><strong>Important Information About Your WordPress Website</strong><br>
  <a href="'.esc_url($yarr_never_give_up).'">Click Here If The Video Does Not Load or Play</a></p>';

  add_user_meta($current_user->ID, 'yarr_been_rickrolled', current_time('mysql'));

}//function

?>