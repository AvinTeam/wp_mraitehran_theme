<?php get_header(); ?>
<div class="container mt-4 d-flex flex-column  flex-lg-row  ">
    <div class="col-12 col-lg-8">
        <?php if (has_post_thumbnail()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top img-fluid rounded"
            alt="<?php the_title(); ?>">
        <?php endif; ?>
        <h1 class="f-52px fw-bold my-2"><?php the_title(); ?></h1>
        <div class="f-24px text-justify"><?php the_content(); ?> </div>
    </div>
    <div class="col-12 col-lg-4">

        <?php
            $sidebar_title = "اخبار";
            $sidebar_slug  = "news";

            // دریافت دسته‌بندی‌های پست فعلی
            $categories = get_the_category();

            if ($categories) {
                // دریافت اولین دسته‌بندی (دسته‌بندی اصلی)
                $current_category = $categories[ 0 ];

                // بررسی اینکه آیا این دسته‌بندی والد دارد یا خیر
                if ($current_category->parent) {
                    // دریافت اطلاعات دسته‌بندی والد
                    $parent_category = get_category($current_category->parent);
                    $parent_slug     = $parent_category->slug;
                } else {
                    $parent_slug = $current_category->slug;
                }

                if ($parent_slug == 'gallery') {
                    $sidebar_title = "چند رسانه ای";
                    $sidebar_slug  = "gallery";
                } elseif ($parent_slug == 'edu') {

                    $sidebar_title = "چند آموزش";
                    $sidebar_slug  = 'edu';

                }

            }

        ?>

        <div class=" d-flex flex-row justify-content-start align-items-center p-3">
            <span class="text-white text-center py-2 px-5 f-22px fw-bold bg-warning rounded-5">سایر
                <?php echo $sidebar_title ?></span>
        </div>

        <div class="d-flex flex-column justify-content-center px-3 gap-3 ">
            <?php
                $args = [
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'category_name'  => $sidebar_slug,
                    'orderby'        => 'rand',
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

<style>
.short-edu .title,
.mrtai-contact .title {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
}

.mrtai-contact .left span {
    color: #000000;
    ;
}
</style>
<?php

    mrtai_layout('home/short_edu');
    mrtai_layout('home/contact');

get_footer(); ?>