<?php
// Layout: Accordion Module
$header = get_sub_field('section_header');
$video_header = get_sub_field('trailer_header');
$videolink = get_sub_field('video_link');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-accordion <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <div class="accordion-wrap" id="accordion">
            <?php if( have_rows('accordion_items') ):
                while( have_rows('accordion_items') ) : the_row(); ?>
                    <div class="item">
                        <div class="item-header">
                            <h3><?php the_sub_field('accordion_title');?></h3>
                            <?php get_template_part('/src/images/arrow.svg'); ?>
                        </div>
                        <div class="item-dropdown">
                           <?php the_sub_field('accordion_content');?>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<script>
    $( ".tbd-accordion .accordion-wrap .item" ).each(function(index) {
        var $this = $(this);
        var $header = $this.find(".item-header");
        var $dropdown = $this.find(".item-dropdown");

        $header.click(function() {
            $dropdown.toggle();
            $header.toggleClass('active');
        });
    });
</script>