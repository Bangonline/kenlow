<?php

$headline = get_sub_field('heading');
$content = get_sub_field('content');
$cta = get_sub_field('cta');

?>
<section class="cbcb">
    <div class="container">
        <div class="cbcb__wrapper">
            <div class="row">
                <div class="col-md-7">
                    <h2><?php echo $headline;?></h2>
                </div>

                <div class="col-md-5">
                    <div class="cbcb__text">
                        <?php echo $content;?>
                    </div>

                    <a class="btn btn-green" href="<?php echo $cta['url'];?>">
                    
                        <?php echo $cta['title'];?>

                        <i class="fas fa-angle-right"></i>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</section>