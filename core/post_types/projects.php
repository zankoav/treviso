<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 25.10.2018
 * Time: 19:30
 */


add_action('init', 'add_project_type');

function add_project_type(){
    register_post_type('project', array(
        'labels'             => array(
            'name'               => 'Проект', // Основное название типа записи
            'singular_name'      => 'Проект', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый проект',
            'edit_item'          => 'Редактировать проект',
            'new_item'           => 'Новый проект',
            'view_item'          => 'Посмотреть проект',
            'search_items'       => 'Найти проект',
            'not_found'          =>  'Проект не найдено',
            'not_found_in_trash' => 'В корзине проектов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Проекты'

        ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-media-text',
        'supports'           => array('title')
    ) );
}