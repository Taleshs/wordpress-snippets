<?php

/**************************************************************************************/
// Get Template Part com argumentos de query (functions)
/**************************************************************************************/
function _get_template_part($slug, $name = null, $play_args = array())
{
	if (isset($name) && $name !== 'none') $slug = "{$slug}-{$name}.php";
	else $slug = "{$slug}.php";
	$dir = get_stylesheet_directory();
	$file = "{$dir}/{$slug}";

	ob_start();
	$play_args = wp_parse_args($play_args);
	$slug = $dir = $name = null;
	require($file);
	echo ob_get_clean();
}

function get_template_partial($filename, $play_args = [])
{
	return _get_template_part($filename, null, $play_args);
}


//USO
_get_template_part('inc/sections/list-movies', null, [
	'taxonomy' => 'genero',
	'terms' => 'filmes',
	'posts_per_page' => -1,
	'SectionTitle' => 'Filmes'
]);


//ARGS Arquivo a parte
$argsPost = array(
	'post_type' => array('video'),
	'posts_per_page' => $play_args['posts_per_page'],
);
$argsPost['tax_query'][] = array(
	'taxonomy' => $play_args['taxonomy'],
	'terms'    => $play_args['terms'],
	'field'    => 'slug',
);
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$SectionTitle = $play_args['SectionTitle'];
$wp_query = new WP_Query($argsPost);
?>

<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<div class="wrapper">
			<h2><?php echo $SectionTitle; ?></h2>
		</div>

<?php endwhile;
endif;
wp_reset_postdata(); ?>
