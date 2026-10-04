<?php
/**
 * Theme header
 * @link https://developer.wordpress.org/themes/basics/template-files/
 */
?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<?php wp_head(); ?>
	<?php $headerScripts = get_field('header_scripts', 'options'); echo $headerScripts; ?>
</head>

<body <?php body_class(); ?>>
<?php $bodyScripts = get_field('body_scripts', 'options'); echo $bodyScripts; ?>
<div class="page-content">
		<header role="banner" id="masthead" class="site-header">
			<?php if (! is_page_template('landing-page.php')){ ?>
					<?php include 'modules/_partials/navigation.php'; ?>
			<?php } ?>
			<?php if (is_page_template('landing-page.php')){ ?>
				<div class="site-branding">
					<?php 
					$blog_info = get_bloginfo( 'name' );
					if ( has_custom_logo() ){ ?>
									<div class="logo"><?php the_custom_logo(); ?></div>
					<?php } else{ ?>
									<a class="title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</header>
	
