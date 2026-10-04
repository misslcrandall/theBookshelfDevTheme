</div><!--End Page-->
	<?php if (! is_page_template('landing-page.php')){ ?>	
		<footer role="contentinfo">
			<div class="inner">
				<?php include 'modules/_partials/social-menu.php';	 ?>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container_class' => 'footer-menu',
						)
					);
				?>
				<p class="copyright">&copy; <?php echo date("Y"); ?> TheBookshelfDev</p>
			</div>
		</footer>
	<?php } ?>
<?php wp_footer(); ?>
<?php if ( is_post_type_archive('books') ){
	echo '<script src="'.get_stylesheet_directory_uri().'/libraries/mixitup.min.js"></script>';
	echo '<script src="'.get_stylesheet_directory_uri().'/libraries/mixitup-multifilter.min.js"></script>';?>
	<script>
		var containerEl = document.querySelector(".book-container");
		var mixer = mixitup(containerEl, {
			multifilter: {
				enable: true
			}
		});
	</script>
<?php } ?>
</body>
</html>