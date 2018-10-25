<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 25.10.2018
 * Time: 18:48
 */

add_action('cmb2_admin_init', 'treviso_register_theme_options_metabox');
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function treviso_register_theme_options_metabox() {

    $prefix = 'treviso_';
    /**
     * Registers options page menu item and form.
     */
    $cmb_options = new_cmb2_box(array(
        'id' => $prefix . 'theme_options_page',
        'title' => esc_html__('Настройки темы', 'cmb2'),
        'object_types' => array('options-page'),

        /*
         * The following parameters are specific to the options-page box
         * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
         */

        'option_key' => $prefix . 'theme_options', // The option key and admin menu page slug.
        'icon_url' => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
        // 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
        // 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
        // 'capability'      => 'manage_options', // Cap required to view options-page.
        // 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
        // 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
        // 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
        // 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
        // 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
        // 'message_cb'      => 'yourprefix_options_page_message_callback',
        // 'tab_group'       => '', // Tab-group identifier, enables options page tab navigation.
        // 'tab_title'       => null, // Falls back to 'title' (above).
        // 'autoload'        => false, // Defaults to true, the options-page option will be autloaded.
    ));

    /**
     * Options fields ids only need
     * to be unique within this box.
     * Prefix is not needed.
     */
    $cmb_options->add_field(array(
        'name' => esc_html__('Section our works', 'treviso'),
        'id' => 'our_works_title',
        'type' => 'title'
    ));

    $cmb_options->add_field(array(
        'name' => esc_html__('Our works works RU', 'treviso'),
        'id' => 'our_works_description_ru',
        'type' => 'textarea_small'
    ));

    $cmb_options->add_field(array(
        'name' => esc_html__('Our works works EN', 'treviso'),
        'id' => 'our_works_description_en',
        'type' => 'textarea_small'
    ));

    $cmb_options->add_field(array(
        'name' => esc_html__('Favarite project', 'treviso'),
        'id' => 'our_project',
        'type' => 'select',
        'repeatable' =>true,
        'options_cb' => 'show_projects',
    ));

    $cmb_options->add_field(array(
        'name' => esc_html__('Section about us', 'treviso'),
        'id' => 'about_us_title',
        'type' => 'title'
    ));

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_our_skills = $cmb_options->add_field( array(
        'id'          => $prefix . 'skills',
        'type'        => 'group',
        'description' => esc_html__( 'Add any skills', 'treviso' ),
        'options'     => array(
            'group_title'   => esc_html__( 'Skill {#}', 'treviso' ), // {#} gets replaced by row number
            'add_button'    => esc_html__( 'Add Another Skill', 'treviso' ),
            'remove_button' => esc_html__( 'Remove Skill', 'treviso' ),
            'sortable'      => true,
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_options->add_group_field( $group_our_skills, array(
        'name'       => esc_html__( 'Skill icon', 'treviso' ),
        'description' =>  'Use icons from https://fontawesome.com/v4.7.0/icons/ <br> Example: <b>fa-address-book </b>',
        'id'         => 'icon',
        'type'       => 'text',
        'default' => 'fa-address-book'
    ) );

    $cmb_options->add_group_field( $group_our_skills, array(
        'name'       => esc_html__( 'Skill title RU', 'treviso' ),
        'id'         => 'title_ru',
        'type'       => 'text'
    ) );

    $cmb_options->add_group_field( $group_our_skills, array(
        'name'       => esc_html__( 'Skill title EN', 'treviso' ),
        'id'         => 'title_en',
        'type'       => 'text',
    ) );
}

add_action( 'cmb2_admin_init', 'project_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function project_register_metabox() {
    $prefix = 'treviso_project_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => esc_html__('Настройки проекта', 'treviso'),
        'object_types' => array('project'), // Post type
        // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
        // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
        // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Project Title RU', 'treviso'),
        'id' => $prefix . 'title_ru',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Project Title EN', 'treviso'),
        'id' => $prefix . 'title_en',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Project description RU', 'treviso'),
        'id' => $prefix . 'description_ru',
        'type' => 'textarea'
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Project description EN', 'treviso'),
        'id' => $prefix . 'description_en',
        'type' => 'textarea'
    ));

    $cmb_demo->add_field(array(
        'name' => esc_html__('Project icon', 'treviso'),
        'id' => $prefix . 'icon',
        'type' => 'file'
    ));
}
// Callback function
function show_projects() {

    $projects = [];
    $query = new WP_Query( array( 'post_type' => 'project' ) );
    $posts = $query->posts;

    foreach($posts as $post) {
        $projects[$post->ID] =  $post->post_name;
    }
    return $projects;
}