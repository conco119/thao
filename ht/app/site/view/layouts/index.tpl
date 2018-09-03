<!doctype html>
<html lang="en">

<head>
    <title>Admin page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link href="{$arg.stylesheet}fonts/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{$arg.stylesheet}/site/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$arg.stylesheet}/site/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{$arg.stylesheet}/site/vendor/linearicons/style.css">
    <link rel="stylesheet" href="{$arg.stylesheet}/site/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{$arg.stylesheet}/site/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{$arg.stylesheet}/site/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/doto.png">
    <script src="{$arg.stylesheet}/site/vendor/jquery/jquery.min.js"></script>
    <script src="{$arg.stylesheet}/site/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{$arg.stylesheet}/site/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{$arg.stylesheet}/site/scripts/klorofil-common.js"></script>
</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
            {include file="includes/nav.tpl"}
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
            {include file="includes/sidebar.tpl"}
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
            {include file=$tpl_file}
        <!-- END MAIN -->
        <div class="clearfix"></div>
            {include file="includes/footer.tpl"}
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
</body>
</html>
