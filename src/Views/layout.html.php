<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Test application</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link href="/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/test.css" rel="stylesheet">
    <!--    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="/css/session.css">-->

    <!--    <script type="text/javascript" src="/js/jquery.min.js"></script>-->
</head>
<body>
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<!--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.js"></script>-->

<!--<script type="text/javascript" src="/js/teamValidation.js"></script>-->
<!--<script type="text/javascript" src="/js/jquery.lightbox_me.js"></script>-->
<!--<script type="text/javascript" src="/js/addTeam.js"></script>-->

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="https://github.com/Dimona/Test">Test Project</a>
            <ul class="nav  pull-right">
                <li class="divider-vertical"></li>
                <li class="active">
                    <a href="<?php echo \Framework\Router\Router::getInstance()->generate('home') ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo \Framework\Router\Router::getInstance()->generate('getStudents') ?>">Students</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
echo($content);
?>

</body>
</html>


