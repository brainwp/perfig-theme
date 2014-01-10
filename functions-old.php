<?php

// Adiciona Minhas Opções
require_once (get_stylesheet_directory() . '/options/admin_options.php');


// Adiciona a função the_excerpt às Páginas
add_post_type_support( 'page', 'excerpt' );


// Adiciona um segundo menu ao tema
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
register_nav_menus(
	array(
		 'rodape' => __( 'Menu Rodape' ),
		 )
);
}


// Adiciona o thumbnail a página Clientes com 100px de altura e largura infinita
add_image_size( 'clientes-thumbnail', 100, 9999 );

// Adiciona o thumbnail ao Admin com 50px de altura e largura infinita
add_image_size( 'admin-thumbnail', 50, 9999 );


// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


// Personaliza o rodapé do admin
function custom_admin_footer() {
        echo 'Desenvolvido com <a href=http://wordpress.org/>WordPress</a> por <a href=http://www.etedesign.com.br>Eté Design e Tecnologia</a>.';
}
add_filter('admin_footer_text', 'custom_admin_footer');


// Remove o Item Editar do menu Aparência
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
 
add_action('_admin_menu', 'remove_editor_menu', 1);


// Mosra o Thumbnail anexado ao post no Admin
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);
 
function tcb_add_post_thumbnail_column($cols){
  $cols['tcb_post_thumb'] = __('Destaque');
  return $cols;
}
 
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
 
function tcb_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'tcb_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-thumbnail' );
      else
        echo 'Tema não suporta essa opção.';
      break;
  }
}

add_action( 'admin_menu', 'remove_meta_boxes' );
function remove_meta_boxes() {
    remove_meta_box( 'formatdiv', 'post', 'normal' ); // Post format meta box
}

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/images/logo-maior-vermelho.png) !important; }
		body { background-image:url('.get_bloginfo('stylesheet_directory').'/images/bg.jpg) !important; }
		.login #nav a, .login #backtoblog a { color: #b20000 !important;}
		.login form { background:#dadde0 !important; border: 1px solid #666 !important; -webkit-border-radius: 20px;
-moz-border-radius: 20px; border-radius: 20px; }
		input.button-primary, button.button-primary, a.button-primary { background: #666; border-color: #333; color: #FFFFFF; font-weight: bold; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3); } 
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


// Remove Widgets do Wp-Admin
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


// Desabilita o arrastamento de janelas
function disable_drag_metabox() {
    wp_deregister_script('postbox');
}
add_action( 'admin_init', 'disable_drag_metabox' );

// Remove menus do Wp-Admin
if (!current_user_can('manage_options')) {
	add_action( 'admin_menu', 'remove_links_menu' );
}
function remove_links_menu() {
     remove_menu_page('edit.php'); // Posts
     remove_menu_page('link-manager.php'); // Links
     remove_menu_page('edit-comments.php'); // Comments
     remove_menu_page('themes.php'); // Appearance
     remove_menu_page('plugins.php'); // Plugins
     // remove_menu_page('users.php'); // Users
     remove_menu_page('tools.php'); // Tools
     remove_menu_page('options-general.php'); // Settings
}

// Adiciona ao usuário Editor, link para edição de Menus
add_action('admin_menu', 'register_custom_menu_page');

function register_custom_menu_page() {
	$icone_menu = get_bloginfo('stylesheet_directory').'/images/menu_icone.png';
	add_menu_page('custom menu title', 'Editar Menus', 'editor', 'nav-menus.php', '', $icone_menu, 6);
}

// get the the role object
$role_object = get_role('editor');

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );

// Customiza a ordem do menu WP-ADMIN
function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;
       return array(
        'index.php', // this represents the dashboard link
		'edit.php?post_type=page', // this is the default page menu
    );
   }
   add_filter('custom_menu_order', 'custom_menu_order');
   add_filter('menu_order', 'custom_menu_order');


?>