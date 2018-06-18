<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $title_for_layout;?></title>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- Bootstrap Core Css -->
        <link href="<?php echo $this->webroot;?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Waves Effect Css -->
        <link href="<?php echo $this->webroot;?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="<?php echo $this->webroot;?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />
        <!-- Morris Chart Css-->
        <link href="<?php echo $this->webroot;?>/assets/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Sweet Alert Css -->
        <link href="<?php echo $this->webroot;?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="<?php echo $this->webroot;?>/assets/css/style.css" rel="stylesheet">
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo $this->webroot;?>/assets/css/themes/all-themes.css" rel="stylesheet" />
        <!--for show driver on map-->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXUfctQqxktTfMmdu8NK50c09hkIyILMo&callback=initMap"
            type="text/javascript"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>
    <body class="theme-teal">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-teal">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <?php echo $this->element('admin/header');?>
        <section>
            <?php echo $this->element('admin/menu');?>
        </section>

        <?php echo $content_for_layout;?>	

        <!-- Jquery Core Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Select Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <!-- Slimscroll Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- JQuery Steps Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-steps/jquery.steps.js"></script>
        <!-- Sweet Alert Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/node-waves/waves.js"></script>
        <!-- Jquery Validation Plugin Css -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-validation/jquery.validate.js"></script>
        <!-- Jquery CountTo Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-countto/jquery.countTo.js"></script>
        <!-- Morris Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/raphael/raphael.min.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/plugins/morrisjs/morris.js"></script>
        <!-- ChartJs -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/chartjs/Chart.bundle.js"></script>
        <!-- Flot Charts Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/flot-charts/jquery.flot.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/plugins/flot-charts/jquery.flot.time.js"></script>
        <!-- Sparkline Chart Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>
        <!-- Custom Js -->
        <script src="<?php echo $this->webroot;?>/assets/js/admin.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/js/pages/index.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/js/pages/forms/form-validation.js"></script>
        <!-- Demo Js -->
        <script src="<?php echo $this->webroot;?>/assets/js/demo.js"></script>
    </body>
</html>