<?php
//Module Setting Fields
$topMargin = get_field('top_margin');
$bottomMargin = get_field('bottom_margin');
$topPadding = get_field('top_padding');
$bottomPadding = get_field('bottom_padding');
$disableAnimation = get_field('disable_animation');

//Module Background Settings
$backgroundType = get_field('background');
$backgroundColor = get_field('background_color');
$backgroundImage = get_field('background_image');

if ($backgroundType == 'color'){
 $background = 'background:'. $backgroundColor .';';
} elseif ($backgroundType == 'image'){
 $background = 'background: url('. $backgroundImage . ');';
} else{
 $background = null;
};

$moduleSettings = $topMargin.' '.$bottomMargin.' '.$topPadding.' '.$bottomPadding.' '.$disableAnimation;

$moduleBackground = $background;

// Layout: Hero
$simpleHeader = get_field('simple_header');
$hero_modules = get_field('hero_modules');

//Selects Header Text                
$hero_text = get_field('hero_text');
$hero_eyebrow = $hero_text['header_eyebrow'];
$hero_title = $hero_text['header_heading'];
$hero_body = $hero_text['header_body'];
$hero_image = get_field('hero_image');
$include_image = $hero_image['include_image'];
$image = $hero_image['image'];

?>
<?php if ($simpleHeader != 1):?>
    <section class="tbd-hero simple <?php echo $moduleSettings; ?>" style="<?php echo $moduleBackground; ?>">
        <div class="inner">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
<?php else: ?>
    <div class="hero-background-wrap" style="<?php echo $moduleBackground; ?>">
        <section class="tbd-hero">
            <div class="inner hero-inner <?php if( $include_image == 0 ): echo 'centered'; endif; ?>">
                <div class="content">
                    <p class="eyebrow"><?php echo $hero_eyebrow; ?></p>
                    <h1><?php echo $hero_title; ?></h1>
                    <p class="subheading"><?php echo $hero_body; ?></p>
                    <?php if( have_rows('hero_buttons') ): ?>
                        <div class="button-row">
                            <?php while ( have_rows('hero_buttons') ) : the_row(); ?>
                                <a class="button" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if( !empty( $include_image ) ): ?>
                    <div class="book-cover">
                        <?php if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php if(get_field('add_module_below')):
            if( have_rows('hero_modules') ): ?>
                <div class="bottom-wrap">
                <? while ( have_rows('hero_modules') ) : the_row();
                    $layout = get_row_layout();
                    
                    switch($layout):
                        case 'cards':
                            get_template_part( 'modules/cards/module', 'module' );
                            break;
                        case 'intro_section':
                            get_template_part( 'modules/partials/intro-section', 'intro-section' );
                            break;
                        case 'reviews':
                            get_template_part( 'modules/reviews/module', 'module' );
                            break;
                        case 'video_embed':
                            get_template_part( 'modules/video-embed/module', 'module' );
                            break;				
                    endswitch;
                endwhile; ?>
                </div>
            <?php endif;
        endif;?>
    </div>
<?php endif; ?>