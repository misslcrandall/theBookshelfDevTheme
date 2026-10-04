<?php
/**
 * archive
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */

$bookCover = get_field('book_cover');
?>
<?php get_header();

if ( have_posts() ):
	//is_tax() || is_category() || is_tag()
    $term = $wp_query->get_queried_object();?>

	<div class="page">
		<div class="container hero">
			<h1><?php single_term_title(); ?></h1>
			<div class="description"><?php echo term_description(); ?></div>
		</div>
		<section role="main">
			<div class="container">
				<div class="row">
					<?php
					$books = get_posts( array(
						'posts_per_page'   => -1,
						'post_type'        => 'books',
						'order'				=> 'ASC',
						'orderby'        => 'title',
						'tax_query' => array(
							array(
								'taxonomy' => $term->taxonomy,
								'field' => 'id',
								'terms' => $term->term_id
								)
							)
					) );
					foreach ($books as $post) :  setup_postdata($post); ?>
						<div class="card">
							<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
								<?php the_post_thumbnail();?>
								<div class="card-overlay">
									<h3><?php the_title(); ?></h3>
								</div>
							</a>
						</div>
					<?php endforeach; 
					wp_reset_postdata();?>
				</div>
				<div class="row archive-cta">
					<a class="button" href="/books" alt="Return to Books Page">View All Books</a>
				</div>
			</div>
		</section>
	</div>
	
<?php else: ?>
	<div class="page">
		<header id="hero">
			<div class="container hero">
				<h1><?php single_term_title(); ?></h1>
				<h2>Whoops! No Books Here!</h2>
			</div>
		</header>
		<div class="row archive-cta">
			<a class="button" href="/books" alt="Return to Books Page">View All Books</a>
		</div>
	</div>
<?php
endif; ?>

<?php get_footer(); ?>