<?php /* Template Name: Clientes */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
				
                <div id="clientes">
                <h1><?php the_title(); ?></h1>
                <hr />
				<?php $filhas = $post->ID; ?>
				<?php if ( query_posts('post_type=page&post_parent='.$filhas) )
				: while ( have_posts() ) : the_post(); ?>
                
                    <div class="clientes">
                    	<div id="thumb-cli">
							<?php the_post_thumbnail( 'clientes-thumbnail' ); ?>
                        </div><!-- #thumb-cli -->
                        
                        <div id="post-cli">
                        <h1><?php the_title(); ?></h1>
                        <hr class="hr-cli" />
                        <?php the_content(); ?>
                        </div><!-- #post-cli -->
                        
                    </div><!-- .clientes -->
                
                <?php endwhile; ?>
                
                <?php else : ?>
                
                    <div id="clientes">
                        <h1>Não Encontrado!</h1>
                        <hr class="hr-cli" />
                    </div><!-- #page -->
                
                <?php endif; ?>
                </div><!-- #clientes -->
                
                <div id="editar"><?php edit_post_link('[Editar post]'); ?></div>
                
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
