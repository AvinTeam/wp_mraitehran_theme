<div class="container mt-4 d-flex flex-column  flex-lg-row  ">
    <div class="col-12 col-lg-8">

        <div class="zba-row mx-auto mt-4">
            <!-- لیست پست‌ها -->
            <div class="zba-row mx-auto row row-cols-1 row-cols-md-2  ">
                <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>

                <div class="col my-3 ">
                    <div class="bg-white rounded-3 d-flex flex-column  border border-1 border-primary-400 p-2 shadow">
                        <a href="<?php the_permalink(); ?>"><img class="rounded-3 w-100 archive-image"
                                style="height: 222px;"
                                src="<?php echo(has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '' ?>"></a>
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div>
                                <?php
                                            $categories = get_the_category();
                                            if (! empty($categories)) {

                                                foreach ($categories as $index => $category) {
                                                    $category_link = esc_url(get_category_link($category->term_id));
                                                    echo '<a class="text-primary-600" href="' . $category_link . '">' . esc_html($category->name) . '</a> ';
                                                    if (($index + 1) < sizeof($categories)) {echo ' | ';}
                                                }
                                            }
                                        ?>
                            </div>

                            <span class="text-primary-600"><?php echo tarikh(get_the_date('Y-m-d')); ?></span>
                        </div>

                        <a class="text-primary fw-900 my-2  " href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>

                </div>

                <?php endwhile; ?>
                <?php else: ?>
                <p>هیچ پستی یافت نشد.</p>
                <?php endif; ?>
            </div>
            <?php
                global $wp_query;
                $big        = 999999999;
                $pagination = paginate_links([
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $wp_query->max_num_pages,
                    'type'      => 'array',
                    'prev_text' => __('قبلی'),
                    'next_text' => __('بعدی'),
                 ]);
                if (is_array($pagination)) {
                    echo '<nav aria-label="Page navigation">';
                    echo '<ul class="pagination justify-content-center">';
                    foreach ($pagination as $page) {
                        if (strpos($page, 'current') !== false) {
                            echo '<li class="page-item active">' . str_replace('page-numbers', 'page-link bg-primary text-white border-primary', $page) . '</li>';
                        } else {
                            echo '<li class="page-item">' . str_replace('page-numbers', 'page-link text-primary', $page) . '</li>';
                        }
                    }
                    echo '</ul>';
                    echo '</nav>';
                }
            ?>
        </div>


















    </div>
    <div class="col-12 col-lg-4">

        <div class=" d-flex flex-row justify-content-start align-items-center p-3">
            <span class="text-white text-center py-2 px-5 f-22px fw-bold bg-warning rounded-5">سایر اخبار</span>
        </div>

        <div class="d-flex flex-column justify-content-center px-3 gap-3 ">
            <?php
                $args = [
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'category_name'  => 'news',
                 ];
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                    $query->the_post(); ?>
            <div class="bg-primary p-3 w-100 ">
                <img src="<?php echo(has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '' ?>"
                    class="w-100" alt="<?php echo get_the_title() ?>">
                <p class="fw-bold f-24px text-white my-3"><?php echo get_the_title() ?></p>
            </div>
            <?php
                }
                } else {
                    echo 'هیچ پستی در این دسته‌بندی پیدا نشد.';
                }

                wp_reset_postdata(); // بازنشانی کوئری

            ?>
        </div>
    </div>
</div>


<?php
