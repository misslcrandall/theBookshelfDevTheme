<?php 
// Layout: Text CTA
include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-cta-block <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?> <?php if  ($backgroundType == 'image'): ?>    background: linear-gradient(180deg, #111111 0%, rgba(19, 21, 35, 0.541667) 40%, rgba(34, 34, 34, 0) 100%), url('<?php  echo $backgroundImage ;?>');<?php endif; ?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner">
        <div class="text">
            <h2><?php the_sub_field('review_cta'); ?></h2>
            <p><?php the_sub_field('cta_intro'); ?></p>
        </div>
        <div class="button">
            <?php if(get_sub_field('button_url')): ?>
                <a class="button" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
            <?php endif; ?>
        </div>
    </div>
</section>