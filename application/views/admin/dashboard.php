        <div class="row">
            <div class="span12">
                <h3 class="pull-left">All cafe</h3>
                <a href="<?php echo URL::to_action('admin.cafe') ?>" class="btn btn-success pull-right"><i class="icon-plus"></i> Add new cafe</a>
            </div>
        </div>
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
        <div class="row">
            <div class="span12">
            </div>
        </div>