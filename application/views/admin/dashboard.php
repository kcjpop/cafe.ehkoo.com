        <div class="row">
            <div class="span6">
                <h3>Add new cafe</h3>
<form method="post" action="<?php echo URL::to_action('admin.cafe@create') ?>">
    <fieldset>
        <legend>General</legend>
        <label>Name</label>
        <input type="text" class="span6" name="name" placeholder="Name">
        <label>Address</label>
        <input type="text" class="span6" name="address" placeholder="Address">
        <label>Review</label>
        <textarea rows="10" class="span6" name="review"></textarea>
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
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>
        <tr>
            <td><a href="">Country House Coffee</a></td>
            <td>18C Phan Văn Trị, phường 10, Q.Gò Vấp, Tp.HCM</td>
            <td>125</td>
        </tr>

    </tbody>
</table>

    <div class="pagination pagination-centered">
    <ul>
    <li class="disabled"><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
    </ul>
    </div>
            </div>
        </div>