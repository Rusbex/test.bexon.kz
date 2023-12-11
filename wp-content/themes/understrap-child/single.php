<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php
                // Вывод метаполей с использованием ACF
                $area = get_field('площадь');
                $cost = get_field('стоимость');
                $address = get_field('адрес');
                $living_area = get_field('жилая_площадь');
                $floor = get_field('этаж');

                // Вывод на странице
                echo '<p>Площадь: ' . esc_html($area) . '</p>';
                echo '<p>Стоимость: ' . esc_html($cost) . '</p>';
                echo '<p>Адрес: ' . esc_html($address) . '</p>';
                echo '<p>Жилая площадь: ' . esc_html($living_area) . '</p>';
                echo '<p>Этаж: ' . esc_html($floor) . '</p>';

                // Вывод связанных городов
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
                ?>
                
                <?php the_content(); ?>
            </div>
        </article>

    <?php }
}

get_footer();
?>
