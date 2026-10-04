<?php
//Layout: Series Books
$related_books = get_sub_field('select_books');
?>
<section class="tbd-related-books series <?php if(get_sub_field('show_image')){ echo 'image';}?> <?php echo $moduleSettings; ?>"  <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>"  <?php echo $moduleAnimation; ?> >
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <?php
        //If have image, show two-column layout
        if(get_sub_field('show_image')){
            $image = get_sub_field('image'); ?>
            <div class="col-1/2 image">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>
            <div class="col-1/2 content">
                <div class="book-slider">
                <?php
                    $featured_posts = get_sub_field('select_books');
                    if( $featured_posts ):
                        foreach( $featured_posts as $post ):
                            setup_postdata($post); ?>
                            <div class="book-slider-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                    <h4><?php the_title(); ?></h4>
                                </a>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php } 
        //Else show full-width layout
        else{ ?>
            <div class="book-slider">
            <?php
                $featured_posts = get_sub_field('select_books');
                if( $featured_posts ):
                    foreach( $featured_posts as $post ):
                        setup_postdata($post); ?>
                        <div class="book-slider-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full'); ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
</section>