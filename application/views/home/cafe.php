        <ul class="breadcrumb">
            <li><a href="<?php echo URL::base() ?>">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo URL::to_action('cafe') ?>">Browse</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $cafe['name'] ?></li>
        </ul>

        <div class="page-header">
            <h2><?php echo $cafe['name'] ?></h2>
        </div>

        <p class="address"><strong><?php echo __('Address:') ?></strong> <?php echo $cafe['address'] ?></p>
        <?php echo $cafe['review'] ?>

<?php if(!empty($cafe['pictures'])) : ?>
        <ul id="gallery" class="thumbnails">
    <?php foreach($cafe['pictures'] as $pic) : ?>
            <li class="item"><img class="img-polaroid" src="<?php echo URL::to_asset('uploads'.DS.$pic) ?>" alt=""></li>
    <?php endforeach; ?>
        </ul>
<?php endif; ?>
    <script type="text/javascript">
$(function() {
    $('#gallery').imagesLoaded(function() {
        $('#gallery').masonry({
            itemSelector: '.item'
        });
    });
});
    </script>