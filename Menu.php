<?php
/**************************************************************************************/
// Menus personalizados
/**************************************************************************************/
register_nav_menus( array(
	'menu_principal' => 'Menu Principal',
	'menu_rodape' => 'Menu Rodapé',
) );

//USO
<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu_principal',
						'container' => false,
					)
				);
            ?>
