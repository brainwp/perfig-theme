<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<div id="slider-home">
            	<?php // Adiciona o Post HighLights /
				if (function_exists("insert_post_highlights")) insert_post_highlights(); ?>
            </div><!-- #slider-home -->
            <div id="sombra-slider-home">
            </div><!-- $sombra-slider-home -->
            
            <div id="caixas-home">
            
                <?php 
				$box01 = get_option ('mo_box01');
				$box02 = get_option ('mo_box02');
				$box03 = get_option ('mo_box03');
				?>

            	<div class="caixa-home-esq">

                <?php query_posts('pagename='.$box01.''); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
                
                </div><!-- .caixa-home-esq -->
                
                <div class="caixa-home">
                
                <?php query_posts('pagename='.$box02.''); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
                
                </div><!-- .caixa-home -->
                
                <div class="caixa-home-dir">
                
                <?php query_posts('pagename='.$box03.''); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
				<?php endwhile; endif; wp_reset_query(); ?>
                
                </div><!-- .caixa-home-dir -->
            
            </div><!-- #box-home -->
            
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>