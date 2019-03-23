# Yoast API meta data

* Contributors: Jan Henning Thorsen
* Tags: yoast, wp-api, rest, seo
* Requires at least: 5.0
* Tested up to: 5.1
* Stable tag: trunk
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

> Adds Yoast fields to WP REST API responses

## Description

Adds Yoast fields to WP REST API responses under the "yoast" key.

Note that it only adds the fields I care about.

Example:

```
{
  "id": "..."
  ...
  "yoast": {
    "canonical"             => "...",
    "meta_robots_nofollow"  => "...",
    "meta_robots_noindex"   => "...",
    "metadesc"              => "...",
    "opengraph_description" => "...",
    "opengraph_image"       => "...",
    "opengraph_image_id"    => "...",
    "opengraph_title"       => "...",
    "primary_category"      => "...",
    "redirect"              => "...",
    "score"                 => "...",
    "title"                 => "...",
    "twitter_description"   => "...",
    "twitter_image"         => "...",
    "twitter_image_id"      => "...",
    "twitter_title"         => "...",
  }
}
```

## Installation

Download the plugin from https://github.com/jhthorsen/wp-api-yoast-meta/archive/master.zip
and upload it to your wordpress.

Activate the plugin through the 'Plugins' screen in WordPress
