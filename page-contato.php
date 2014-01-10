<?php /* Template Name: Contato */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                    <div id="page">
                        <h1><?php the_title(); ?></h1>
                        <hr />
                        <?php the_content(); ?>
                    </div><!-- #page -->
                
                <?php endwhile; ?>
                
                    <div class="navigation">
                        <div class="next-posts"><?php next_posts_link(); ?></div>
                        <div class="prev-posts"><?php previous_posts_link(); ?></div>
                    </div>
                
                <?php else : ?>
                
                    <div id="page">
                        <h1>Não Encontrado!</h1>
                        <hr />
                    </div><!-- #page -->
                
                <?php endif; ?>
                
                <div id="editar"><?php edit_post_link('[Editar post]'); ?></div>
                
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
