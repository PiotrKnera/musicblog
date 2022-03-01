<?php
/**
 * The template for displaying all single posts.
 *
 * @package musicblog
 */

get_header(); ?>

	<div class="container">
		<div class="row" id="primary">
				
			<main id="content" class="col-sm-8">

			<?php while ( have_posts() ) : the_post(); ?>
	
				<?php get_template_part( 'content', 'single' ); ?>
	
				<?php musicblog_post_nav(); ?>
	
				<?php

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
	
			<?php endwhile; ?>

			</main>
			
			<aside class="col-sm-4">
				<?php get_sidebar(); ?>
			</aside>
			
		</div>
	</div>

<?php get_footer(); ?>
