<?php
//Intro Section
$sectionIntro = get_sub_field('intro_section');
$eyebrow = get_sub_field('eyebrow_text');
$header = get_sub_field('section_header');
$introCopy = get_sub_field('intro_copy');
$ctaButtons = get_sub_field('intro_button');
?>

<div class="intro-section">
    <div class="sub-header"><?php echo esc_html($eyebrow);?></div>
    <h2><?php echo $header; ?></h2>
    <?php if( !empty( $introCopy ) ): ?>
      <?php echo $introCopy; ?>
    <?php endif; ?>
    <?php if( have_rows('intro_button') ): ?>
        <div class="button-row">
        <?php while( have_rows('intro_button') ) : the_row(); ?>
            <a class="button" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
        <?php // End loop.
        endwhile; ?>
        </div>
    <?php endif; ?>
</div>