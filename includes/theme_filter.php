<?php
(defined('ABSPATH')) || exit;

function mrtai_title_filter($title)
{
    if (is_home() || is_front_page()) {
        $title = get_bloginfo('name') . " | صفحه اصلی";
    } elseif (is_single()) {
        $title = get_the_title() . " | " . get_bloginfo('name');
    } elseif (is_category()) {
        $title = single_cat_title('', false) . " | دسته‌بندی";
    } elseif (is_tag()) {
        $title = single_tag_title('', false) . " | برچسب";
    } elseif (is_search()) {
        $title = "نتایج جستجو برای " . get_search_query();
    } elseif (is_404()) {
        $title = get_bloginfo('name') . "صفحه پیدا نشد | ";
    } else {
        $title = get_bloginfo('name');
    }
    return $title;
}
add_filter('wp_title', 'mrtai_title_filter');


add_filter('get_the_archive_title_prefix', function ($prefix) {

    return '';
});
