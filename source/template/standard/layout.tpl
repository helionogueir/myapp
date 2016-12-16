<!DOCTYPE html>
<html lang="{$ENV.language.locale|lower}">
    <head>
        <meta charset="{$ENV.language.collate|upper}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Helio de Paula Nogueira <helio.nogueir@gmail.com>">
        <title>{$VIEW.title|default:"MyApp"}</title>
        <link rel="icon" href="{$ENV.url.https}/template/standard/asset/favicon.ico">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{$ENV.url.https}/bower/components-bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{$ENV.url.https}/bower/components-bootstrap/css/bootstrap-theme.min.css">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link rel="stylesheet" href="{$ENV.url.https}/template/standard/asset/bootstrap/ie10-viewport-bug-workaround.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{$ENV.url.https}/template/standard/asset/font/roboto.css">
        <link rel="stylesheet" href="{$ENV.url.https}/template/standard/asset/custom/standard.css">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="{$ENV.url.https}/template/standard/asset/bootstrap/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="{$ENV.url.https}/template/standard/asset/bootstrap/ie-emulation-modes-warning.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- CONTAINER -->
        <div class="container-fluid small">
            {include file=$VIEW.template|default:"template/standard/page/httpCode.tpl"}
        </div>
        <!-- /CONTAINER -->
        <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted">&COPY; 2016 Helio de Paula Nogueira</p>
            </div>
        </footer>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{$ENV.url.https}/bower/jquery-3.1.1.min/index.js"></script>
        <script src="{$ENV.url.https}/bower/components-bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{$ENV.url.https}/template/standard/asset/bootstrap/ie10-viewport-bug-workaround.js"></script>
        <script>
            var ENV = new Object({
                "url": new Object({json_encode($ENV.url)})
            });
        </script>
    </body>
</html>