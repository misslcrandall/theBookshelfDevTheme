<?php
/**
 * default for pages
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'modules/hero/module'); ?>
		<?php include 'modules/_modules.php'; ?>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>