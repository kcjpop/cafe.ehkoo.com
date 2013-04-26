<h3>Add new cafe</h3>
<form method="post" action="<?php echo URL::to_action('admin.cafe@do_create') ?>">
    <fieldset>
        <legend>General</legend>
        <label>Name*</label>
<?php
if(!empty($languages)) :
    foreach($languages as $obj) :
?>
        <div class="input-prepend">
            <span class="add-on"><?php echo $obj['code'] ?></span>
            <input class="span5" name="name[<?php echo $obj['code'] ?>]" type="text" placeholder="">
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
            <input class="span5" name="address[<?php echo $obj['code'] ?>]" type="text" placeholder="">
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
            <textarea rows="10" class="span5" name="review[<?php echo $obj['code'] ?>]"></textarea>
        </div>
<?php
    endforeach;
endif;
?>
        <legend>Pictures</legend>
        <?php echo $uploader ?>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </div>
    </fieldset>
</form>

