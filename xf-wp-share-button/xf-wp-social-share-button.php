<?php
/*
Plugin Name: XFactor WP Social Share Buttons
Plugin URI:  http://rahisaiful.com
Description: This describes my plugin in a short sentence
Version:     1.0
Author:      Rahi Saiful
Author URI:  http://rahisaiful.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset
*/


require_once(dirname(__FILE__) . '/inc/admin.php');


/*
* use xf_social_sharing_buttons() for show social media 
*/
//share button 
function xf_social_sharing_buttons() {
	$title=(get_option('xf_share_title'))? esc_attr( get_option('xf_share_title') ):"SHARE ON";
	// Get current page URL 
	$xfURL = get_permalink();

	// Get current page title
	$xfTitle = str_replace( ' ', '%20', get_the_title());
	
	// Get Post Thumbnail for pinterest
	$xfThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	// fx sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.$xfTitle.'&amp;url='.$xfURL.'&amp;via=xf';
	$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$xfURL;
	$googleURL = 'https://plus.google.com/share?url='.$xfURL;
	$bufferURL = 'https://bufferapp.com/add?url='.$xfURL.'&amp;text='.$xfTitle;
	
	// Based on popular demand added Pinterest too
	$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$xfURL.'&amp;media='.$xfThumbnail[0].'&amp;description='.$xfTitle;

	// Add sharing button at the end of page/page content
	$content .= '<div class="xf-social '.esc_attr( get_option('wrapper_class') ).'">';
	$content .= '<h5 class="xf_title '.esc_attr( get_option('title_class') ).'">'.$title.'</h5>';
	$content .='<a class="xf-link xf-twitter '.esc_attr( get_option('a_tag_class') ).'" href="'. $twitterURL .'" target="_blank">Twitter</a>';
	$content .= '<a class="xf-link xf-facebook '.esc_attr( get_option('a_tag_class') ).'" href="'.$facebookURL.'" target="_blank">Facebook</a>';
	$content .= '<a class="xf-link xf-googleplus '.esc_attr( get_option('a_tag_class') ).'" href="'.$googleURL.'" target="_blank">Google+</a>';
	$content .= '<a class="xf-link xf-buffer '.esc_attr( get_option('a_tag_class') ).'" href="'.$bufferURL.'" target="_blank">Buffer</a>';
	$content .= '<a class="xf-link xf-pinterest '.esc_attr( get_option('a_tag_class') ).'" href="'.$pinterestURL.'" target="_blank">Pin It</a>';
	$content .= '</div>';
	
	echo $content;
};
