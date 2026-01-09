<?php
get_header();	
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while(have_posts()) : the_post(); ?>

      <?php

    

            echo get_template_part('page_template/sections/banner');

          

            echo get_template_part('page_template/sections/our-range');


            echo get_template_part('page_template/sections/sales-team');          
          

            echo get_template_part('page_template/sections/testimonials');

          

            echo get_template_part('page_template/sections/free-quote');

          

            echo get_template_part('page_template/sections/callback');

         

            echo get_template_part('page_template/sections/inspiration');
         


      ?>
        

    <?php endwhile; // End of the loop. ?>
   
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();