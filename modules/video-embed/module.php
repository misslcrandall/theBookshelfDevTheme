<?php
// Layout: Video Embed
$videoHeader = get_sub_field('video_header');
$videoLink = get_sub_field('video_link');
$videoFullwidth = get_sub_field('fullwidth_video');

include get_stylesheet_directory() . '/modules/_partials/module-settings.php';
?>

<section class="tbd-video-embed <?php echo $moduleSettings; ?>" style="<?php echo $moduleBackground;?>">
    <?php include get_stylesheet_directory() . '/modules/_partials/intro-section.php';?>
    <div class="inner  <?php if ( $videoFullwidth ){ echo 'fullwidth'; } ?>">
        <h3><?php echo $videoHeader; ?></h3>
        <div class="video-container">
            <?php echo $videoLink ; ?>
        </div>
    </div>
</section>