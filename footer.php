<?php
/**
 * The template for displaying the footer.
 *
 * @package musicblog
 */
?>

<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(strpos($actual_link, 'hall-of-fame') !== false){

	}else{
		echo ' 
		<section id="signup" data-type="background" data-speed="4">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h2>Will you recognize these artists?<br> <strong>They also used this portal</strong>!</h2>
						<p><a href="hall-of-fame" class="btn btn-lg btn-block btn-success">Check it out!</a></p>
					</div>
				</div>
			</div>
		</section>';
	}
 ?>
	
<footer>
	<div class="container">
		<div class="col-sm-3">
			<p><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo.png" alt="musicsh0p"></a></p>
		</div>
		<div class="col-sm-6">
			<?php
				wp_nav_menu( array(
					
					'theme_location'	=> 'footer',
					'container'			=> 'nav',
					'menu_class'		=> 'list-unstyled list-inline'
					
				) );
			?>
		</div>
		<div class="col-sm-3">
			<p class="pull-right"><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> <?php the_author_link(); ?></p>
		</div>
	</div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-2.1.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

<!-- TypeKit Fonts -->
<script src="//use.typekit.net/gla7wnd.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_footer(); ?>
</body>
</html>
