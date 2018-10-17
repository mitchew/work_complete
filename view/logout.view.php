<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link href="./view/css/bootstrap.min.css" rel="stylesheet">

    <link href="./view/css/login-register.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <script src="./view/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="./view/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./view/js/login-register.js" type="text/javascript"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><h1>Logout Success!</h1></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">Redirecting in <span id="redirect"></span></div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var second = 3;
        $('#redirect').text(second);
        setInterval(function() {
            second -= 1;
            $('#redirect').text(second);
        }, 1000);

        setTimeout(function() {
            window.location = ".";
        }, 3000)
    });
</script>
</body>
</html>