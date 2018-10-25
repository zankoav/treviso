<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 23.10.2018
 * Time: 20:41
 */

define('THEM_URI', get_template_directory_uri().'/');
define('THEM_DIR', get_template_directory().'/');

require_once THEM_DIR.'core/constants.php';
require_once THEM_DIR.'core/cmb2.php';
require_once THEM_DIR.'core/post_types/projects.php';
require_once THEM_DIR.'core/ajax.php';

function get_current_lang(){
    return isset($_COOKIE['lang']) ?
        ($_COOKIE['lang'] == 'en' ? 'en' : 'ru') :
        'ru';
}



