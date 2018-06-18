<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title><?php echo $title_for_layout; ?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

</head>
<body class="login-page ">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Xenia Taxi - Admin Panel</a>
            <!--- <small>Management Information System</small> -->
        </div>
        <div class="card">
            <div class="body">
                <?php
                $message = $session->flash('auth');
                if(!empty($message))
                {?>
                <div class="alert alert-danger">
                    <h4>Info!</h4>
                    <?php echo $message; ?>
                </div>
                <?php
                }
                $message = $session->flash();
                if(!empty($message))
                {?>
                <div class="alert alert-danger">
                    <h4>Info!</h4>
                    <?php echo $message; ?>
                </div>
                <?php
                }?>
                <?php echo $content_for_layout; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>
</html>
