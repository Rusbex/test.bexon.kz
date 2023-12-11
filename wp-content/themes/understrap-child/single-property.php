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
                    <div class="col-md-6">
                        <?php
                        // Вывод метаполей объекта недвижимости
                        $area = get_field('площадь');
                        $cost = get_field('стоимость');
                        $address = get_field('адрес');
                        $living_area = get_field('жилая_площадь');
                        $floor = get_field('этаж');
                        ?>

                        <dl class="row">
                            <dt class="col-sm-4">Площадь:</dt>
                            <dd class="col-sm-8"><?php echo esc_html($area); ?></dd>

                            <dt class="col-sm-4">Стоимость:</dt>
                            <dd class="col-sm-8"><?php echo esc_html($cost); ?></dd>

                            <dt class="col-sm-4">Адрес:</dt>
                            <dd class="col-sm-8"><?php echo esc_html($address); ?></dd>

                            <dt class="col-sm-4">Жилая площадь:</dt>
                            <dd class="col-sm-8"><?php echo esc_html($living_area); ?></dd>

                            <dt class="col-sm-4">Этаж:</dt>
                            <dd class="col-sm-8"><?php echo esc_html($floor); ?></dd>
                        </dl>
                    </div>

                    <div class="col-md-6">
                        <!-- Дополнительные блоки или изображения, если необходимо -->
                    </div>
                </div>
            </div>

            <div class="entry-content mt-4">
                <?php the_content(); ?>
            </div>
        </article>

    <?php }
}

get_footer();
?>
