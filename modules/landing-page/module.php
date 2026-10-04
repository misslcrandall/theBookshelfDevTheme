<?php 
// Layout: Hero

$simpleHeader = get_field('simple_header');

?>

<?php if ($simpleHeader != 1):?>
    <section class="hero">

        <div class="row">
            <div class="col-1/2">
                <div class="inner">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="col-1/2">
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="hero hero-slider">
        <div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php if( have_rows('hero_slides') ):
                    $count = 0;
                    while( have_rows('hero_slides') ) : the_row();
                    //Start Hero Slide
                    //Sets the slider background as either an image or a color.
                    $bkg_color = "background-color:" . get_sub_field('background_color');
                    $bkg_img = "background-image: url(" . get_sub_field('background_image') . ")";
                    $background = get_sub_field('background') === 'color' ? $bkg_color : $bkg_img;

                    //Selects Header Text

                    $slider_text = get_sub_field('slider_text');
                    $hero_eyebrow = $slider_text['header_subheading'];
                    $hero_title = $slider_text['header_heading'];
                    $hero_body = $slider_text['header_body'];

                    $header_font = $slider_text['header_font'];
                    $header_color = $slider_text['header_color'];
                    $image = get_sub_field('hero_image');
                    ?>
                    <div id="slide<?php echo get_row_index(); ?>" class="carousel-item <?php if (!$count) { echo 'active';}?>" style="<?php echo $background;?>;">
                        <div class="row">
                            <div class="col-1/2">
                                <div class="inner" style="color: <?php echo $header_color;?>;">
                                    <p class="eyebrow"><?php echo $hero_eyebrow; ?></p>
                                    <h1><?php echo $hero_title; ?></h1>
                                    <p><?php echo $hero_body; ?></p>
                                    <a class="button" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
                                </div>
                            </div>
                            <div class="col-1/2 book-cover">
                                <?php if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php // End loop.
                    $count++;
                    endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('.carousel-item').slick({
                arrows: true,
                dots: true
            });
        });
    </script>
<?php endif; ?>