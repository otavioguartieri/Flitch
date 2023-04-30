<!DOCTYPE html>
<html>
    <head>
        <title>16bits</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="/libs/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="/libs/globals.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/includes/style.css">
    </head>
    <style>
        body{
            margin:0;
        }
    </style>
    <body>
        <div class="content" style="display:flex;">
        <?php
            if(empty($view = ($_REQUEST['v'] ?? ''))) $view = 'home';
            if(file_exists($vf = __DIR__."/views/$view/index.php"))
            @include_once($vf);
        ?>
        </div>
    </body>
</html>
<script>
</script>