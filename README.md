# WPAPIYoastMeta

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
    "canonical" => "…",
    "nofollow"  => "…",
    "noindex"   => "…",
    "og_desc"   => "…",
    "og_image"  => "…",
    "og_title"  => "…",
    "redirect"  => "…",
    "title"     => "…"
  }
}
```

## Installation

Download the plugin from https://github.com/jhthorsen/wp-api-yoast-meta/archive/master.zip
and upload it to your wordpress.

Activate the plugin through the 'Plugins' screen in WordPress

## Changelog

### 0.0.1

Initial release.
