<?php
	// check if the flexible content field has rows of data
	if( have_rows('flexible_components') ):
	// loop through the rows of data
		while ( have_rows('flexible_components') ) : the_row();
		if( get_row_layout() == 'wysiwyg_editor' ):
			get_template_part( 'page_template/page-components/opening-text');
		elseif( get_row_layout() == 'range'):
			get_template_part( 'page_template/page-components/our-range');	
		elseif( get_row_layout() == 'blind_materials'):
			get_template_part( 'page_template/page-components/blind-material');
		elseif( get_row_layout() == 'commercial_bisto_cafe_blinds'):
			get_template_part( 'page_template/page-components/commercial-bistro-cape-blind');
		elseif( get_row_layout() == 'inspiration'):
			get_template_part( 'page_template/page-components/inspiration');
		elseif( get_row_layout() == 'more_information_section'):
			get_template_part( 'page_template/page-components/more-info-cta');
		elseif( get_row_layout() == 'outdoor_blinds_text_content'):
			get_template_part( 'page_template/page-components/outdoor-blind-section');
		elseif( get_row_layout() == 'contact_us'):
			get_template_part( 'page_template/page-components/cta');
		elseif( get_row_layout() == 'testimonial'):
			get_template_part( 'page_template/page-components/testimonials');																																																																	
		endif;
	endwhile;
	else :
	// no layouts found
	endif;
?>



