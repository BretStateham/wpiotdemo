<?php
/**
* Plugin Name: Bret's WordPress Azure IoT Plugin
* Plugin URI: http://bretstateham.com 
* Description: Make the monkey dance on comments 
* Author: Bret Stateham
* Author URI: http://bretstateham.com 
* Version: 0.0.1
* License: GPLv2
*/

function wpiotdemo_invoke_azure_function_with_guzzle($comment_id, $comment_approved, $comment_data) {
    //do something else

    require __DIR__ . '/vendor/autoload.php';
    
    try {

      //Try posting to Azure Function using Guzzle
       $guzzle = new GuzzleHttp\Client([
         // Base URI is used with relative requests
         'base_uri' => 'http://httpbin.org',
         // You can set any number of default request options.
         'timeout'  => 2.0,
       ]);
      
       $response = $guzzle->post('https://wpiotcode.azurewebsites.net/api/MonkeyDanceHttp?code=9t2glsu3u1u35r2tkvhcv26gvic0qhcrvcfsqvoifhruihehfryzcy8l2qmk2gwspl10oyfogvi');

    } catch (Exception $e) {
        //Do nothing...
    }
    
}


add_action('comment_post','wpiotdemo_invoke_azure_function_with_guzzle', 10, 3);