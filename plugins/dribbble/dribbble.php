<?php
/*
*Plugin Name: WPDribble
 * Plugin URI:  http://muriithikamweti.com
 * Description: Retrieves latest shots from the Dribble REST API.
 * Version:     0.1
 * Author:      Muriithi Kamweti
 * Author URI:   http://muriithikamweti.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
 //Constructor
 class WPDribbble{
    protected $pluginPath;  
    protected $pluginUrl;
    
    public function __construct() {
    
        // Set Plugin Path  
        $this->pluginPath = dirname(__FILE__);  
      
        // Set Plugin URL  
        $this->pluginUrl = WP_PLUGIN_URL . '/wp-Dribbble';
        add_shortcode('Dribbble', array($this, 'shortcode'));
        // Add shortcode support for widgets  
        add_filter('widget_text', 'do_shortcode');
    }
    public function shortcode($atts)  {  
        // extract the attributes into variables  
        extract(shortcode_atts(array(  
            'images' => 3,  
            'width' => 50,  
            'height' => 50,  
            'caption' => true,  
        ), $atts));  
          
        // pass the attributes to getImages function and render the images  
        return $this->getImages($atts['user'], $images, $width, $height, $caption);
        
    }  
        public function getImages($user, $images = 3, $width = 50, $height = 50, $caption = true) {  
        include 'DribbbleAPI.php';  
          
        $DribbbleAPI = new DribbbleAPI($user);  
        $shots = $DribbbleAPI->getPlayerShots($images);  
          
        if($shots) {  
            $html[] = '<ul class="wp-Dribbble">';  
              
            foreach($shots as $shot) {  
                $image = $shot->image_url; // url of the image  
                $fileName = $shot->id . '.png'; // generating a filename image_id.png  
                  
                if (!file_exists($this->pluginPath . '/full-images/' . $fileName)) { // check if the full image exists  
                    $rawImage = wp_remote_get($image); // get the full image  
                    $newImagePath = $this->pluginPath  . '/full-images/' . $fileName;  
                    $fp = fopen($newImagePath, 'x');  
                    fwrite($fp, $rawImage['body']); // save the full image  
                    fclose($fp);  
                }  
                  
                // generate thumbnail url  
                $localImage = $this->pluginUrl . '/timthumb.php?src=' . strstr($this->pluginPath, 'wp-content') . '/full-images/' . $fileName . '&w=' . $width . '&h=' . $height . '&q=100';  
                  
                if($caption) { // if caption is true  
                    $captionHTML = '<p class="wp-Dribbble-caption">' . $shot->title . '</p>';  
                }  
                  
                // combine shot url, title and thumbnail to add to the ul list  
                $html[] = '<li class="wp-Dribbble-list"><a href="' . $shot->url . '" title="' . $shot->title . '"><img src="' . $localImage . '" alt="' . $shot->title . '" /></a>'.$captionHTML.'</li>';  
            }  
              
            $html[] = '</ul>';  
              
            return implode("\n", $html);  
        }  
    }  
 $wpDribbble = new WPDribbble(); 
 ?>