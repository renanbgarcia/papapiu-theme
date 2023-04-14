<?php

// if (!defined('ABSPATH')) {
//     exit;
// }

add_action('customize_register', 'pp_theme_settings');

function pp_theme_settings($wp_customize)
{
    $wp_customize->add_panel('pp_custom_settings', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Papapiu',
        'description'    => 'Configurações pro tema Papapiu',
    ));

    /**
     * Header section
     */
    $wp_customize->add_section('pp_header_section', array(
        'title' => __('Header'),
        'description' => __('Informações do header'),
        'panel' => 'pp_custom_settings', // Not typically needed.
    ));

    $wp_customize->add_setting('instagram_page', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'www.instagram.com.br/',
    ));

    $wp_customize->add_setting('facebook_page', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'www.facebook.com.br/',
    ));

    $wp_customize->add_setting('pinterest_page', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => 'www.pinterest.com.br/',
    ));

    $wp_customize->add_control('instagram_page', array(
        'type' => 'url',
        'section' => 'pp_header_section',
        'label' => 'Instagram page'
    ));

    $wp_customize->add_control('facebook_page', array(
        'type' => 'url',
        'section' => 'pp_header_section',
        'label' => 'Facebook page'
    ));

    $wp_customize->add_control('pinterest_page', array(
        'type' => 'url',
        'section' => 'pp_header_section',
        'label' => 'Pinterest page'
    ));


    $wp_customize->add_setting('pp_email', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '',
    ));

    $wp_customize->add_control('pp_email', array(
        'type' => 'email',
        'section' => 'pp_header_section',
        'label' => 'E-mail'
    ));

    //Negative logo
    $wp_customize->add_setting('pp_negative_logo', array(
        'type' => 'theme_mod', // or 'option'
        'capability' => 'edit_theme_options',
        'default' => '',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pp_negative_logo', array(
        'label' => __('Negative logo'),
        'section' => 'title_tagline',
        'settings' => 'pp_negative_logo'
    )));

    /** Hero Settings */
    $wp_customize->add_setting('hero_heading', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Learning Center for Your Kids',
    ));

    $wp_customize->add_control('hero_heading', array(
        'type' => 'input',
        'section' => 'pp_header_section',
        'label' => _('Hero heading')
    ));

    $wp_customize->add_setting('hero_sub_heading', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem ipsum dolor sit amet et tra la la et rococo',
    ));

    $wp_customize->add_control('hero_sub_heading', array(
        'type' => 'input',
        'section' => 'pp_header_section',
        'label' => _('Hero Subtext')
    ));

    $wp_customize->add_setting('action_button', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
    ));

    $wp_customize->add_control('action_button', array(
        'type' => 'checkbox',
        'section' => 'pp_header_section',
        'label' => _('Action button'),
        'description' => "Should show the action button?"
    ));

    $wp_customize->add_setting('hero_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label' => __('Featured Hero Image'),
        'section' => 'pp_header_section',
        'settings' => 'hero_image'
    )));

    /**
     * 
     * Content Settings
     * 
     */
    $wp_customize->add_section('pp_content_section', array(
        'title' => __('Content'),
        'description' => __('Informações do content'),
        'panel' => 'pp_custom_settings', // Not typically needed.
    ));

    $wp_customize->add_setting('home_featured_lessons', array(
        'type' => 'theme_mod',
        'default' => true,
    ));

    $wp_customize->add_control('home_featured_lessons', array(
        'type' => 'checkbox',
        'section' => 'pp_content_section',
        'label' => _('Feature Lessons?'),
        'description' => "If should feature lessons on home."
    ));

    $wp_customize->add_setting('home_show_whatweoffer', array(
        'type' => 'theme_mod',
        'default' => false,
    ));

    $wp_customize->add_control('home_show_whatweoffer', array(
        'type' => 'checkbox',
        'section' => 'pp_content_section',
        'label' => _('Show "What we offer" block?'),
        'description' => "If should show What We Offer on home."
    ));

    $wp_customize->add_setting('home_show_princing', array(
        'type' => 'theme_mod',
        'default' => false,
    ));

    $wp_customize->add_control('home_show_princing', array(
        'type' => 'checkbox',
        'section' => 'pp_content_section',
        'label' => _('Show princing block?'),
        'description' => "If should show princing on home."
    ));

    $wp_customize->add_setting('home_show_testimonials', array(
        'type' => 'theme_mod',
        'default' => false,
    ));

    $wp_customize->add_control('home_show_testimonials', array(
        'type' => 'checkbox',
        'section' => 'pp_content_section',
        'label' => _('Show Testimonials block?'),
        'description' => "If should show testimonials on home."
    ));

    /**
     * 
     * Footer Settings
     * 
     */
    $wp_customize->add_section('pp_footer_section', array(
        'title' => __('Footer'),
        'description' => __('Informações do footer'),
        'panel' => 'pp_custom_settings',
    ));

    $wp_customize->add_setting('footer_widget_form', array(
        'type' => 'theme_mod',
        'default' => true,
    ));

    $wp_customize->add_control('footer_widget_form', array(
        'type' => 'checkbox',
        'section' => 'pp_footer_section',
        'label' => _('Show widget instead hard coded form?'),
        'description' => "Show the predefined subcription for or what is set as widget?"
    ));

}
