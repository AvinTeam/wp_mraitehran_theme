<div class="container pt-3" id="gallery">
        <div class="row justify-content-between align-items-center gap-3">
            <div class="mpcontainer">
                <?php

                    $parent_category_slug = 'gallery';                                              // اسلاگ دسته والد
                    $parent_category      = get_term_by('slug', $parent_category_slug, 'category'); // دریافت اطلاعات دسته والد

                    $all_posts = [  ];

                    if ($parent_category) {

                        $subcategories = get_categories([
                            'parent'     => $parent_category->term_id, // فقط زیر دسته‌های `gallery`
                            'hide_empty' => false,                     // نمایش دسته‌های خالی هم
                         ]);

                        if (! empty($subcategories)) {

                            echo '<nav class="mpcategories">
                            <button data-filter="all" class="mpcategory text-primary border border-1 rounded border-warning p-2 mpactive">نمایش همه</button>';
                            foreach ($subcategories as $term) {

                                echo '<button  data-filter="category' . $term->term_id . '" class="mpcategory  text-primary border border-1 rounded border-warning p-2">' . $term->name . '</button>';

                                $query = new WP_Query([
                                    'cat'            => $term->term_id, // گرفتن پست‌های این زیر دسته
                                    'posts_per_page' => 6,              // تعداد پست‌ها
                                 ]);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $all_posts[  ] = [
                                            'id'        => get_the_ID(),
                                            'title'     => get_the_title(),
                                            'url'       => get_permalink(),
                                            'date'      => get_the_date('Y-m-d H:i:s'),
                                            'term_id'   => $term->term_id,
                                            'term_name' => $term->name,
                                            'image'     => (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '',
                                         ];
                                    }
                                    wp_reset_postdata();
                                }
                            }
                            echo '</nav>';

                            usort($all_posts, function ($a, $b) {
                                return $b[ 'id' ] - $a[ 'id' ];
                            });

                            echo '<div class="mpgallery">';
                            foreach ($all_posts as $post) {

                                echo '
                <div class="mpgallery-item"  data-category="category' . $post[ 'term_id' ] . '" data-title="' . $post[ 'title' ] . '" data-id="' . $post[ 'id' ] . '" >
                    <a href="' . $post[ 'url' ] . '">
                        <img src="' . $post[ 'image' ] . '" alt="' . $post[ 'title' ] . '">
                        <div class="title">' . $post[ 'title' ] . '</div>
                    </a>
                </div>';
                            }

                            echo '</div></div>';
                        }
                    }

                ?>










            </div>

        </div>
    </div>