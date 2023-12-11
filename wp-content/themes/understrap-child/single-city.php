<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-0">
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <?php
                        // Вывод связанных объектов недвижимости
                        $connected_properties = new WP_Query(array(
                            'connected_type' => 'property_to_city',
                            'connected_items' => get_queried_object(),
                            'nopaging' => true,
                            'post_type' => 'property',
                        ));

                        if ($connected_properties->have_posts()) :
                            echo '<h2 class="mb-4">Связанные объекты недвижимости:</h2>';
                            echo '<ul class="list-group list-group-flush">';
                            while ($connected_properties->have_posts()) : $connected_properties->the_post();
                                echo '<li class="list-group-item"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
                            endwhile;
                            echo '</ul>';
                        endif;

                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </article>

    <?php }
}

get_footer();
?>
