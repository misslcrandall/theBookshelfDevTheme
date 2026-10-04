<?php
//Layout Alternating Content Module
$hasImage = get_sub_field('has_image');
$shrinkImage = get_sub_field('shrink_image');
$imageSide = get_sub_field('image_side') === 'img-right' ? 'row' : 'row-reverse';
$mobileDirection = get_sub_field('mobile_position') === 'img-top' ? 'column-reverse' : 'column';
$image = get_sub_field('cta_image');

$sectionIntro = get_sub_field('intro_section');
$eyebrow = get_sub_field('eyebrow_text');
$header = get_sub_field('section_header');
$introCopy = get_sub_field('intro_copy');
$ctaButtons = get_sub_field('intro_button');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-alternating-content <?php echo $moduleSettings; ?> <?php if( $hasImage == false):?>centered<?php endif; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <div class="inner <?php echo $imageSide; ?> <?php echo $mobileDirection;?> <?php if( empty($image) ):?> centered<?php endif;  ?> <?php if( $shrinkImage == true) :?>two-thirds<?php endif; ?>">
        <div class="content">
            <div class="sub-header"><?php echo $eyebrow;?></div>
            <h2><?php echo $header; ?></h2>
            <?php if( !empty( $introCopy ) ): ?>
                <?php echo $introCopy; ?>
            <?php endif; ?>
            <?php if( have_rows('intro_button') ): ?>
                <div class="button-row">
                <?php while( have_rows('intro_button') ) : the_row(); ?>
                    <a class="button"href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
                <?php // End loop.
                endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="media">
            <?php if( $hasImage == true) :?>
                <?php if( $image) :?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>