<?php
/**
 * single
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$sidebar = get_field('enable_blog_sidebar', 'options');

?>
<?php get_header(); ?>
<div class="page">
<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
			<div class="header">
				<div class="blog-header">
					<div class="inner">
						<p><time><?php the_date(); ?></time></p>
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
			<div class="blog <?php if($sidebar): echo 'has-sidebar'; endif;?>">
				<div class="post-wrap">
					<div class="">
						<article class="blog-post">
							<?php the_content(); ?>
						</article>
					</div>
				</div>
				<?php if($sidebar): ?>
					<div class="sidebar">
						<?php get_sidebar('blog'); ?>
					</div>
				<?php endif; ?>
				</div>
				<div class="blog-pagination">
							<?php
							// Previous/next post navigation.
							$next_label     = esc_html__( 'Next');
							$previous_label = esc_html__( 'Previous');

							the_post_navigation(
								array(
									'next_text' =>  $next_label,
									'prev_text' => $previous_label,
								)
							); ?>
							<?php previous_posts_link( 'Older posts' ); ?>
							<?php next_posts_link( 'Newer posts' ); ?>
					</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php get_template_part( 'modules/subscribe-cta/module'); ?>
</div>
<?php get_footer(); ?>