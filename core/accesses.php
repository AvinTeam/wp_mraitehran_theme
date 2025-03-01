<?php

(defined('ABSPATH')) || exit;

add_theme_support('post-thumbnails');
add_theme_support('menus');


function custom_theme_setup()
{
    register_nav_menus([
        'main-menu'   => 'فهرست اصلی',
        'footer-menu' => 'فهرست فوتر',
     ]);
}
add_action('after_setup_theme', 'custom_theme_setup');


class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="dropdown-menu">';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        
        $active_class = in_array('current-menu-item', $classes) || in_array('current_page_parent', $classes) || in_array('current_page_ancestor', $classes) ? ' active' : '';

        $dropdown_class = in_array('menu-item-has-children', $classes) ? ' dropdown' : '';

        $output .= '<li class="nav-item mrtai-row' . esc_attr($dropdown_class . $active_class) . '">';

        $attributes = !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $attributes .= ' class="btn nav-link text-white fw-bold' . $active_class;

        if (in_array('menu-item-has-children', $classes)) {
            $attributes .= ' dropdown-toggle" data-bs-toggle="dropdown"';
        } else {
            $attributes .= '"';
        }

        $output .= '<a' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}



class Footer_Menu_Walker extends Walker_Nav_Menu
{
    private $count = 0; // شمارشگر آیتم‌ها
    private $total = 0; // تعداد کل آیتم‌ها

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        return; // حذف <ul>
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        return; // حذف </ul>
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $this->count++; // افزایش شمارشگر آیتم‌های پردازش‌شده
        $output .= '<a href="' . esc_url($item->url) . '" class="text-body mx-2">' . esc_html($item->title) . '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if ($this->count < $this->total) { // فقط اگر این آیتم، آخرین نباشه "| " اضافه کن
            $output .= ' | ';
        }
    }

    public function walk($elements, $max_depth, ...$args)
    {
        $this->total = count($elements); // ذخیره تعداد کل آیتم‌های منو
        return parent::walk($elements, $max_depth, ...$args);
    }
}
