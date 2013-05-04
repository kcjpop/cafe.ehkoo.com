<?php if(!empty($hottest)) : ?>
        <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
<?php $total = count($hottest);
$index = 0;
while($index < $total) :
?>
                <li <?php if($index === 0) echo 'class="active"' ?> data-target="#myCarousel" data-slide-to="<?php echo $index++ ?>"></li>
<?php endwhile; ?>
            </ol>
            <!-- Carousel items -->
            <div class="carousel-inner">
<?php foreach($hottest as $idx => $obj) :  ?>
                <div class="item<?php if($idx === 0) echo ' active' ?>">                  
                    <ul class="masonry_item thumbnails">
<?php foreach($obj['pictures'] as $pic) : ?>
                        <li class="item"><img class="img-polaroid" src="<?php echo URL::to_asset('uploads'.DS.$pic) ?>" alt=""></li>
<?php endforeach; ?>
                    </ul>
                    <div class="carousel-caption">
                        <h4><?php echo $obj['name'] ?></h4>
                        <p><?php echo $obj['address'] ?></p>
                    </div>
                </div>
<?php endforeach; ?>
            </div>
        </div>
<?php endif; ?>

        <div class="row">
            <div class="span4">
                <div class="introduction_block well">
                    <p><i class="icon-coffee icon-4x"></i></p>
                    <h5><?php echo __('cafe.home.discover_new_cafe_heading') ?></h5>
                    <p class="text"><?php echo __('cafe.home.discover_new_cafe_content') ?></p>
                </div>
            </div>
            <div class="span4">
                <div class="introduction_block well">
                    <p><i class="icon-mobile-phone icon-4x"></i></p>
                    <h5>Easy access</h5>
                    <p class="text">Our site is reponsive. That means you can have the same experiences on whatever your devices. PC, tablet, smart phone, you name it.</p>
                </div>
            </div>
            <div class="span4">
                <div class="introduction_block well">
                    <p><i class="icon-flag icon-4x"></i></p>
                    <h5>Multi-language</h5>
                    <p class="text">Xin chào! Hello! Currently we offer you in English and Vietnamese. More translations will come very soon.</p>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(function() {
    $('.carousel').carousel({
        inteval: 2000
    });

    $('.masonry_item').imagesLoaded(function() {
        $('.masonry_item').masonry({
            itemSelector: '.item'
        });
    });
});
</script>