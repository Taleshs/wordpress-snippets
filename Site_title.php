<?php

/**************************************************************************************/
// Title Otimizado para SEO
/**************************************************************************************/
add_filter( 'wp_title', 'site_titlee' );

function site_titlee( $title ) {
  global $page, $paged;
  if ( is_feed() )
	return $title;
  $site_description = get_bloginfo( 'description' );
  $filtered_title = $title . get_bloginfo( 'name' );
  $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
  $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

  return $filtered_title;
}
?>

<title><?php wp_title( '|', true, 'right' ); ?></title>
