<?php
/*
Plugin Name: Short Code Test
Author: Jundat95
 */

add_shortcode( 'myshortcode', 'testFunction' );

function testFunction($ts)
{
    extract(shortcode_atts(
        array(
            'width'=> '560',
            'height'=> '315',
            'id'=> 'G9QdPiH-EYA'
        ),$ts

    ));

    return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
}

add_shortcode('textitalic','textItalic');

function textItalic($ts,$nd)
{
    return '<code>'.$nd.'</code>';
}
