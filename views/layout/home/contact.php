<div class="container mrtai-contact pt-3" id="contact">
    <div class=" d-flex flex-row justify-content-center align-items-center py-3">
        <span class=" border border-1 text-white rounded-5 text-center py-2 px-5 title f-22px fw-bold">ارتباط با ما</span>
    </div>
    <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mt-2">
        <div class=" col-12 col-md-6 d-flex flex-column text-white gap-3">
            <?php echo do_shortcode($mrtai_option[ 'contact_7' ]); ?>
        </div>
        <div class=" left col-12 col-md-6 d-flex flex-column text-white gap-3">
            <div>
                <img src="<?php echo mrtai_image('phone.png') ?>">
                <span><?php echo $mrtai_option[ 'phone' ] ?></span>

            </div>

            <div>
                <img src="<?php echo mrtai_image('email.png') ?>">
                <span><?php echo $mrtai_option[ 'email' ] ?></span>

            </div>

            <div>
                <img src="<?php echo mrtai_image('location.png') ?>">
                <span><?php echo $mrtai_option[ 'address' ] ?></span>

            </div>

            <div>

                <div class="w-100">
                    <?php echo $mrtai_option[ 'map' ] ?>
                </div>

            </div>
        </div>



    </div>
</div>