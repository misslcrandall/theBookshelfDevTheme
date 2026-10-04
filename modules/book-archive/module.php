<?php 
// Layout: Book Archives

if ( have_posts() ): ?>

	<div class="page">
		<div class="container hero">
			<h1><?php the_field('header', 3584); ?></h1>
			<p><?php the_field('subheading', 3584); ?></p>
		</div>
		<div role="main">
			<div class="container">
				<section class="book-cards">
					<?php

					$allbooks = get_posts( array(
						'posts_per_page'   => -1,
						'post_type'        => 'books',
						'order'				=> 'ASC',
						'orderby'        => 'title',
					) );

 
					$terms = get_terms(
						array(
								'taxonomy'   => 'subjects',
								'hide_empty' => true,
								'order'         => 'DESC'
							)
						);
					?>
					<div class="controls">
						<fieldset data-filter-group>
							<button type="reset" class="control" data-filter="all">All Books</button>
							<?php foreach ($terms as $term) {echo '<button  class="control" type="button" data-filter=.'.sanitize_title($term->slug).'>'.$term->name.'</button>';} ?>
						</fieldset>						
					</div>
					<div class="book-container container" id="book-container">
						<?php foreach ($allbooks as $post) :  setup_postdata($post);
							$terms = get_the_terms( $post->ID , 'subjects' ); ?>
							<div class="card mix <?php if ( $terms != null ){foreach( $terms as $term ) {print $term->slug." ";unset($term);} } ?>">
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
					
                </section>
				<section class="book-list">
					<h2>All Books</h2>
					<h3>Novels</h3>
					<div>
						<?php
						$allbooks = get_posts( array(
							'posts_per_page'   => -1,
							'post_type'        => 'books',
							'order'				=> 'ASC',
							'orderby'        => 'title',
						) );
						foreach ($allbooks as $post) :  setup_postdata($post); ?>
							<p><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
						<?php endforeach; 
						wp_reset_postdata();?>
					</div>
					<?php if( have_rows('collection_repeater', 3584) ): ?>
						<h3>Collections and Anthologies</h3>
						<div>
							<?php
							while( have_rows('collection_repeater', 3584) ): the_row(); ?>
							<?php if( get_sub_field('collection_link') ){ ?>
								<p><a href="<?php the_sub_field('collection_link'); ?>"><?php the_sub_field('collection_title'); ?></a></p>
							<?php } else { ?>
								<p><?php the_sub_field('collection_title'); ?></p>
							<?php } endwhile;?>
						</div>
					<?php endif; ?>
					<?php if( have_rows('additional_books', 3584) ): ?>
						<h3>Out of Print Books</h3>
						<div>
							<?php
							while( have_rows('additional_books', 3584) ): the_row(); ?>
							<?php if( get_sub_field('book_link') ){ ?>
								<p><a href="<?php the_sub_field('book_link'); ?>"><?php the_sub_field('book_title'); ?></a></p>
							<?php } else { ?>
								<p><?php the_sub_field('book_title'); ?></p>
							<?php } endwhile;?>
						</div>
					<?php endif; ?>
                </section>
			</div>
        </div>
	</div>

<?php endif; ?>


<?php  // Simple Book Archive
/*if ( have_posts() ): ?>
	<div class="page">
			<section class="tbd-hero simple">
				<div class="inner">
								<h1>Books</h1>
				</div>
   </section>
		<section role="main">
		<?php
			$allbooks = get_posts( array(
				'posts_per_page'   => -1,
				'post_type'        => 'books',
				'order'				=> 'ASC',
				'orderby'        => 'title',
			) );


			$terms = get_terms(
				array(
						'taxonomy'   => 'subjects',
						'hide_empty' => true,
						'order'         => 'DESC'
					)
				);
			?>
			<div class="book-container container" id="book-container">
					<?php foreach ($allbooks as $post) :  setup_postdata($post);
						$terms = get_the_terms( $post->ID , 'subjects' ); ?>

						<section class="tbd-alternating-content">
										<div class="inner left">
														<div class="content">
																		<div class="sub-header"><?php if ( $terms != null ){foreach( $terms as $term ) {print $term->slug." ";unset($term);} } ?></div>
																		<h2><?php the_title(); ?></h2>
																		<a class="button" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">See Details</a>
														</div>
														<div class="media">
																<?php the_post_thumbnail();?>
														</div>
										</div>
						</section>
					<?php endforeach;
					wp_reset_postdata();?>
				</div>
		</section>
	</div>
<?php endif;  */ ?>