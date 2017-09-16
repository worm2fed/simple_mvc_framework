<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/static/css/vendor.css">
    <!-- Theme initialization -->
    <link rel="stylesheet" id="theme-style" href="/static/css/app.css">
</head>

<body>
<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-search"><h4><?= Config::APP_NAME ?></h4></div>
            <div class="header-block header-block-nav">
                <button type="button" class="btn btn-danger-outline"><i class="fa fa-sign-out icon"></i> Logout</button>
                <button type="button" class="btn btn-success"><i class="fa fa-sign-in icon"></i> Login</button>
            </div>
        </header>

        <article class="content items-list-page">
            <?php require $__view ?>
        </article>

    </div>
</div>
<script src="/static/js/vendor.js"></script>
<script src="/static/js/app.js"></script>
</body>
</html>