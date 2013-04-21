<?php
$status = Session::get('status');
// var_dump(Session::get('message'));
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
        <div class="row">
            <div class="span6">
                <h3>Add new cafe</h3>
<form method="post" action="<?php echo URL::to_action('admin.cafe@create') ?>">
    <fieldset>
        <legend>General</legend>
        <label>Name</label>
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
        <p>Uploading 4/10...</p>
        <div class="progress progress-striped active">
            <div class="bar" style="width: 40%;"></div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </div>
    </fieldset>
</form>


            </div>
            <div class="span6">
                <h3>All cafe</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
<?php foreach($cafes as $obj) : ?>
        <tr>
            <td><a href="<?php echo URL::to_action('admin.cafe@edit', array($obj['_id'])) ?>"><?php echo implode('<br>', $obj['name']) ?></a></td>
            <td><?php echo implode('<br>', $obj['address']) ?></td>
            <td><?php echo $obj['views'] ?></td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>

    <div class="pagination pagination-centered">
    <?php echo $pagination->links() ?>
    </div>
            </div>
        </div>