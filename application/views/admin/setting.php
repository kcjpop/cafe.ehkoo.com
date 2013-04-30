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
            <li><a href="#general" data-toggle="tab">General</a></li>
            <li><a href="#language" data-toggle="tab">Languages</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="general">

<form class="form-horizontal" method="post" action=<?php echo URL::to_action('admin.setting@index') ?>>
    <div class="control-group">
        <label class="control-label" for="site_name">Site Name</label>
        <div class="controls">
            <input class="span6" type="text" name="key[site_name]" id="site_name" value="<?php echo isset($settings['site_name']) ? $settings['site_name'] : ''  ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="meta_keywords">Meta Keywords</label>
        <div class="controls">
            <input class="span6" type="text" name="key[meta_keywords]" id="meta_keywords" value="<?php echo isset($settings['meta_keywords']) ? $settings['meta_keywords'] : '' ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="meta_description">Meta Description</label>
        <div class="controls">
            <input class="span6" type="text" name="key[meta_description]" id="meta_description" value="<?php echo isset($settings['meta_description']) ? $settings['meta_description'] : '' ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="site_enabled">Site Enable</label>
        <div class="controls">
            <label class="radio"><input type="radio" name="key[site_enabled]" value="1" checked="checked"> Yes</label>
            <label class="radio"><input type="radio" name="key[site_enabled]" value="0"> No</label>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>


            </div>
            <div class="tab-pane" id="language">
<form class="form-horizontal" method="post" action=<?php echo URL::to_action('admin.setting@index') ?>>
    <div class="control-group">
        <label class="control-label" for="inputEmail">Default language</label>
        <div class="controls">
<?php if(isset($languages) && !empty($languages)) : ?>
            <select name="key[default_language]">
<?php foreach($languages as $obj) : ?>
                <option value="<?php echo $obj['code'] ?>"><?php echo $obj['name'] ?></option>
<?php endforeach; ?>
            </select>
<?php endif; ?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="inputPassword">Allow users to switch languages?</label>
        <div class="controls">
            <label class="radio"><input type="radio" name="key[is_multi_language]" value="1" checked="checked"> Yes</label>
            <label class="radio"><input type="radio" name="key[is_multi_language]" value="0"> No</label>
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
                <span class="help-block">The country code is in the format <a href="http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes">ISO 639-1</a></span>
            </fieldset>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="btn_submit">Save changes</button>
    </div>
</div>