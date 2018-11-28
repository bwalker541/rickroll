<?php
/**
 * RickRoll Uninstall Functions.
 *
 * @package RickRoll
 * @subpackage Uninstall
 *
 * @author Bonnie Walker
 */


// Make sure uninstall was called from WP
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete 
delete_option( 'yarr_video_link' );


 $user_query = new WP_User_Query( array( 'meta_key' => 'yarr_been_rickrolled') );
  $users_rickrolled = $user_query->get_results();

  if (!empty($users_rickrolled)) {

    foreach($users_rickrolled as $user){

      delete_user_meta( $user->ID, 'yarr_been_rickrolled' );

    }


  }
