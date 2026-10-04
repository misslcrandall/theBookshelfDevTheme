<?php 
// Layout: Posts

$bkg_color = "background-color:" . get_sub_field('background_color');
$bkg_img = "background-image: url(" . get_sub_field('background_image') . ")";
$background = get_sub_field('background') === 'color' ? $bkg_color : $bkg_img;

//Intro Section
$sectionIntro = get_sub_field('intro_section');
$eyebrow = get_sub_field('eyebrow_text');
$header = get_sub_field('section_header');
$introCopy = get_sub_field('intro_copy');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

 <section class="tbd-recent-posts <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <div class="intro-section">
        <div class="sub-header"><?php echo $eyebrow;?></div>
        <h2><?php echo $header; ?></h2>
        <?php if( !empty( $introCopy ) ): ?><?php echo $introCopy; ?><?php endif; ?>
    </div>
    <div class="inner">
        <div class="posts">
            <?php
            $recentPosts = get_posts( array(
                 'posts_per_page' => 3,
                 'orderby'        => 'DESC'
            ) );
            foreach ($recentPosts as $post) :  setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="card">
                        <div>
                            <p class="post-date"><?php the_date(); ?></p>
                            <h3><?php the_title(); ?></h3> 
                        </div>
                        <p class="post-excerpt"><?php echo wp_trim_words(get_the_content(), 35) ?></p>
                        <p class="read-more">Read More</p>
                    </div>
                </a>
            <?php endforeach; 
            wp_reset_postdata();?>
        </div>
        <a class="button" href="/news" class="btn-cta"><?php the_sub_field('button_cta');?></a>
    </div>
 </section>