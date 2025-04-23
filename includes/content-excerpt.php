<?php

function rss_add_featured_image_to_excerpt_feed($excerpt) {
    if (is_feed() && has_post_thumbnail()) {
        $image_url = get_the_post_thumbnail_url(null, 'medium');
        if ($image_url) {
            $image_tag = '<p><img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" /></p>';
            return $image_tag . $excerpt;
        }
    }
    return $excerpt;
}
add_filter('the_excerpt_rss', 'rss_add_featured_image_to_excerpt_feed');