<?php
/**
* カスタムメニューの登録
*/
add_theme_support( 'menus' );

/**
 * アイキャッチ画像の有効化
 */
add_theme_support('post-thumbnails');
/**
 * 画像サイズの登録
 */
add_image_size('member-thumb', 64, 64, true);
/**
 * カスタム投稿タイプ（新着情報）の登録
 */
register_post_type(
    'member',
    array(
        'labels' => array(
            'name' => '社員紹介',
            'add_new_item' => '社員の追加',
            'edit_item' => '社員の編集'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    )
    );