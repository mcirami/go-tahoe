<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package boiler
 */

/**
 * Social Media Integration Constants/Endpoints
 */

// Snow report service provider
define ( 'SNOW_REPORT_ENDPOINT', 'http://clientservice.onthesnow.com' );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function boiler_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'boiler_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function boiler_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'boiler_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function boiler_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'boiler_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function boiler_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'boiler' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'boiler_wp_title', 10, 2 );

/**
 * Custom excerpt link 
 * use print_excerpt(int)
 * uses content instead of excerpt field so be be preparred to filter html out 
 */

function print_excerpt($length) {
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text);
	$text = strip_tags($text,'<p><a>');
	//$text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

	$text = substr($text,0,$length);
	$excerpt = reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

/**
 * Twitter Integration Library
 */
require_once( "twitteroauth/twitteroauth.php" );

/**
 * Get Tweets for specific user 
 *
 * @param string 	$username 	the username account to get data from
 * @param integer   $count		number of tweets to return
 * @return array				Array of tweets or false if no results
 */
function get_tweets( $username, $count ) {
	
	$consumerkey 		= get_field( 'twitter_consumer_key', 'option' );
	$consumersecret 	= get_field( 'twitter_consumer_secret', 'option' );
	$accesstoken 		= get_field( 'twitter_access_token', 'option' );
	$accesstokensecret 	= get_field( 'twitter_access_token_secret', 'option' );
	
	$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$username."&count=".$count;
	$tweets = $connection->get($url);
	
	if ( isset( $tweets->errors ) ) {
		return false;
	} else return $tweets;
}

/**
 * Search Tweets by hashtag
 * 
 * @param string 	$hashtag 	the hashtag to search for
 * @param string 	$username 	the username account to get data from (optional)
 * @param integer   $count		number of tweets to return (optional, default = 5)
 * @return array				Array of tweets or false if no results
 */
function search_tweets( $hashtag, $username = '', $count = 5 ) {

	$consumerkey 		= get_field( 'twitter_consumer_key', 'option' );
	$consumersecret 	= get_field( 'twitter_consumer_secret', 'option' );
	$accesstoken 		= get_field( 'twitter_access_token', 'option' );
	$accesstokensecret 	= get_field( 'twitter_access_token_secret', 'option' );

	$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

	$url = "https://api.twitter.com/1.1/search/tweets.json?q=from%3A".$username."%20%23".$hashtag."&count=".$count;
	$tweets = $connection->get($url);

	if ($tweets)
		return $tweets->statuses;
	else return false;
}

/**
 * Youtube Integration - Get Videos for specific user
 * 
 * @param string 	$username 	the username account to get data from
 * @param integer   $count		number of video to return (optional, default = 3)
 * @return array				Array of videos or false if no results
 */
function get_youtube_videos( $username, $count = 3 ) {
	
	$api_key = get_field( 'youtube_api_key', 'option' );
	
	// Get Channel Info
	$url = sprintf("https://www.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=%s&key=%s", $username, $api_key);
	$response = wp_remote_get($url);
	
	if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
		$body = wp_remote_retrieve_body($response);
		$channel = json_decode($body);
		$upload_list_id = $channel->items[0]->contentDetails->relatedPlaylists->uploads;
		
		// Get Upload list Items
		$url = sprintf("https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=%u&playlistId=%s&key=%s", $count, $upload_list_id, $api_key);
		$response = wp_remote_get($url);
		
		if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
			$body = wp_remote_retrieve_body($response);
			$videos = json_decode($body);
			
			return $videos->items;		
		}
	}
	return false;
}

/**
 * Instagram Integration - Get Users Media
 *
 * @param string 	$username 	the username account to get data from
 * @param string 	$hashtag 	the hashtag to use in the search query (optional)
 * @param integer   $count		number of media to return (optional, default = 3)
 * @return array				Array of media or false if no results
 */
function get_instagram_media( $username, $count = 3, $hashtag = '' ) {

	$client_id = get_field( 'instagram_client_id', 'option' );

	// Get the user_id
	$url = "https://api.instagram.com/v1/users/search?q=".$username."&client_id=".$client_id;
	$response = wp_remote_get($url);

	if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
		$body = json_decode(wp_remote_retrieve_body($response));
		
		if ( count( $body->data ) > 0 ) {
			$user_id = $body->data[0]->id;
			
			// Get recent media
			$url = "https://api.instagram.com/v1/users/".$user_id."/media/recent/?client_id=".$client_id;
			
			if ( empty($hashtag) ) {
				$url .= "&count=".$count;
			}

			$response = wp_remote_get($url);
			
			if ( !is_wp_error($response)	&& isset($response['response']['code'])	&& 200 === $response['response']['code'] ) {
				$media = json_decode(wp_remote_retrieve_body($response));
				
				if ( empty($hashtag) ) return $media->data;
				else {
					$results_count = 0;
					$search_results = array();
					foreach ( $media->data as $item ) {
						if ( in_array(strtolower($hashtag), $item->tags) ) {
							$search_results[] = $item;
							$results_count++;
							
							if ($results_count == $count) break;
						}
					}
					return count($search_results) > 0 ? $search_results : false;
				}
			}
		}
	}
	return false;
}

function get_instagram_lastest_post( $username ) {
	$media = get_instagram_media( $username, 1 );
	return $media ? $media[0] : false;
}

/**
 * Facebook Integration - Get Page Feeds (returns only entries posted by the official page, not users)
 * @param string   	$page_name		name of the page to get feeds from
 * @param integer   $count			number of page feeds to return, default = 0 (return all)
 * @param string   	$image_size		Use this to request a full size image to return. Default = 'thumbnail'. Options: 'full_size_image'
 * @return array					Array of feeds or false if no results
 */
function get_facebook_feeds( $page_name, $count = 0, $image_size = 'thumbnail' ) {
	require_once('facebook/src/facebook.php');
	
	$config = array();
	$config['appId'] = get_field( 'facebook_app_id', 'option' );
	$config['secret'] = get_field( 'facebook_app_secret', 'option' );
	//$config['fileUpload'] = false; // optional
	
	$facebook = new Facebook($config);
	
	// get page id	
	$url = "http://graph.facebook.com/".$page_name;
	$response = wp_remote_get($url);
	
	if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
		$body = json_decode(wp_remote_retrieve_body($response));	
		$page_id = $body->id;
		
		$page_feeds = $facebook->api("/" . $page_id . "/feed");
		
		$i = 0;
		foreach($page_feeds["data"] as $feed) {
			
			// Skip if the post is not from the official page or it's a FB internal event/status
			if ( ($page_id != $feed["from"]["id"]) || ($feed["type"] == "status" && empty($feed["message"])) ) continue;

			if ( $image_size == "full_size_image" && isset( $feed['picture'] ) && isset( $feed['object_id'] ) ) {
				$image_obj = $facebook->api("/" . $feed['object_id'] );
				$feed['picture_full_size'] = $image_obj['source'];
			}
			
			// when count = 1, return the most recent occurence (the object itself), instead of an array of objects with only one element 
			if ($count == 1) return $feed;
			
			// if we've got to this point, populate the results array
			$results[] = $feed;
			
			// increase $i and if we reach the count, return current results
			$i++;			
			if ($i == $count) return $results;			
		}
		return $results;
	}
	return false;
}

function get_facebook_latest_post( $page_name, $image_size = 'thumbnail' ) {
	return get_facebook_feeds( $page_name, 1, $image_size );
}

/**
 * OnTheSnow.com Integration - Get snow report for specific resort
 *
 * @param string 	$id 	The Resort ID
 * @return report object	Report Information for the corresponding Resort
 */
function get_snow_report_by_resort_id( $id ) {
	
	if ( false === ( $forecast = get_transient( 'resort_forecast_' . $id ) ) ) {
		
		$token = get_field( 'api_access_token', 'option' );
		
		// Get Resort Info
		$url = sprintf( SNOW_REPORT_ENDPOINT . '/externalservice/resort/%s/snowreport?token=%s&language=en&country=US', $id, $token );
		$response = wp_remote_get($url);
		
		if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
			$body = wp_remote_retrieve_body($response);
			$obj = json_decode($body);
			set_transient( 'resort_forecast_' . $id , $obj->report, HOUR_IN_SECONDS / 2 );
			return $obj->report;
		} else {
			return false;
		}
	} else {
		$forecast = get_transient( 'resort_forecast_' . $id );
		return $forecast;
	}	
}

function get_snow_report_ajax () {
	
	$resort_id = $_POST['resort_id'];
	$report = get_snow_report_by_resort_id( $resort_id );
	
	if ( $report ) {
		$return = array (
					'openStatus'		=> $report->openflagname,
					'baseDepth'			=> $report->snowQuality->onSlope->upperDepth,
					'snowfall'			=> $report->snowfall->snow48h,
					'surfaceCondition'	=> $report->snowQuality->onSlope->surfaceTop
				);
		wp_send_json_success( $return );
	} else wp_send_json_error( array( 'message' => 'Error: Could not connect to report provider') );
}
add_action("wp_ajax_get_snow_report_ajax", "get_snow_report_ajax");
add_action("wp_ajax_nopriv_get_snow_report_ajax", "get_snow_report_ajax");

/**
 * OnTheSnow.com Integration - Get resort forecast info
 *
 * @param string 	$id 		The Resort ID
 * @param integer	$days		Number of the days, default = 0 (current day)
 * @return forecast object(s)	Forecast Information for the corresponding Resort or latest forecast object when days = 0
 */
function get_resort_forecast( $resort_id, $days = 0 ) {
	
	$token = get_field( 'api_access_token', 'option' );
	
	// Get Resort Forecast Info
	$url = sprintf( SNOW_REPORT_ENDPOINT . '/externalservice/resort/%s/%s/day/forecast?token=%s', $resort_id, $days, $token );
	$response = wp_remote_get($url);
	
	if ( !is_wp_error($response) && isset($response['response']['code']) && 200 === $response['response']['code'] ) {
		$body = wp_remote_retrieve_body($response);
		$obj = json_decode($body);
	
		if ( days == 0 ) return current( $obj );
		else return $obj;
	}
	return false;
}

/**
 * Add new Custom Query Variables
 */
function add_custom_query_vars( $vars ) {
	$new_vars = array ('lodging-by-type', 'lodging-by-town', 'deals-by-type');
	$vars = array_merge($vars, $new_vars);
	return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

/**
 * Add new Custom Rewrite Rule
 */
function add_custom_rewrite_rules( $rules ) {
	$new_rules = array(
					'lodging/([^/]+)/([^/]+)/?'		=> 'index.php?pagename=lodging&lodging-by-type=$matches[1]&lodging-by-town=$matches[2]',
					'lodging/([^/]+)/?'				=> 'index.php?pagename=lodging&lodging-by-type=$matches[1]',
					//'deals/([^/]+)/([^/]+)/?'		=> 'index.php?pagename=deals&deals-by-type=$matches[1]&deals-by-town=$matches[2]',
					'deals/([^/]+)/?'				=> 'index.php?pagename=deals&deals-by-type=$matches[1]',		
					// add more rules here..					
				);
	$rules = $new_rules + $rules;
	return $rules;
}
add_filter('rewrite_rules_array', 'add_custom_rewrite_rules');

function get_text_with_link( $text ) {
	return preg_replace( '~(\s|^)(https?://.+?)(\s|$)~im', '$1<a href="$2" target="_blank">$2</a>$3', $text );
}

// Use this function to get specific numbers of characters from a text without trimming a word
function summary($str, $limit) {

	if (strlen ($str) > $limit) {
		$str = substr ($str, 0, $limit - 3);
		return (substr ($str, 0, strrpos ($str, ' ')).'...');
	}
	return trim($str);
}