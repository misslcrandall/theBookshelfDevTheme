<?php 
// Layout: Cards
include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-cards <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <div class="card-wrap">
            <?php if( have_rows('cards') ):
                while( have_rows('cards') ) : the_row(); 
                $link = get_sub_field('card_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    
                    <a class="card" href="<?php if ($link ): echo esc_url( $link_url ); endif; ?>"  target="<?php echo esc_attr( $link_target ); ?>" alt="<?php echo esc_html( $link_title ); ?>">
                        <h3 class="title"><?php echo the_sub_field('card_title');?></h3>
                        <?php echo the_sub_field('card');?>
                    </a>

                <?php else: ?>
                    <div class="card">
                        <h3 class="title"><?php echo the_sub_field('card_title');?></h3>
                        <?php echo the_sub_field('card');?>
                    </div>
                <?php endif;
                 endwhile;
            endif; ?>
        </div>
    </div>
</section>