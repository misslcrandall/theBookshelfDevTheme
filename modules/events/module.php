<?php 
// Layout: Event
include get_stylesheet_directory() . '/modules/_partials/module-settings.php';

$layout = get_sub_field('events_layout');
$mobileDirection = get_sub_field('mobile_position') === 'img-top' ? 'column-reverse' : 'column';

$eyebrow = get_sub_field('eyebrow_text');
$header = get_sub_field('section_header');
$introCopy = get_sub_field('intro_copy');

$ctaButton = get_sub_field('cta_link');
$image = get_sub_field('cta_image');

?>

<section class="tbd-events <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <?php if ($layout == 'cta'):?>
        <div class="inner cta<?php if( empty($image) ):?> centered<?php endif;  ?> <?php echo $mobileDirection ; ?>">
            <div class="content">
                <div class="sub-header"><?php echo $eyebrow;?></div>
                <h2><?php echo $header; ?></h2>
                <?php if( !empty( $introCopy ) ): ?>
                    <?php echo $introCopy; ?>
                <?php endif; ?>
                <?php if( have_rows('events') ) {
                    while( have_rows('events') ) : the_row(); ?>
                        <div class="event">
                            <div class="event-header" id="heading<?php echo get_row_index(); ?>">
                                <h3><?php the_sub_field('event_name'); ?> | <?php the_sub_field('event_city'); ?></h3>
                            </div>
                            <div class="event-details"><p><?php the_sub_field('event_date');?></p></div>
                        </div>
                    <?php endwhile;
                    } else { ?>
                    <h3>No Events Yet! Check Back Soon.</h3>
                <?php } ?>
                
                <?php if ($ctaButton): ?>
                    <a class="button" href="<?php $ctaButton ?>">See All Events</a>
                <?php endif; ?>
            </div>
            <?php if( !empty($image) ): ?>
                <div class="image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy"/>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
        <div class="inner">
            <div class="upcoming-events full">
                <?php if( have_rows('events') ) {
                    while( have_rows('events') ) : the_row(); ?>
                        <div class="event">
                            <div class="event-header" id="heading<?php echo get_row_index(); ?>">
                                <h3><?php the_sub_field('event_name'); ?> | <?php the_sub_field('event_city'); ?></h3>
                            </div>
                            <div class="event-details">
                                <p>
                                <?php
                                    the_sub_field('event_date');
                                    if( !empty( get_sub_field('event_time')) ):
                                        echo ', ';
                                        the_sub_field('event_time');
                                    endif;
                                ?>
                                </p>
                                <p><?php the_sub_field('event_address');?></p>
                            </div>
                            <div class="event-description"><p><?php the_sub_field('event_details'); ?></p></div>
                            <?php if(get_sub_field('event_link')){ ?>
                                    <a class="button" href="<?php the_sub_field('event_link');?>" target="_blank">Additional Details</a>
                            <?php }  ?>
                        </div>
                    <?php endwhile;
                    } else { ?>
                    <h2>No Events Yet! Check Back Soon.</h2>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php 
/*<?php
//Layout Subscribe CTA BLock

$text = get_sub_field('cta-text');
$subheader = $text['subheader'];
$header = $text['headline'];
$text = $text['body_text'];
?>

<div class="container cta events-cta">
    <div class="row">
        <div class="col-1/2">

        </div>
        <div class="col-1/2">
            <?php if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</div> */ ?>