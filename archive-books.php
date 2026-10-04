<?php
/**
 * archive
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */


$bookCover = get_field('book_cover');
?>
<?php get_header(); ?>

<?php get_template_part( 'modules/hero/module'); ?>
<?php get_template_part( 'modules/book-archive/module'); ?>
<?php get_template_part( 'modules/subscribe-cta/module'); ?>

<?php get_footer(); ?>