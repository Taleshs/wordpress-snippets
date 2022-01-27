<?php
    //Loop
    if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <?php endwhile; else : ?>
        <p><?php esc_html_e( '' ); ?></p>
    <?php endif; ?>
