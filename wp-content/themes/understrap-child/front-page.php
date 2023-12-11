<?php
get_header();

// Добавляем стили Bootstrap
function enqueue_bootstrap_styles() {
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2');
}

add_action('wp_enqueue_scripts', 'enqueue_bootstrap_styles');

// Вывод последних объектов недвижимости
$recent_properties = new WP_Query(array(
    'post_type' => 'property',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
));

if ($recent_properties->have_posts()) :
    echo '<section class="container mt-5">';
    echo '<h2 class="mb-4">Последние объекты недвижимости</h2>';
    echo '<ul class="list-group">';
    
    while ($recent_properties->have_posts()) : $recent_properties->the_post();
        echo '<li class="list-group-item">';
        if (has_post_thumbnail()) {
            echo '<div class="row align-items-center">';
            echo '<div class="col-md-4">';
            the_post_thumbnail('thumbnail', ['class' => 'img-fluid rounded']);
            echo '</div>';
            echo '<div class="col-md-8">';
        }
        echo '<h4><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h4>';
        if (has_post_thumbnail()) {
            echo '</div>';
            echo '</div>';
        }
        echo '</li>';
    endwhile;

    echo '</ul>';
    echo '</section>';
endif;

wp_reset_postdata();

// Вывод последних городов
$recent_cities = new WP_Query(array(
    'post_type' => 'city',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
));

if ($recent_cities->have_posts()) :
    echo '<section class="container mt-5">';
    echo '<h2 class="mb-4">Последние города</h2>';
    echo '<ul class="list-group">';
    
    while ($recent_cities->have_posts()) : $recent_cities->the_post();
        echo '<li class="list-group-item">';
        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail', ['class' => 'img-fluid rounded']);
        }
        echo '<h4><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h4>';
        echo '</li>';
    endwhile;
    echo '</ul>';
    echo '</section>';
endif;

wp_reset_postdata();
?>

<section id="add-property-form" class="bg-light p-5">
    <div class="container">
        <h2 class="mb-4">Добавить объект недвижимости</h2>
        <form id="property-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="property_title">Название объекта</label>
                    <input type="text" class="form-control" name="property_title" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="property_description">Описание объекта</label>
                    <input type="text" class="form-control" name="property_description" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="property_price">Стоимость</label>
                    <input type="number" class="form-control" name="property_price" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="property_area">Площадь</label>
                    <input type="number" class="form-control" name="property_area" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="property_living_area">Жилая площадь</label>
                    <input type="number" class="form-control" name="property_living_area" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="property_address">Адрес</label>
                    <input type="text" class="form-control" name="property_address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="property_floor">Этаж</label>
                    <input type="number" class="form-control" name="property_floor" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
            <?php wp_nonce_field('add_property_nonce', 'property_nonce'); ?>
            <input type="hidden" name="action" value="add_property">
        </form>
    </div>
</section>

<script>
    // AJAX для формы добавления объекта недвижимости
    jQuery(document).ready(function($) {
        $('#property-form').submit(function() {
            var propertyForm = $(this);

            $.ajax({
                type: propertyForm.attr('method'),
                url: propertyForm.attr('action'),
                data: propertyForm.serialize(),
                success: function(response) {
                    // Обработка успешного ответа
                    alert('Объект недвижимости добавлен!');
                    // Дополнительные действия (перезагрузка страницы и т. д.)
                }
            });

            return false;
        });
    });
</script>

<?php wp_footer(); ?>
</body>
</html>
