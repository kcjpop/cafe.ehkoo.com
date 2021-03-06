        <div class="row">
            <div class="span12">
                <h3 class="pull-left">All cafe</h3>
                <a href="<?php echo URL::to_action('admin.cafe') ?>" class="btn btn-success pull-right"><i class="icon-plus"></i> Add new cafe</a>
            </div>
        </div>
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
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach($cafes as $obj) : ?>
                <tr>
                    <td><a title="Click to edit" href="<?php echo URL::to_action('admin.cafe@edit', array($obj['_id'])) ?>"><?php echo implode('<br>', $obj['name']) ?></a></td>
                    <td><?php echo implode('<br>', $obj['address']) ?></td>
                    <td><?php echo $obj['views'] ?></td>
                    <td><a title="Click to delete" href="<?php echo URL::to_action('admin.cafe@delete', array($obj['_id'])) ?>">Delete</a></td>
                </tr>
        <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination pagination-centered">
            <?php echo $pagination->links() ?>
        </div>
        <div class="row">
            <div class="span12">
            </div>
        </div>