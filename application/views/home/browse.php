        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h2>All cafe</h2>
                </div>
                <div class="span4">
                    <div class="btn-group pull-right">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Sort by: Name<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Name</a></li>
                            <li><a href="#">City</a></li>
                            <li><a href="#">Location</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php if(isset($cafes) && !empty($cafes)) :
foreach($cafes as $obj) : ?>
        <div class="row cafe_block">
            <div class="span7">
                <a href="<?php echo URL::to_action('cafe@view', array($obj['_id'])) ?>" title=""><h5><?php echo $obj['name'] ?></h5></a>
                <p class="address"><?php echo $obj['address'] ?></p>
                <p><i class="icon-star"></i> View: <?php echo $obj['views'] ?></p>
            </div>
            <div class="span5 text-center">
<?php if(isset($obj['pictures']) && !empty($obj['pictures'])) : ?>
                <ul class="thumbnails">
<?php foreach($obj['pictures'] as $pic) : ?>
                    <li><img class="img-polaroid" src="<?php echo $pic ?>" alt="" width="100" height="100"></li>
<?php endforeach; ?>
                </ul>
<?php endif; ?>
            </div>
        </div>
<?php endforeach;
endif; ?>
        <div class="pagination pagination-centered">
            <?php echo $pagination ?>
        </div>