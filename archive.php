<?php
/**
 * The template for displaying archive pages.
 *
 * @package musicblog
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<section class="feature-image feature-image-default-alt" data-type="background" data-speed="2">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'musicblog' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'musicblog' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'musicblog' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'musicblog' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'musicblog' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'musicblog' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'musicblog' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'musicblog' );

						else :
							_e( 'Archives', 'musicblog' );

						endif;
					?>
					
					<?php
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<small class="taxonomy-description">%s</small>', $term_description );
					endif;
				?>
				</h1>
			</section>

			<div class="container">
				<div id="primary" class="row">
					<main id="content" class="col-sm-8">

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




