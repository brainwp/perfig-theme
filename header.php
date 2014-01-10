<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/everaldo.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<!-- Modal anything slider -->

<script type="text/javascript">
var $a = jQuery.noConflict()
$a(document).ready(function() {	

	$a('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $a(this).attr('href');
		var maskHeight = $a(document).height();
		var maskWidth = $a(window).width();
	
		$a('#mask').css({'width':maskWidth,'height':maskHeight});
		$a('#mask').fadeIn(50);	
		$a('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $a(window).height();
		var winW = $a(window).width();
              
		$a(id).css('top',  winH/2.5-$a(id).height()/2.5);
		$a(id).css('left', winW/2-$a(id).width()/2);
		$a(id).fadeIn(500); 
	
	});
	
	$a('.window .close').click(function (e) {
		e.preventDefault();
		
		$a('#mask').hide();
		$a('.window').hide();
	});		
	
	$a('#mask').click(function () {
		$a(this).hide();
		$a('.window').hide();
	});			
	
});

</script>
<!-- Fecha Modal -->	

</head>

<body <?php body_class(); ?>>

<div id="mask"></div>  <!-- M�scara para cobrir a tela -->


 <!-- Janela Modal com caixa de di�logo -->  
 
<div id="dialog1" class="window">
<a class="close"></a>
	<div id="login-box">
	<h2>&Aacute;rea do Cliente</h2>
		<div id="login-email">USU&Aacute;RIO <input class="login-email" name="txtEmail" id="txtEmail" type="text"></div> 
		<div id="login-senha">SENHA <input class="login-senha" name="txtSenha" id="txtSenha" type="password"></div>
		<div id="login-entrar"><input type="image" name="imageField" id="imageField" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/entrar-cliente.png"></div>
		<div id="login-info"><a href="">Recuperar Senha?</a></div>
	</div><!-- #login-box -->
</div><!-- #dialog1 -->

<!-- Fim Janela Modal com caixa de di�logo --> 

<div id="cabecalho"></div>

<div id="wrapper" class="hfeed">
	<div id="header">
    
    		<div id="logo">
            <a href="<?php bloginfo('url'); ?>" class="a-logo"></a>
            </div>
            
			<div id="access" role="navigation">
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
            
            <div id="botao-cliente">
            <a href="#dialog1" name="modal" class="a-botao-cliente"></a>
            </div><!-- #botao-cliente -->
            
	</div><!-- #header -->

	<div id="main">
