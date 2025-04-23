<?php

function rss_add_featured_image_to_content_feed($content) {
    if (is_feed() && has_post_thumbnail()) {
        $image_url = get_the_post_thumbnail_url(null, 'medium');
        if ($image_url) {
            $image_tag = '<p><img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" /></p>';
            return $image_tag . $content;
        }
    }
    return $content;
}
// Add featured image to RSS content
add_filter('the_content', 'rss_add_featured_image_to_content_feed');
add_filter('the_content_feed', 'rss_add_featured_image_to_content_feed');