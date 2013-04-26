<h3>Add new cafe</h3>
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

