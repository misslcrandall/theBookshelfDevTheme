<?php
/**
 * Template Name: Search Results Page
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ): ?>

	<div class="page">
		<header id="hero">
			<div class="container header">
				<div class="row">
					<div class="inner">
						<h1>Search Results</h1>
					</div>
				</div>
			</div>
		</header>
		<section role="main">
		<?php while ( have_posts() ) : the_post(); ?>
		
		
			<div class="container">
				<div class="row">
					<div class="search-result">
						<p class="category"><?php the_category();?></p>
						<h2><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></p>
						<p><?php
							$excerpt = apply_filters( 'the_content', get_the_content() );
							$excerpt = wp_strip_all_tags($excerpt);
							echo wp_trim_words( $excerpt, 40, '&hellip;');
						?></p>
						<a href="<?php esc_url( the_permalink() ); ?>" class="btn-cta">Continue Reading</a>
					</div>
				</div>
			</div>
		
		
		<?php endwhile; ?>
		</section>
		<section>
			<div class="wrap">	
				<div class="container">
					<div class="row">		
						<div class="pagination">
							<?php
								$image_path = get_template_directory_uri();
								
								the_posts_pagination( array(
									'mid_size'  => 2,
									'prev_text' => __( 'Back', 'textdomain' ),
									'next_text' => __( 'Onward', 'textdomain' ),
								) );
							?>		
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
	
<?php endif; ?>
<?php get_template_part( 'template-parts/blocks/subscribe', 'subscribe' ); ?>
<?php get_footer(); ?>