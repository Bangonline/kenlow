<?php /* Template Name: Flexible Content */ 


get_header();


?>

<section class="main-page">
    <?php echo get_template_part('page_template/sections/banner');?>
	<?php if( get_field('visibility') == 'show' ){ echo get_template_part('page_template/sections/two-column'); } ?>
    <?php 
        get_template_part( 'page_template/components');
    ?>
</section>



<?php

get_footer();
