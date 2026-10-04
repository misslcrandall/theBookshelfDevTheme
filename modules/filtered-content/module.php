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