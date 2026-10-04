<?php
/**
 * archive
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$image = get_field('blog_listing_hero_image', 'options');
$title = get_field('blog_title', 'options');

?>

<?php get_header(); ?>

<div class="page archive">
				<section class="tbd-hero simple" <?php if ($image){?> style="background: url(<?php echo $image;?>);"<?};?>>
        <div class="inner">
										<h1><?php the_archive_title(); ?></h1>
        </div>
    </section>
	<section class="blog-feed"  role="main">
		<div class="container">
				<?php if ( have_posts() ): ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="blog-card">
							<p><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></p>
							<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
							<p><?php
								$excerpt = apply_filters( 'the_content', get_the_content() );
								$excerpt = wp_strip_all_tags($excerpt);
								echo wp_trim_words( $excerpt, 90, '&hellip;');
							?></p>
							<a href="<?php esc_url( the_permalink() ); ?>" class="btn-cta">Continue Reading</a>
						</div>
					<?php endwhile; ?>
			</div>
		</section>
		<section class="pagination">
					<?php
					the_posts_pagination( array(
						'prev_text' => 'Previous',
						'next_text' => 'Next',
					) );
					?>
		</section>
	<?php endif; ?>
</div>
<?php get_footer(); ?>