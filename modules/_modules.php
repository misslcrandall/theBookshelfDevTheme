<?php // If gutenberg is disabled and page has layouts show layouts

if( have_rows('layouts') ):

     // loop through the rows of data
    while ( have_rows('layouts') ) : the_row();
		$layout = get_row_layout();
		
		switch($layout):							
			case 'accordion':
				get_template_part( 'modules/accordion/module', 'module' );
				break;
			case 'alternating_content':
				get_template_part( 'modules/alternating-content/module', 'module' );
				break;
			case 'blog_cards':
				get_template_part( 'modules/blog-cards/module', 'module' );
				break;
			case 'cards':
				get_template_part( 'modules/cards/module', 'module' );
				break;
			case 'cta_block':
				get_template_part( 'modules/cta-block/module', 'module' );
				break;
			case 'events':
				get_template_part( 'modules/events/module', 'module' );
				break;
			/*case 'filtered-content':
				get_template_part( 'modules/filtered-content/module', 'module' );
				break;*/
			/*case 'related_books':
				get_template_part( 'modules/related-books/module', 'module' );
				break;*/
			case 'review_slider':
				get_template_part( 'modules/review-slider/module', 'module' );
				break;
			case 'subscribe_cta':
				get_template_part( 'modules/subscribe-cta/module', 'module' );
				break;
			case 'text_block':
				get_template_part( 'modules/text-block/module', 'module' );
				break;
			case 'video_embed':
				get_template_part( 'modules/video-embed/module', 'module' );
				break;				
				
		endswitch;

    endwhile;

else : // else show the content ?>
	<div class="container" role="main">
		<div class="row">
			<div class="col-2/3 content"><?php the_content(); ?></div>
		</div>
	</div>
<?php

endif;?>


