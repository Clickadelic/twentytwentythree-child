<?php

if(!class_exists('Theme_Tweaks')){
    class Theme_Tweaks {

        function __construct(){
            add_action('wp_enqueue_scripts', array($this, 'load_theme_scripts'), 21);
            add_action('wp_before_admin_bar_render', array($this, 'remove_logo'), 21);
            add_action('wp_enqueue_scripts', array($this, 'load_theme_scripts'), 21);
        }

        function remove_logo(){
            global $wp_admin_bar;
            $wp_admin_bar->remove_menu('wp-logo');
        }

        function load_theme_scripts(){
            $parent_style = 'twentytwentythree';
            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
            wp_enqueue_style( 'styles',
            get_stylesheet_directory_uri() . '/style.css',
            array( $parent_style, 'twentytwentythree' ),
            wp_get_theme()->get('Version')

            );
        }
    }
}

$theme_tweaks = new Theme_Tweaks();