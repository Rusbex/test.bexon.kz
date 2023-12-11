<?php
// Создание типа поста "Недвижимость"
function create_property_post_type() {
    register_post_type('property',
        array(
            'labels' => array(
                'name' => __('Недвижимость'),
                'singular_name' => __('Объект недвижимости')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}
add_action('init', 'create_property_post_type');

// Создание таксономии "Тип недвижимости"
function create_property_taxonomy() {
    register_taxonomy(
        'property_type',
        'property',
        array(
            'label' => __('Тип недвижимости'),
            'hierarchical' => true,
            'rewrite' => array('slug' => 'property-type'),
        )
    );
}
add_action('init', 'create_property_taxonomy');

// Создание типа поста "Города"
function create_city_post_type() {
    register_post_type('city',
        array(
            'labels' => array(
                'name' => __('Города'),
                'singular_name' => __('Город')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_city_post_type');


// Добавление поля для связи с городом в типе поста "Недвижимость"
function add_city_relationship() {
    p2p_register_connection_type(array(
        'name' => 'property_to_city',
        'from' => 'property',
        'to' => 'city',
        'admin_box' => array(
            'show' => 'any',
            'context' => 'advanced',
        ),
    ));
}
add_action('init', 'add_city_relationship');


function display_connected_cities() {
    $connected_cities = get_posts(array(
        'connected_type' => 'property_to_city',
        'connected_items' => get_queried_object(),
        'nopaging' => true,
        'post_type' => 'city',
    ));

    if ($connected_cities) :
        echo '<h3>Города:</h3>';
        echo '<ul>';
        foreach ($connected_cities as $city) :
            echo '<li><a href="' . esc_url(get_permalink($city->ID)) . '">' . esc_html($city->post_title) . '</a></li>';
        endforeach;
        echo '</ul>';
    endif;
}

// AJAX для добавления объекта недвижимости
function add_property_ajax() {
    check_ajax_referer('add_property_nonce', 'property_nonce');

    // Получаем данные из формы
    $property_title = sanitize_text_field($_POST['property_title']);
    $property_description = sanitize_text_field($_POST['property_description']);
    $property_price = sanitize_text_field($_POST['property_price']);

    // Создаем новый объект недвижимости
    $property_id = wp_insert_post(array(
        'post_title' => $property_title,
        'post_content' => $property_description,
        'post_type' => 'property',
        'post_status' => 'publish',
    ));

    // Добавляем метаполя
    update_field('стоимость', $property_price, $property_id);

    die();
}

add_action('wp_ajax_add_property', 'add_property_ajax');
add_action('wp_ajax_nopriv_add_property', 'add_property_ajax');