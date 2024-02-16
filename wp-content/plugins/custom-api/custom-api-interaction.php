<?php
/*
Plugin Name: Custom User Registration
Description: API to register user
Version: 1.0
Author: Your Name
*/

// function custom_register_user_route()
// {
//   register_rest_route('cur/v3', '/register/', array(
//     'methods'  => 'POST',
//     'callback' => 'custom_handle_registration',
//   ));
// }

// function custom_handle_registration($data)
// {
//   $username = 'maxpayne';
//   $email = 'max@email.com';
//   $password = 'Pass@123#word';
//   $role = 'subscriber';

//   $user_id = wp_create_user($username, $password, $email);

//   if (is_wp_error($user_id)) {
//     return new WP_Error('registration_failed', $user_id->get_error_message(), array('status' => 400));
//   }

//   $user = new WP_User($user_id);
//   $user->set_role($role);

//   return array('message' => 'Registration successful!', 'user_id' => $user_id, 'user_role' => $role);
// }

// add_action('rest_api_init', 'custom_register_user_route');

?>
