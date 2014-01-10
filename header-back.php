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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeIn(50);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2.5-$(id).height()/2.5);
		$(id).css('left', winW/2-$(id).width()/2);
		$(id).fadeIn(500); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>
<!-- Fecha Modal -->	
		
</head>

<body <?php body_class(); ?>>

<!-- Janela Modal com caixa de diálogo -->  
<div id="mask"></div>
<div id="dialog1" class="window">
<a class="close"></a>
<!-- Janela Modal com caixa de diálogo -->  

<div id="logo-box"></div>
	<div id="login-box">
		<div id="login-email">EMAIL <input class="login-email" name="txtEmail" id="txtEmail" type="text"></div> 
		<div id="login-senha">SENHA <input class="login-senha" name="txtSenha" id="txtSenha" type="password"></div>
		<div id="login-info"><a href="">esqueceu sua senha? </a></div>

		<div id="login-entrar"><input type="image" name="imageField" id="imageField" src="imagens/botao-entrar.jpg"></div>
	</div>
</div>

<!-- Fim Janela Modal com caixa de diálogo -->  


<div id="cabecalho"></div>

<div id="wrapper" class="hfeed">
	<div id="header">
    
    		<div id="logo">
            <a href="<?php bloginfo( 'url' ); ?>" class="a-logo"></a>
            </div>
    
			<div id="access" role="navigation">
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
            
            <div id="botao-cliente">
            <a href="#dialog1" name="modal" class="a-botao-cliente"></a>
            </div><!-- #botao-cliente -->
            
	</div><!-- #header -->

	<div id="main">
