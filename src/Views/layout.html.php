<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
    <title>Test application</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.3/css/jquery.dataTables.css">
    <link type="text/css" href="/css/test.css" rel="stylesheet">
    <link type="text/css" href="/css/bootstrapValidator.min.css" rel="stylesheet">
</head>

<body>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="/js/studentValidation.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://github.com/Dimona/Test">Test Project</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="<?php echo \Framework\Router\Router::getInstance()->generate('home') ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo \Framework\Router\Router::getInstance()->generate('showStudents') ?>">Students</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
echo($content);
?>

<?php if (isset($messages)) {
    foreach ($messages as $message) {
        ?>
        <div class="container alert alert-<?php echo $message['type']; ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
            <?php echo $message['text']; ?>
        </div>
    <?php } ?>
<?php } ?>

</body>
</html>

<script type='text/javascript'>
    $(document).ready(function () {
        $('.alert').delay(4000);
        $('.alert').fadeOut('very slow');
    });
</script>
