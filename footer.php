
	</div><!-- #main -->

	</div><!-- #wrapper -->

	<div id="clear"></div>
    
<div id="footer-sup">
<div id="wrapper-footer-sup">

	<div id="menu-footer-e">
		<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'rodape' ) ); ?>    
    </div><!-- #menu-footer-e -->
    
    <div id="menu-footer-d">
		<a class="a-face" href="<?php echo get_option ('mo_face'); ?>" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/fb.png" /></a>    
    </div><!-- #menu-footer-d -->

</div><!-- #wrapper-footer-sup -->
</div><!-- #footer-sup -->

<div id="footer" role="contentinfo">

   <div id="wrapper-foo">
 
    	<div id="logo-foo"><a href="<?php bloginfo('url'); ?>" class="a-logo-foo"></a></div>
        <div id="endereco-foo"><p><?php echo get_option ('mo_endereco'); ?> - <?php echo get_option ('mo_bairro'); ?> - <?php echo get_option ('mo_cidade'); ?></p></div>
        <div id="contato-foo"><p><?php echo get_option ('mo_telefone'); ?> - <?php echo get_option ('mo_email'); ?></p></div>
        
	</div><!-- #wrapper-foo -->

   </div><!-- #footer -->
   
<?php /* Essa função serve para os hook's direcionados ao footer. Por exemplo o admin-bar. */
wp_footer(); ?>

</body>
</html>