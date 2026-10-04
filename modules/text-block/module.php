<?php 
// Layout: Synopsis Block
$text = get_sub_field('textarea');
$buttons = get_field('cta_buttons');
$shrinkText = get_sub_field('shrink_text_area');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-text-block <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <div <?php if( $shrinkText){ echo 'class="small"';}?>>
            <?php echo $text; ?>
            <div class="button-row">
                <?php if( have_rows('cta_buttons') ):
                    while( have_rows('cta_buttons') ) : the_row();?>
                        <a class="button" href="<?php the_sub_field('button_url'); ?>" target="_blank"><?php the_sub_field('button_text'); ?></a>
                    <?php endwhile;
                endif; ?> 
            </div>
        </div>
    </div>
</section>