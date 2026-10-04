<?php
/**
* Template Name: Landing Page - Links
**/

//Intro Section
$eyebrow = get_field('eyebrow_text');
$header = get_field('section_header');
$introCopy = get_field('intro_copy');
$ctaButtons = get_sub_field('intro_button');

//Buttons
$button

?>

<?php get_header(); ?>

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="page">
            <section class="tbd-hero simple">
                <div class="inner">
                    <h1><?php echo $header; ?></h1>
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
            </section>
            <section class="linktree">
            <?php if( have_rows('buttons') ): ?>
                <?php while( have_rows('buttons') ) : the_row(); ?>
                    <a class="button" target="_blank" rel="noopener noreferrer" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_text')?></a>
                <?php // End loop.
                endwhile; ?>
            <?php endif; ?>
            </section>
            <?php if (get_field('include_cta')){
                get_template_part( 'modules/subscribe-cta/module', 'module' );
            } ?>
        </div>
        

	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>