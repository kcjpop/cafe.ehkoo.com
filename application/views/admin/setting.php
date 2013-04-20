        <h3>Settings</h3>
<?php
$status = Session::get('status');
if($status !== null) :
?>
        <div class="alert alert-<?php echo $status ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?php echo ucfirst($status) ?>!!!</strong> <?php echo Session::get('message') ?>
        </div>
<?php endif; ?>
        <ul class="nav nav-tabs" id="tab_settings">
            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
            <li><a href="#language" data-toggle="tab">Languages</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="general">


<form class="form-horizontal">
    <div class="control-group">
        <label class="control-label" for="inputEmail">Site Name</label>
        <div class="controls">
            <input class="span6" type="text" id="inputEmail">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Meta Keywords</label>
        <div class="controls">
            <input class="span6" type="password" id="inputPassword">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Meta Descriptions</label>
        <div class="controls">
            <input class="span6" type="password" id="inputPassword">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Site Enable</label>
        <div class="controls">
            <label class="radio"><input type="radio" name="site_enable" checked="checked"> Yes</label>
            <label class="radio"><input type="radio" name="site_enable"> No</label>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


            </div>
            <div class="tab-pane" id="language">
<form class="form-horizontal">
    <div class="control-group">
        <label class="control-label" for="inputEmail">Default language</label>
        <div class="controls">
            <select>
                <option>English</option>
                <option>Tiếng Việt</option>
            </select>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="inputPassword">Allow users to switch languages?</label>
        <div class="controls">
            <label class="radio"><input type="radio" name="site_enable" checked="checked"> Yes</label>
            <label class="radio"><input type="radio" name="site_enable"> No</label>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPassword">&nbsp;</label>
        <div class="controls">
            <button class="btn" id="btn_add_language" data-toggle="modal" data-target="#model_new_language">Add new language</button>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
            </div>
        </div>

<div id="model_new_language" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add new language</h3>
    </div>
    <div class="modal-body">
        <form id="frm_new_language" method="post" action="<?php echo URL::to_action('admin.language') ?>">
            <fieldset>
                <label>Language name</label>
                <input class="span4" type="text" name="name" placeholder="">
                <label>Language code</label>
                <input class="span4" type="text" name="code" placeholder="">
                <span class="help-block">The country code is in the format <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166-1 alpha-2</a></span>
            </fieldset>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="btn_submit">Save changes</button>
    </div>
</div>