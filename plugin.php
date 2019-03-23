<?php
/**
 * Plugin Name: WPAPIYoastMeta
 * Version:     0.0.1
 * Description: Adds Yoast fields to WP REST API responses
 * Author:      Jan Henning Thorsen
 * Author URI:  https://braves.global
 * Plugin URI:  https://github.com/jhthorsen/wp-api-yoast-seo
 */

if (!defined('WP_API_YOAST_POST_TYPES')) {
  define('WP_API_YOAST_POST_TYPES', ['page', 'post']);
}

foreach (WP_API_YOAST_POST_TYPES as $type) {
  register_rest_field($type, 'yoast', array(
    'get_callback' => function($post) {
      return (array) array(
        'canonical'             => get_post_meta($post['id'], '_yoast_wpseo_canonical', true),
        'meta_robots_nofollow'  => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-nofollow', true),
        'meta_robots_noindex'   => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-noindex', true),
        'metadesc'              => get_post_meta($post['id'], '_yoast_wpseo_metadesc', true),
        'opengraph_description' => get_post_meta($post['id'], '_yoast_wpseo_opengraph-description', true),
        'opengraph_image'       => get_post_meta($post['id'], '_yoast_wpseo_opengraph-image', true),
        'opengraph_image_id'    => get_post_meta($post['id'], '_yoast_wpseo_opengraph-image-id', true),
        'opengraph_title'       => get_post_meta($post['id'], '_yoast_wpseo_opengraph-title', true),
        'primary_category'      => get_post_meta($post['id'], '_yoast_wpseo_primary_category', true),
        'redirect'              => get_post_meta($post['id'], '_yoast_wpseo_redirect', true),
        'score'                 => get_post_meta($post['id'], '_yoast_wpseo_content_score', true),
        'title'                 => get_post_meta($post['id'], '_yoast_wpseo_title', true),
        'twitter_description'   => get_post_meta($post['id'], '_yoast_wpseo_twitter-description', true),
        'twitter_image'         => get_post_meta($post['id'], '_yoast_wpseo_twitter-image', true),
        'twitter_image_id'      => get_post_meta($post['id'], '_yoast_wpseo_twitter-image-id', true),
        'twitter_title'         => get_post_meta($post['id'], '_yoast_wpseo_twitter-title', true),
      );
    },
  ));
}
