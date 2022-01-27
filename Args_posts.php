<?php
    $argsPost = array(
        'post_type' => array('video'),
    );
    $term = get_queried_object();
    $argsPost['tax_query'][] = array(
        'taxonomy' => 'genero',
        'terms'    => $term->slug,
        'field'    => 'slug',
    );
    $wp_query = new WP_Query($argsPost);
?>
<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post(); ?>

<?php endwhile; endif;  wp_reset_postdata(); ?>
