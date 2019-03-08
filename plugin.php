<?php
/**
 * Plugin       Name: WPAPIYoastMeta
 * Version:     0.0.1
 * Description: Adds Yoast fields to WP REST API responses
 * Author:      Jan Henning Thorsen
 * Author URI:  https://braves.global
 * Plugin URI:  https://github.com/jhthorsen/wp-api-yoast-seo
 */

class WPAPIYoastMeta {
  function __construct() {
    add_action('rest_api_init', array($this, 'add_yoast_data'));
  }

  function add_yoast_data() {
    register_rest_field('post', 'yoast', array(
      'get_callback'    => array($this, 'wp_api_encode_yoast_post'),
      'schema'          => null,
      'update_callback' => null,
    ));

    register_rest_field('page', 'yoast', array(
      'get_callback'    => array($this, 'wp_api_encode_yoast_post'),
      'schema'          => null,
      'update_callback' => null,
    ));

    $types = get_post_types(array('public' => true, '_builtin' => false));
    foreach($types as $key => $type) {
      register_rest_field($type, 'yoast', array(
        'get_callback'    => array($this, 'wp_api_encode_yoast_post'),
        'schema'          => null,
        'update_callback' => null,
      ));
    }
  }

  function wp_api_encode_yoast_post($post, $field_name, $request) {
    wp_reset_query();

    query_posts([
      'p'         => $post['id'],
      'post_type' => $post['type'],
    ]);

    $yoastMeta = array(
      'canonical' => get_post_meta($post['id'], '_yoast_wpseo_canonical',             true),
      'nofollow'  => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-nofollow',  true),
      'noindex'   => get_post_meta($post['id'], '_yoast_wpseo_meta-robots-noindex',   true),
      'og_desc'   => get_post_meta($post['id'], '_yoast_wpseo_opengraph-description', true),
      'og_image'  => get_post_meta($post['id'], '_yoast_wpseo_opengraph-image',       true),
      'og_title'  => get_post_meta($post['id'], '_yoast_wpseo_opengraph-title',       true),
      'redirect'  => get_post_meta($post['id'], '_yoast_wpseo_redirect',              true),
      'title'     => get_post_meta($post['id'], '_yoast_wpseo_title',                 true),
    );

    return (array) $yoastMeta;
  }
}

$WPAPIYoastMeta = new WPAPIYoastMeta();
