<?php
/*
Plugin Name: myFirst-block
Author: tomasz 
*/


class MyFirstBlock {
    public function __construct() {
        add_action('init', array($this, 'myfirst_block'));
    }

    public function myfirst_block() {
        $styleURI = plugin_dir_url(__FILE__) . 'src/style.css';
        $editorStyleURI = plugin_dir_url(__FILE__) . 'src/editor.css';

        // Enqueue style
        wp_enqueue_style(
            'myfirst-block-style',
            $styleURI,
            array(),
            null
        );

        wp_enqueue_style(
            'myfirst-block-editor-style',
            $editorStyleURI,
            array('wp-edit-blocks'), 
            null
        );
        wp_register_script(
            'myfirstblock',
            plugin_dir_url(__FILE__) . 'build/index.js',
            array('wp-blocks', 'wp-element', 'wp-editor'),
            null,
            true 
        );

        // Register block
        register_block_type('gutenreact/myfirst-block', array(
            'editor_script' => 'myfirstblock',
            'editor_style'  => 'myfirst-block-editor-style',
            'style'         => 'myfirst-block-style'
        ));
    }
}

$block = new MyFirstBlock();

