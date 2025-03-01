<?php
    (defined('ABSPATH')) || exit;
    global $title;

?>

<div id="wpbody-content">
    <div class="wrap mrtai_menu">
        <h1><?php echo esc_html($title) ?></h1>


        <hr class="wp-header-end">

        <form method="post" action="" novalidate="novalidate" class="ag_form">
            <?php wp_nonce_field('mrtai_nonce' . get_current_user_id());

                // print_r($mrtai_option);
                // exit;
            ?>


            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><label for="contact_7">کد کوتاه فرم تماس با ما</label></th>
                        <td>

                        <textarea rows="1" name="contact_7" id="contact_7"
                                class="regular-text dir-ltr"><?php echo $mrtai_option[ 'contact_7' ] ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="phone">شماره تماس</label></th>
                        <td>
                            <input name="phone" type="text" class="regular-text dir-ltr" id="phone"
                                value="<?php echo $mrtai_option[ 'phone' ] ?>">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="email">ایمیل</label></th>
                        <td>
                            <input name="email" type="text" class="regular-text dir-ltr" id="email"
                                value="<?php echo $mrtai_option[ 'email' ] ?>">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="address">آدرس</label></th>
                        <td>
                            <textarea rows="4" name="address" id="address"
                                class="regular-text"><?php echo $mrtai_option[ 'address' ] ?></textarea>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row"><label for="map">نقشه گوگل</label></th>
                        <td>
                            <textarea rows="4" name="map" id="map"
                                class="regular-text dir-ltr"><?php echo $mrtai_option[ 'map' ] ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>




            <p class="submit">
                <button type="submit" name="mrtai_act" value="mrtai__submit" id="submit"
                    class="button button-primary">ذخیرهٔ
                    تغییرات</button>
            </p>



        </form>

    </div>


    <div class="clear"></div>
    <div class="oni-loader "></div>
</div>