<?php
/**
 * The template for displaying not found pages.
 *
 * @package musicblog
 */

get_header(); ?>

	<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2">
		<h1 class="page-title">Page can't be found.</h1>
	</section>

	<div class="container">
		
		<div id="primary" class="row">
				
			<main id="content" class="col-sm-8">
			
				<div class="error-404 not-found">
					
					<div class="page-content">
						
						<p>Perhaps you were looking for a specific...</p>
						
						<h3>Categories</h3>
						
						<div class="widget widget_categories">
							<h4 class="widget-title">Most Used Categories</h4>
							<ul>
								<?php
									wp_list_categories( array (
										
										'orderby'	=> 'count',
										'order'		=> 'DESC',
										'show_count'=> 1,
										'title_li'	=> '',
										'number'	=> 10
										
									) );
								?>
							</ul>
						</div>

						<h3>Archives</h3>
						<p>You can always sort through our archives...</p>
						<?php the_widget( 'WP_Widget_Archives', 'title=Our Archives', 'before_title=<h4 class="widgettitle">&after_title=</h4>' ); ?>
						
						<p>...or, just head back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a>.</p>
						
					</div>
					
				</div>
			
			</main>
			
			<aside class="col-sm-4">
				<?php get_sidebar(); ?>
			</aside>
				
		</div>
		
	</div>

<?php get_footer(); ?>
