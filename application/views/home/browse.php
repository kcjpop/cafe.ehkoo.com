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
                <a href="cafe.html"><h5>Country House coffee</h5></a>
                <p class="address">18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</p>
                <p><i class="icon-star"></i> View: <?php echo $obj['views'] ?></p>
            </div>
            <div class="span5 text-center">
                <ul class="thumbnails">
                    <li><img class="img-polaroid" src="http://placehold.it/100x100" alt="" width="100" height="100"></li>
                    <li><img class="img-polaroid" src="http://placehold.it/100x100" alt="" width="100" height="100"></li>
                    <li><img class="img-polaroid" src="http://placehold.it/100x100" alt="" width="100" height="100"></li>
                </ul>
            </div>
        </div>
<?php endforeach;
endif; ?>
        <div class="pagination pagination-centered">
            <?php echo $pagination ?>
        </div>