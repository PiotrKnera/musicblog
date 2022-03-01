<?php
/**
 * The main template file.
 *
 * @package musicblog
 */

get_header(); ?>

	<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2">
		<h1 class="page-title">Announcements</h1>
	</section>

	<div class="container">
		<div class="row" id="primary">
				
			<main id="content" class="col-sm-8" role="main">
			
			<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php musicblog_paging_nav(); ?>

			<?php else : ?>
	
				<?php get_template_part( 'content', 'none' ); ?>
	
			<?php endif; ?>
			
			</main>
		

			<aside class="col-sm-4">
			<?php get_sidebar(); ?>
			</aside>
		
		</div>
	</div>

<?php get_footer(); ?>
