<?php
//Single Book Page
get_header();
?>

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="page">
					<?php get_template_part( 'modules/hero/module'); ?>
					<?php include 'modules/_modules.php';
				if( get_field('show_subscribe_cta') ){
					include 'template-parts/blocks/subscribe.php';
				}
			?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>