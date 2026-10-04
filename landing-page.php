<?php
/**
* Template Name: Landing Page
**/

//Hero Settings
$backgroundImage = get_field('hero_image');
$imageSettings = get_field('image_settings');
$textColor = $imageSettings['text_color'];
$enableOverlay = $imageSettings['enable_overlay'];
$overlayColor = $imageSettings['overlay_color'];

//Intro Text
$intro = get_field('intro');
$header = $intro['header'];
$intro_text = $intro['intro_text'];

//Form Section
$form = get_field('form');
$form_header = $form['form_header'];
$form_type = $form['form_type'];
$embed_code = $form['embed_code'];

$formPosition = get_field('form_position');
$footer = get_field('footer_text');
?>

<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="hero" aria-hidden="true" style="
            <?php if($enableOverlay){
                if($backgroundImage){
                    echo "background: linear-gradient(". $overlayColor . "," . $overlayColor . "), url('" . $backgroundImage . "');";
                } else {
                    echo "background:" . $overlayColor . ";";
                }
            } else {
                if($backgroundImage){ echo "background-image:url('" . $backgroundImage . "');";}
            }?>
            ">
                <nav id="main_menu">
                    <div class="logo">
                    <?php echo get_custom_logo( $blog_id ); ?>
                    </div>
                </nav>
                <div class="hero-inner<?php echo ' form-' . $formPosition . ' ' . $textColor . '-text';?>">
                    <div class="intro">
                        <h1><?php echo $header; ?></h1>
                        <p><?php echo $intro_text; ?></p>
                    </div>
                    <div class="right-col">
                        <?php if (get_field('show_share_buttons')){?>
                            <div class="share social-menu">
                                <h3>Share:</h3>
                                <?php get_template_part( 'modules/_partials/social-share'); ?>
                            </div>
                        <?php } ?>
                        <div class="form" id="form">
                            <h2><?php echo $form_header; ?></h2>
                            <div class="form-wrap">
                                <?php if($form_type === 'embed_code'){
                                    echo $embed_code;
                                } else {
                                    echo do_shortcode($embed_code);
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="page">
            <?php include 'modules/_modules.php'; ?>
            <?php if (get_field('bottom_cta')){?>
                <section class="anchor-cta">
                    <a href="#form" class="button"><?php echo the_field('cta_text');?></a>
                </section>
            <?php } ?>
        </div>
        
		<footer>
            <div class="footer-content">
                <?php if (get_field('show_share_buttons')){?>
                    <div class="share social-menu">
                        <h3>Share:</h3>
                        <?php get_template_part( 'modules/_partials/social-share'); ?>
                    </div>
                <?php } ?>
                <p class="copyright">&copy; <?php echo date("Y"); ?> Torsha J Baker</p>
                <?php if ($footer){echo '<p>'.$footer.'</p>'; }?>
            </div>
        </footer>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>