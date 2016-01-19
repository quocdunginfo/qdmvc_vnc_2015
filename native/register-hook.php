<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 19/1/16
 * Time: 9:25 PM
 */

function qdmvc_logout_hook_01() {
    Qdmvc_Helper::deleteUserCache();
}
add_action('wp_logout', 'qdmvc_logout_hook_01');