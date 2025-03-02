<?php

    get_header();

    $count_posts = wp_count_posts('matart')->publish;

    $user_query  = new WP_User_Query([ 'role' => 'mat_leader' ]);
    $users_count = $user_query->get_total();

?>





<div class=" bg-primary d-flex flex-column justify-content-around align-items-center ">

    <div class="swiper sliderSwiper w-100">
        <div class="swiper-wrapper">
            <div class="swiper-slide my-auto read_hero bg-primary">
                <div class="mrtai_slider mx-auto d-flex flex-row justify-content-center align-items-center">

                    <div class="col-9 d-none d-lg-flex flex-row justify-content-center align-items-end ">

                        <img style="height: 800px; width: 362px;" src="<?php echo mrtai_image('slider-boy.png') ?> ">
                        <img style="height: 345px; width: 300px;" src="<?php echo mrtai_image('robot.png') ?> ">
                        <img style="height: 800px; width:622px; margin-right: -100px;"
                            src="<?php echo mrtai_image('slider-girl.png') ?> ">
                    </div>
                    <div class="col-lg-3 col-12 d-flex flex-column justify-content-end my-3">
                        <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news.png') ?> "></div>
                        <h2 class="text-white text-end fw-bold f-52px">فرصت ثبت نام تمدید شد</h2>
                        <p class="text-white text-end text-md-end f-22px">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت
                            نام
                            در
                            جشنواره به وب
                            سایت
                            مراجعه کنند</p>
                        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                            <a href="/panel" id="panellogin" class="btn btn-outline-light w-100 py-3 f-22px fw-bold">ثبت
                                نام</a>
                            <a href="/panel" class="btn btn-warning w-100 text-primary py-3 f-22px fw-bold">ورود </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide  my-auto read_hero bg-pink">
                <div class="mrtai_slider mx-auto d-flex flex-row justify-content-center align-items-center">

                    <div class="col-9 d-none d-lg-flex flex-row justify-content-center align-items-center h-800px  ">

                        <img class="w-50" src="<?php echo mrtai_image('slider-robot2.png') ?> ">
                    </div>
                    <div class="col-lg-3 col-12 d-flex flex-column justify-content-end my-3">

                        <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news.png') ?> "></div>
                        <h2 class="text-white text-end fw-bold f-52px">آموزش</h2>
                        <p class="text-white text-end text-md-end f-22px">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت
                            نام
                            در
                            جشنواره به وب
                            سایت
                            مراجعه کنند</p>
                        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                            <a href="/panel" id="panellogin" class="btn btn-outline-light w-100 py-3 f-22px fw-bold">ثبت
                                نام</a>
                            <a href="/panel" class="btn btn-warning w-100 text-primary py-3 f-22px fw-bold">ورود </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide  my-auto read_hero bg-primary" style="background-position-x: center;">
                <div class="mrtai_slider mx-auto d-flex flex-row justify-content-center align-items-center">

                    <div class="col-9 d-none d-lg-flex flex-row justify-content-center align-items-end h-800px pb-5   ">
                        <div class="w-50 row row-cols-2 slider-post row-gap-3 justify-content-around">
                            <?php
                                $parent_category = get_term_by('slug', 'gallery', 'category'); // دریافت اطلاعات دسته والد

                                $query = new WP_Query([
                                    'cat'            => $parent_category->term_id, // گرفتن پست‌های این زیر دسته
                                    'posts_per_page' => 6,                         // تعداد پست‌ها
                                 ]);

                                if ($query->have_posts()) {
                                    while ($query->have_posts()) {
                                        $query->the_post();

                                        $image_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : "";

                                        echo '     <a href="' . get_permalink() . '" class="col" > <img title="' . get_the_title() . '" class=" w-100" src="' . $image_url . ' "></a>';
                                    }
                                    wp_reset_postdata();
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 d-flex flex-column justify-content-end my-3">

                        <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news.png') ?> "></div>
                        <h2 class="text-white text-end fw-bold f-52px">گالری چند رسانه ای</h2>
                        <p class="text-white text-end text-md-end f-22px">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت
                            نام
                            در
                            جشنواره به وب
                            سایت
                            مراجعه کنند</p>
                        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                            <a href="/panel" id="panellogin" class="btn btn-outline-light w-100 py-3 f-22px fw-bold">ثبت
                                نام</a>
                            <a href="/panel" class="btn btn-warning w-100 text-primary py-3 f-22px fw-bold">ورود </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide bg-robot my-auto bg-primary">
                <div class="mrtai_slider mx-auto d-flex flex-row justify-content-center align-items-center">

                    <div
                        class="col-9 d-none d-lg-flex flex-row justify-content-center align-items-center h-800px pb-5   ">


                        <img style="height: 664px; width: 609px;" src="<?php echo mrtai_image('slider-robot2.png') ?> ">


                    </div>
                    <div class="col-lg-3 col-12 d-flex flex-column justify-content-end ">

                        <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news.png') ?> "></div>
                        <h2 class="text-white text-end fw-bold f-52px">آموزش</h2>
                        <p class="text-white text-end text-md-end f-22px">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت
                            نام
                            در
                            جشنواره به وب
                            سایت
                            مراجعه کنند</p>
                        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                            <a href="/panel" id="panellogin" class="btn btn-outline-light w-100 py-3 f-22px fw-bold">ثبت
                                نام</a>
                            <a href="/panel" class="btn btn-warning w-100 text-primary py-3 f-22px fw-bold">ورود </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide my-auto read_hero bg-secondary">
                <div class="mrtai_slider mx-auto d-flex flex-row justify-content-center align-items-center">

                    <div class="col-8 d-none d-lg-flex flex-row justify-content-center align-items-end h-800px ">
                        <img style="height: 700px; width: 369px;" src="<?php echo mrtai_image('slider-s-girl.png') ?> ">
                        <img style="height: 345px; width: 300px; margin-bottom: 30px;"
                            src="<?php echo mrtai_image('robot.png') ?> ">
                        <img style="height: 700px; width: 277px; margin-right: -100px;"
                            src="<?php echo mrtai_image('slider-boy-tablet.png') ?> ">
                    </div>
                    <div class="col-lg-4 col-12 d-flex flex-column justify-content-end my-3">
                        <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news2.png') ?> ">
                        </div>
                        <h2 class="text-white text-end fw-bold f-52px">فرصت ثبت نام تمدید شد</h2>
                        <p class="text-white text-end text-md-end f-22px">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت
                            نام
                            در
                            جشنواره به وب
                            سایت
                            مراجعه کنند</p>
                        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                            <a href="/panel" id="panellogin" class="btn w-100 py-3 f-22px fw-bold btn-outline-pink">ثبت
                                نام</a>
                            <a href="/panel" class="btn btn-warning w-100 text-primary py-3 f-22px fw-bold bg-pink">ورود
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!--
<div class="container-fluid bg-primary ">
    <div class="w-75 mx-auto read_hero">
        <div class="row justify-content-between align-items-center pt-3">
            <img class="col-md-3 robot" src="<?php echo mrtai_image('robot.png') ?>">
            <img class="col-md-5  d-none d-md-block" src="<?php echo mrtai_image('headgirl.png') ?>">

            <div class="col-md-4 d-flex flex-column">
                <div class="text-end"><img class=" w-25" src="<?php echo mrtai_image('new-news.png') ?> "></div>
                <h2 class="text-white text-center fw-bold">فرصت ثبت نام تمدید شد</h2>
                <p class="text-white text-center text-md-end">علاقه مندان میتوانن تا پایان اسفندماه برای ثبت نام در
                    جشنواره به وب
                    سایت
                    مراجعه کنند</p>
                <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-3">
                    <a href="/panel" id="panellogin" class="btn btn-outline-light w-100">ثبت نام</a>
                    <a href="/panel" class="btn btn-warning w-100">ورود </a>
                </div>
            </div>
        </div>
    </div>

</div> -->

<div class="container-fluid bg-pink  d-none " id="edu">
    <div class="w-75 mx-auto read_hero pt-3">
        <div class="row justify-content-between align-items-center pt-3">
            <h3 class="fw-bold text-white display-5">آموزش</h3>
        </div>
        <div class="row justify-content-between align-items-center gap-3 edu-images pb-2">
            <img class="col-md-3 edu-logo" src="<?php echo mrtai_image('edu-logo.png') ?>">
            <img class="col-md-5" src="<?php echo mrtai_image('math-fildes.png') ?>">
            <img class="col-md-2 d-none d-md-block " src="<?php echo mrtai_image('edu-girl.png') ?>">
        </div>

    </div>
</div>



<div class="bg-primary py-5">


    <div class="container text-center">
        <a href="/category/edu/image-training/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-image.png') ?>"></a>
        <a href="/category/edu/graphics-training/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-graphics.png') ?>"></a>
        <a href="/category/edu/programming-training/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-programming.png') ?>"></a>
        <a href="/category/edu/digital-game-training/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-game.png') ?>"></a>
        <a href="/category/edu/teaching-correspondence/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-text.png') ?>"></a>
        <a href="/category/edu/music-education/"><img class="p-1 my-2 mrtai-cat-img"
                src="<?php echo mrtai_image('cat-music.png') ?>"></a>
    </div>
</div>

<div class="bg-primary pb-5">
    <div class="container">
        <div class=" d-flex flex-row justify-content-center align-items-center py-3">
            <span class=" border border-1 text-white rounded-5 text-center py-2 px-5 title f-22px fw-bold">از اینجا شروع
                کن</span>
        </div>
        <div class="row row-cols-2 row-cols-lg-3 justify-content-between align-items-center">
            <a class="col py-3" href="/panel"><img class="w-100" src="<?php echo mrtai_image('register.png') ?>"></a>
            <a id="qanda" class="col py-3" href="/frequently-asked-questions"><img class="w-100"
                    src="<?php echo mrtai_image('q-and-a.png') ?>"></a>
            <a class="col py-3" href="/frequently-asked-questions"><img class="w-100"
                    src="<?php echo mrtai_image('asar.png') ?>"></a>
        </div>
        <div class="row justify-content-center align-items-center py-3 mrtai-row d-none">
            <a href="#edu" style="width: 60px;">
                <img class="" src="<?php echo mrtai_image('arrow-down.png') ?> ">
            </a>
        </div>
    </div>
</div>

<div class="bg-primary py-5">
    <?php mrtai_layout('home/short_edu'); ?>
</div>

<div class="bg-primary py-5 ">
    <div class="container d-flex flex-row mrtai ">
        <div class="col-3 px-5">
            <p class="mrtai-count-list fw-bold text-center">6</p>
            <p class="f-22px fw-bold text-white text-center">تعداد رشته های
                جشنواره</p>

        </div>
        <div class="col-3 px-5">
            <p class="mrtai-count-list fw-bold text-center"><?php echo $count_posts ?></p>
            <p class="f-22px fw-bold text-white text-center">تعداد آثار ارسال شده
                تا این لحظه</p>

        </div>
        <div class="col-3 px-5">
            <p class="mrtai-count-list fw-bold text-center"><?php echo $users_count ?></p>
            <p class="f-22px fw-bold text-white text-center">تعداد شرکت کنندگان
                تا این لحظه</p>

        </div>
        <div class="col-3 px-5">
            <p class="mrtai-count-list fw-bold text-center">24</p>
            <p class="f-22px fw-bold text-white text-center">فرصت باقی مانده
                برای ارسال آثار</p>

        </div>


    </div>

</div>

<div class="bg-primary">
    <div class="container d-none  pt-3" id="news">
        <div class="row justify-content-between align-items-center pt-3">
            <h3 class="fw-bold text-white display-5">آخرین اخبار</h3>
        </div>
        <div class="row justify-content-between align-items-center gap-3 mt-3">
            <div class="swiper mySwiper w-100">
                <div class="swiper-wrapper">

                    <?php
                        $args = [
                            'post_type'      => 'post',
                            'posts_per_page' => -1,
                            'category_name'  => 'news',
                         ];
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                            $query->the_post(); ?>
                    <div class="swiper-slide">
                        <div class="d-flex flex-row justify-content-center align-items-center news-item p-2 gap-2 ">
                            <a href="<?php echo get_permalink() ?>">
                                <img height="120px"
                                    src="<?php echo(has_post_thumbnail()) ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '' ?>"
                                    class="card-img-top rounded shadow" alt="<?php echo get_the_title() ?>">
                            </a>
                            <div class="d-flex flex-column">
                                <span class="text-danger"><?php echo tarikh(get_the_date('Y-m-d')) ?></span>
                                <a class="nav-link" href="<?php echo get_permalink() ?>">
                                    <div class="ps-2 card-hover-text"><?php echo get_the_title() ?></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        } else {
                            echo 'هیچ پستی در این دسته‌بندی پیدا نشد.';
                        }

                        wp_reset_postdata(); // بازنشانی کوئری

                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="container pt-3" id="gallery">
        <div class=" d-flex flex-row justify-content-center align-items-center py-3">
            <span class=" border border-1 text-white rounded-5 text-center py-2 px-5 title f-22px fw-bold">چند رسانه
                ای</span>
        </div>
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
                            <button data-filter="all" class="mpcategory border border-1 rounded border-warning p-2 mpactive">نمایش همه</button>';
                            foreach ($subcategories as $term) {

                                echo '<button  data-filter="category' . $term->term_id . '" class="mpcategory border border-1 rounded border-warning p-2">' . $term->name . '</button>';

                                $query = new WP_Query([
                                    'cat'            => $term->term_id,
                                    'posts_per_page' => 6,
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

    <div class="bg-primary  read_hero">
        <?php mrtai_layout('home/contact'); ?>
        <div style="height: 100px;"></div>
    </div>



    <?php

    get_footer();