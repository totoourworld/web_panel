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
        <!-- Bootstrap Select Css -->
        <link href="<?php echo $this->webroot;?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
        <!--date pickers-->
        <!--<link href="<?php echo $this->webroot;?>/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />-->



        <!-- Custom Css -->
        <link href="<?php echo $this->webroot;?>/assets/css/style.css" rel="stylesheet">
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo $this->webroot;?>/assets/css/themes/all-themes.css" rel="stylesheet" />

        <!-- ajax script -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

        <!-- for fancybox -->
        <script src="<?php echo $this->webroot;?>/js/fancybox/fancybox.js"></script>

        <link rel="stylesheet" href="<?php echo $this->webroot;?>/js/fancybox/fancybox.css" />
        <script src="<?php echo $this->webroot;?>/js/fancybox/fancy.js"></script>

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
        <!-- Bootstrap Colorpicker Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <!-- Dropzone Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/dropzone/dropzone.js"></script>
        <!-- Input Mask Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <!-- Multi Select Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/multi-select/js/jquery.multi-select.js"></script>
        <!-- Jquery Spinner Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/jquery-spinner/js/jquery.spinner.js"></script>
        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <!-- noUISlider Plugin Js -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/nouislider/nouislider.js"></script>
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
        <!-- Ckeditor -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/ckeditor/ckeditor.js"></script>
        <!-- TinyMCE -->
        <script src="<?php echo $this->webroot;?>/assets/plugins/tinymce/tinymce.js"></script>
        <!-- Custom Js -->
        <script src="<?php echo $this->webroot;?>/assets/js/admin.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/js/pages/forms/form-validation.js"></script>
        <script src="<?php echo $this->webroot;?>/assets/js/pages/forms/advanced-form-elements.js"></script>

        <script src="<?php echo $this->webroot;?>/assets/js/pages/forms/editors.js"></script>
         <!--Datepicker-->
        <link rel="stylesheet" href="<?php echo $this->webroot;?>/assets/css/datepicker/datepicker.css">
        <script src="<?php echo $this->webroot;?>/assets/js/pages/datepicker/datepicker.js"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'         
        });
            });
        </script>
        <!--end datepickers-->
        <!--for datepicker-->
        <!--<script src="<?php echo $this->webroot;?>/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>-->
        <!-- Demo Js -->
        <script src="<?php echo $this->webroot;?>/assets/js/demo.js"></script>
    </body>
</html>