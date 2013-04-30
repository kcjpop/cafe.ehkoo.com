<?php if(isset($cafe)) : ?>
    <h3>Edit cafe information</h3>
<?php else : ?>
    <h3>Add new cafe</h3>
<?php endif; ?>
<?php
$status = Session::get('status');
if($status !== null) :
    ?>
        <div class="row">
            <div class="span12">
                <div class="alert alert-<?php echo $status ?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo ucfirst($status) ?>!!!</strong> <?php echo Session::get('message') ?>
                </div>
            </div>
        </div>
    <?php
endif;
?>
<form method="post" action="<?php echo URL::to_action('admin.cafe@do_post') ?>">
    <input type="hidden" name="_id" value="<?php echo isset($cafe['_id']) ? $cafe['_id'] : '' ?>">
    <input type="hidden" name="views" value="<?php echo isset($cafe['views']) ? $cafe['views'] : '0' ?>">
    <fieldset>
        <legend>General</legend>
        <label>Name*</label>
<?php
if(!empty($languages)) :
    foreach($languages as $obj) :
?>
        <div class="input-prepend">
            <span class="add-on"><?php echo $obj['code'] ?></span>
            <input class="span5" name="name[<?php echo $obj['code'] ?>]" type="text" value="<?php echo isset($cafe['name'][$obj['code']]) ? $cafe['name'][$obj['code']] : '' ?>">
        </div>
<?php
    endforeach;
endif;
?>
        <label>Address</label>
<?php
if(!empty($languages)) :
    foreach($languages as $obj) :
?>
        <div class="input-prepend">
            <span class="add-on"><?php echo $obj['code'] ?></span>
            <input class="span5" name="address[<?php echo $obj['code'] ?>]" type="text" value="<?php echo isset($cafe['address'][$obj['code']]) ? $cafe['address'][$obj['code']] : '' ?>">
        </div>
<?php
    endforeach;
endif;
?>
        <label>Review</label>
<?php
if(!empty($languages)) :
    foreach($languages as $obj) :
?>
        <div class="input-prepend">
            <span class="add-on"><?php echo $obj['code'] ?></span>
            <textarea rows="10" class="span5" name="review[<?php echo $obj['code'] ?>]"><?php echo isset($cafe['review'][$obj['code']]) ? $cafe['review'][$obj['code']] : '' ?></textarea>
        </div>
<?php
    endforeach;
endif;
?>
        <legend>Pictures</legend>
<?php if(isset($cafe['pictures']) && !empty($cafe['pictures'])) : ?>
        <ul class="thumbnails">
    <?php foreach($cafe['pictures'] as $item) : ?>
            <li class="span3"><a href="<?php echo URL::to_action('upload.delete') ?>" data-file="<?php echo $item ?>" title="Click to delete"><img class="img-polaroid" src="<?php echo URL::to_asset('uploads/' . $item) ?>"></a>
                <input type="hidden" name="files[]" value="<?php echo $item ?>">
            </li>
    <?php endforeach; ?>
        </ul>
<?php endif; ?>
        <?php echo $uploader ?>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
$(function() {
    $('ul.thumbnails').find('a').click(function() {
        var _this = $(this),
            _url = _this.attr('href');
            _li = _this.parent();

        $.ajax({
            url: _url,
            type: 'POST',
            data: {
                file: _this.data('file')
            },
            success: function() {
                _li.fadeOut('slow', function() {
                    _li.remove();
                })
            }
        });
        
        return false;
    });
});
</script>