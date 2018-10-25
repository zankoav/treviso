<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 25.10.2018
 * Time: 20:22
 */

wp_enqueue_script('ajax', THEM_URI . '/js/ajax.js', null, false, 1);

add_action('wp_ajax_contact_form', 'contact_form_action_callback');
add_action('wp_ajax_nopriv_contact_form', 'contact_form_action_callback');

function contact_form_action_callback() {

    $response = ['status' => 'error'];
    $data = json_decode(str_replace('\\', '', $_POST['data']), true);

    if(isset($data['user-name'],$data['user-email'],$data['user-message'])){

        $to = 'zankoav@gmail.com';
        $subject = 'message from treviso';
        $message = "
            <p>Имя: <b>".$data['user-name']."</b></p>
            <p>Email: <b>".$data['user-email']."</b></p>
            <p>".$data['user-message']."</p>
        ";
        $headers = array('Content-Type: text/html; charset=UTF-8');


        if(wp_mail($to,$subject,$message,$headers)){
            $response['status'] = 'ok';
        }
    }

    echo json_encode($response);
    wp_die();
}

add_action('wp_enqueue_scripts', 'contact_form_data', 99);
function contact_form_data() {

    // Первый параметр 'twentyfifteen-script' означает, что код будет прикреплен к скрипту с ID 'twentyfifteen-script'
    // 'twentyfifteen-script' должен быть добавлен в очередь на вывод, иначе WP не поймет куда вставлять код локализации
    // Заметка: обычно этот код нужно добавлять в functions.php в том месте где подключаются скрипты, после указанного скрипта
    wp_localize_script('ajax', 'contact_form',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}