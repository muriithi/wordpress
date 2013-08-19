<?php
/*
*Plugin Name: Twitter
 * Plugin URI:  http://muriithikamweti.com
 * Description: Retrieves the number of followers and latest Tweet from your Twitter account.
 * Version:     0.1
 * Author:      Muriithi Kamweti
 * Author URI:   http://muriithikamweti.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
 class Twitter{
    private static $instance;
    
    //constructor
    private function __construct() {
        add_action( 'the_content', array( $this, 'display_twitter' ) );
    } 
    
    public function get_instance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    private function makeRequest($username){
        $response = wp_remote_get('https://twitter.com/users'.$username.'.json');
        try {
            $json = json_decode($response['body']);
        }catch (Exception $ex) {
            $json = null;
        }
        return $json;
    
    }
    public function display_twitter($content) {
 
    // If we're on a single post or page...
    if ( is_single() ) {
 
        // ...attempt to make a response to twitter. Note that you should replace your username here!
        if ( null == ( $json_response = $this->make_twitter_request( 'wptuts' ) ) ) {
 
            // ...display a message that the request failed
            $html = '
        <div id="twitter-demo-content">';
         $html .= 'There was a problem communicating with the Twitter API..';
         $html .= '</div>
        <!-- /#twitter-demo-content -->';
         
            // ...otherwise, read the information provided by Twitter
            } else {
         
                $html = '
        <div id="twitter-demo-content">';
         $html .= 'I have ' . $this->get_follower_count( $json_response ) . ' followers and my last tweet was "' . $this->get_last_tweet( $json_response ) . '".';
         $html .= '</div>
        <!-- /#twitter-demo-content -->';
         
            } // end if/else
         
            $content .= $html;
         
            } // end if/else
         
            return $content;
 
    }   
    private function get_follower_count( $json ) {
        return ( -1 < $json->followers_count ) ? $json->followers_count : -1;
    } // end get_follower_count
 
    private function get_last_tweet( $json ) {
        return ( 0 < strlen( $json->status->text ) ) ? $json->status->text : '[ No tweet found. ]';
    } // end get_last_tweet 
 
 }
 // Trigger the plugin
Twitter::get_instance();