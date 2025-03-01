<?php
(defined('ABSPATH')) || exit;

add_action('admin_menu', 'mrtai_admin_menu');

/**
 * Fires before the administration menu loads in the admin.
 *
 * @param string $context Empty context.
 */
function mrtai_admin_menu(string $context): void
{

    $setting_suffix = add_menu_page(
        'تنظیمات قالب',
        'تنظیمات قالب',
        'manage_options',
        'mrtai',
        'setting_panels',
        'dashicons-hammer',
        2
    );

    function setting_panels()
    {
        $mrtai_option = mrtai_start_working();

        require_once MRTAI_VIEWS . 'menu/setting.php';

    }

    add_action('load-' . $setting_suffix, 'mrtai__submit');

    function mrtai__submit()
    {

        if (isset($_POST[ 'mrtai_act' ]) && $_POST[ 'mrtai_act' ] == 'mrtai__submit') {

            if (wp_verify_nonce($_POST[ '_wpnonce' ], 'mrtai_nonce' . get_current_user_id())) {

                $_POST[ 'contact_7' ] = (wp_unslash(trim($_POST[ 'contact_7' ])));
                $_POST[ 'map' ]       = wp_unslash(nl2br(($_POST[ 'map' ])));

                mrtai_update_option($_POST);

                wp_admin_notice(
                    'تغییر شما با موفقیت ثبت شد',
                    [
                        'id'          => 'message',
                        'type'        => 'success',
                        'dismissible' => true,
                     ]
                );

            } else {
                wp_admin_notice(
                    'ذخیره سازی به مشکل خورده دوباره تلاش کنید',
                    [
                        'id'          => 'mrtai_message',
                        'type'        => 'error',
                        'dismissible' => true,
                     ]
                );

            }

        }

    }
}
