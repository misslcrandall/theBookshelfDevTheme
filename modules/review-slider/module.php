<?php
// Layout: Review Slider
$moduleID = rand();

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-slider <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <div id="slider-<?php echo $moduleID; ?>" data-bs-ride="carousel">
                <?php
                    if( have_rows('book_reviews') ):
                        $count = 0;
                        while( have_rows('book_reviews') ) : the_row(); ?>
                            <div id="review<?php echo get_row_index(); ?>" class="slider-item <?php if (!$count) { echo 'active';}?>">
                                <div class="review"><?php the_sub_field('review'); ?></div>
                                <?php if(get_sub_field('reviewer_name') ){ ?>
                                    <p class="attribution">&mdash; <?php the_sub_field('reviewer_name'); ?></p>
                                <?php }?>
                            </div>
                        <?php // End loop.
                        $count++;
                        endwhile;
                    endif; ?>
                </div>
            </div>
    </div>
</div>

<script>
$(document).ready(function() {
  $('#slider-<?php echo $moduleID; ?>').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: <?php if(get_sub_field('autoscroll')): ?>true<?php else: ?>false<?php endif; ?>,
      autoplaySpeed: 3000,
      cssEase: 'linear',
      draggable: true,
      dots: true,
      arrows: true,
  });
});
</script>

</section>