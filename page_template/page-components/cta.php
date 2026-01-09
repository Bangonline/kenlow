<?php
    $content = get_sub_field('text_content');
    $heading = get_sub_field('headline');
    $cta = get_sub_field('cta');

?>

<section class="cta-us">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h3><?php echo $heading;?></h3>

                <div class="cta-us__text">
                    <?php echo $content;?>
                </div>

                <a class="btn btn-green" href="<?php echo $cta['url'];?>">
                        
                        <?php echo $cta['title'];?>

                        <i class="fas fa-angle-right"></i>
                </a>
               
            </div>
        </div>
    </div>
</section>