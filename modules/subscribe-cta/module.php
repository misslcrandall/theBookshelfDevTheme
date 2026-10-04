<?php
//Layout Subscribe CTA BLock Module
$cta = get_field('cta_block_settings', 'options');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-subscribe-cta <?php echo $moduleSettings; ?>" <?php echo $moduleAnimation; ?> style="<?php echo $moduleBackground;?>">
    <div class="inner<?php if( empty($cta['subscribe-image']) ):?> form-right<?php endif;  ?>">
        <div class="content">
            <div class="sub-header"><?php echo $cta['subheader']; ?></div>
            <h2><?php echo $cta['headline']; ?></h2>
            <?php if( !empty( $cta['body_text'] ) ): ?>
                <p><?php echo $cta['body_text']; ?></p>
            <?php endif; ?>
            <?php if( !empty($cta['subscribe-image']) ): ?>
            <div class="form"><?php echo $cta['form']; ?></div>
            <?php endif; ?>
        </div>
        <?php if( !empty($cta['subscribe-image']) ):
            $image = $cta['subscribe-image']?>
            <div class="image">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy"/>
            </div>
        <?php else: ?>
            <div class="image">
                <div class="form"><?php echo $cta['form']; ?></div>
            </div>
        <?php endif; ?>
    </div>
</section>