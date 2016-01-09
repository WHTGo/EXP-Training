<?php
/*
Plugin Name: Custom Post Type
Plungin URI:http://jundat95.blogspot.com
Author: Jundat95
Author URI: http://jundat95.blogspot.com
Description: Phan mem mien phi
Version:1.0
*/

/*Custom post type*/
add_action('init', 'create_product_post_type');
function create_product_post_type(){
    register_post_type('product',
        array(
            'labels'  =>  array(
                'name'  =>  __('Product1'),
                'singular_name' =>  __('Product1'),
                'add_new' =>  __('Add New'),
                'add_new_item'  =>  __('Add New Product'),
                'edit'  =>  __('Edit'),
                'edit_item' =>  __('Edit Product'),
                'new_item'  =>  __('New Product'),
                'view'  =>  __('View Product'),
                'view_item' =>  __('View Product'),
                'search_items' =>  __('Search Products'),
                'not_found' =>  __('No Products found'),
                'not_found_in_trash'  =>  __('No Products found in Trash')
            ),
            'public'  =>  true,
            'show_ui' =>  true,
            'publicy_queryable' =>  true,
            'exclude_from_search' =>  false,
            'menu_position' => 20,
            //'menu_icon' =>  get_stylesheet_directory_uri(). '/images/product.png',
            'hierarchical'  => false,
            'query_var' =>  true,
            'supports'  =>  array(
                'title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail',
                'custom-fields'
            ),
            'rewrite' =>  array('slug'  =>  'product', 'with_front' =>  false),
            //'taxonomies' =>  array('post_tag', 'category'),
            'can_export'  =>  true,
            //'register_meta_box_cb'  =>  'call_to_function_do_something',
            'description' =>  __('Product description here.')
        )
    );
}


    add_action( 'init', 'create_post_type1' );
    function create_post_type1()
    {
        register_post_type(
            'acme_product',
            array(
                'labels' => array(
                    'name' => __( 'Products' ),
                    'singular_name' => __( 'Product' )
                ),
                'public' => true,
                'has_archive' => true,
            )
        );
    }

?>