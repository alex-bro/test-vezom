<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="/public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/public/css/main.css" rel="stylesheet" media="screen">
    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>

    <title>Vezom</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="navbar" style="background: #d3d3d3">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/news">НОВОСТИ</a></li>
                        <li><a href="/guestbooks">ГОСТЕВАЯ КНИГА</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin-right: 1em"><a href="/administrator">ВХОД</a></li>
                    </ul>
                </div>
                <?php echo $content; ?>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">

        </div>

    </div>


</body>
</html>