<!doctype html>
<html lang="en">
<head>
    <title>cafe.ehkoo.com - Browse</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/admin.style.css">
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="row">
                    <ul class="nav">
                        <li><a href="index.html" title="">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="setting.html" class="dropdown-toggle" data-toggle="dropdown">Setting<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="setting.html">General</a></li>
                                <li><a href="setting.html">Laguages</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="main_content">
        <?php echo $content ?>
    </div>

    <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script>
</body>
</html>

