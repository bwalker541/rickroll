<?php

/*

How To RickRoll Your WordPress Clients
WordPress Plugin
WordPress 4.9.x
Created: Astley 2018

*/


function yarr_rickrolled_users_menu() {
    add_users_page('How To RickRoll Your WordPress Clients', 'RickRoll Report', 'manage_options', 'yarr-users-report', 'yarr_rickrolled_users_report_page');
}

function yarr_rickrolled_users_report_page(){

   if(count(get_included_files()) == 1) exit("Direct access not permitted.");

echo '<div class="wrap">'; 
echo '<h1>RickRoll Report</h1>
<div style="background: #fff; clear: both; padding: 10px; margin: 10px; border: 3px dotted #f7c55c;">';

$show_main_page = 1;
if ( isset($_REQUEST['yarr_cancel_action']) && ($_REQUEST['yarr_cancel_action'] == "Cancel")) {
         
         echo '<div class="updated" id="message"><p>Action Cancelled. No changes were made. </p></div>';

} else if ((isset($_REQUEST['action']) && ! empty ($_REQUEST['action']))) {

if ($_REQUEST['action'] == 'confirm_reset_rickroll') {

  check_admin_referer('yarr_users-'.$_REQUEST['action']);
  $show_main_page = 0;
  $yarr_action = 'rickroll_reset_confirmed';


  //are you sure?
  echo '<br><form method="POST">'
.wp_nonce_field('yarr_users-'.$yarr_action).'
<input type="hidden" name="action" value="'.$yarr_action.'" />
<fieldset style="border: 1px solid #666666; padding:10px; padding-bottom:20px;">
    <legend style="font-size:120%; font-weight: bold;">Confirm RickRoll Reset?</legend>

        <p>Are you sure you wish to reset your RickRoll? This means all of your users will be subject to another RickRoll! Please confirm:</p>
    <input type="submit" name="" value="Yes, Reset The RickRoll!" class="button-primary" /> 
    <input type="submit" name="yarr_cancel_action" value="Cancel" /> 
    </fieldset>
    </form>';

} else if ($_REQUEST['action'] == 'rickroll_reset_confirmed') {


  check_admin_referer('yarr_users-'.$_REQUEST['action']);

  $user_query = new WP_User_Query( array( 'meta_key' => 'yarr_been_rickrolled') );
  $users_rickrolled = $user_query->get_results();

  if (!empty($users_rickrolled)) {

    foreach($users_rickrolled as $user){

      delete_user_meta( $user->ID, 'yarr_been_rickrolled' );

    }


  }
//just assume it went according to plan
  echo '<div class="updated" id="message"><p>Ok! Your RickRoll has been reset! Everyone should get RickRolled the next time they login!</p></div>';

}

}//if action


if ($show_main_page == 1) {

$user_query = new WP_User_Query( array( 'meta_key' => 'yarr_been_rickrolled') );
$num_rickrolled = $user_query->get_total();
$users_rickrolled = $user_query->get_results();


$result = count_users();


if ($num_rickrolled > 0) {

if ($num_rickrolled == 1) $plural_users = 'user';
  else $plural_users = 'users';

$dates_rickrolled = array();

  echo '<h2>Congratulations!</h2>
    <p>'.$num_rickrolled.' '. $plural_users.' out of '.$result['total_users'].' total have been RickRolled!</p>';


    if (!empty($users_rickrolled)) {

      
      
      foreach($users_rickrolled as $gotcha){

          $my_user_meta = get_user_meta($gotcha->ID, 'yarr_been_rickrolled');
          $dates_rickrolled[] = date('Y-m-d', strtotime($my_user_meta[0]));

      }

     
    }

$rickroll_summary = array_count_values($dates_rickrolled);
ksort($rickroll_summary);
//count it, if there's more than 10 put it in a scrolling div

echo '<table class="widefat">
        <thead>
        <tr>
          <th>Date</th>
          <th>Number RickRolls</th>
          </tr>
        </thead>
        <tbody>';

foreach ($rickroll_summary as $yarr_date => $num){

  echo '<tr>
          <td>'.esc_html($yarr_date).'</td>
          <td>'.esc_html($num).'</td>
        </tr>';


}

echo '</tbody></table>';


$yarr_action_value = 'confirm_reset_rickroll';
$yarr_nonce = wp_nonce_field('yarr_users-'.$yarr_action_value);

echo '<br>
<form method="post">
 <input type="hidden" name="action" value="'.$yarr_action_value.'" />
   '.$yarr_nonce.'
<fieldset style="border: 1px dashed #ccc; padding:10px; padding-bottom:20px;">
<legend style="font-size: 110%; font-weight: bold;">Reset RickRolls</legend>
<p>Would you like to reset all RickRolls?  This means everyone who has already been RickRolled, will get RickRolled again! If you recently re-activated the plugin, you should reset RickRolls to start a new round of RickRolling.  If you are in the middle of a RickRolling in progress, please be careful with resetting!</p>
  <p>
<input type="submit" name="'.$yarr_action_value.'" value="Yes! Reset RickRolls!" class="button-primary" /> 
</p>
</fieldset>
</form>
<h3>End RickRoll</h3>
<p>If you have had enough fun and wish to stop RickRolling your WordPress users, please go to the <a href="'.admin_url('plugins.php').'">Plugins Page</a> and Deactivate the "How To RickRoll Your WordPress Clients" plugin! You can re-activate the plugin and re-set the RickRolls when you are ready for another round of RickRolling!</p>';

} else {

  echo '<h2>No RickRolls Yet!</h2>
  <p>Perhaps give your clients a reason to log into their WordPress admin panel?</p>';

}
 
echo '</div>';//prettify
echo '</div>';//wrap

}//main page

}//function


?>