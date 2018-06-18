<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title><?php echo $title_for_layout;?></title>
        <link href="<?php echo $this->webroot;?>css/stylesheets.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->webroot;?>css/lightbox.css" rel="stylesheet" type="text/css" />
        <link rel='stylesheet' type='text/css' href='<?php echo $this->webroot;?>css/fullcalendar.print.css' media='print' />
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/jquery/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/jquery/jquery-migrate-1.2.1.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/jquery/jquery.mousewheel.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/bootstrap.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/excanvas.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/jquery.flot.js'></script>    
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/jquery.flot.stack.js'></script>    
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/jquery.flot.pie.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/jquery.flot.resize.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/sparklines/jquery.sparkline.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/charts/chart.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/select2/select2.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/uniform/uniform.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/animatedprogressbar/animated_progressbar.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/cleditor/jquery.cleditor.js'></script>
        <?php /* ?><script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/dataTables/jquery.dataTables.min.js'></script>  <?php */?>  
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/fancybox/jquery.fancybox.pack.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/multiselect/jquery.multi-select.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/pnotify/jquery.pnotify.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/ibutton/jquery.ibutton.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins/scrollup/jquery.scrollUp.min.js'></script>

        <script type='text/javascript' src='<?php echo $this->webroot;?>js/tinymce/js/tinymce/tinymce.min.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/cookies.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/actions.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/charts.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/plugins.js'></script>
        <script type='text/javascript' src='<?php echo $this->webroot;?>js/settings.js'></script>
        <script>
            tinymce.init(
                    {
                        selector: '.tinymce',
                        plugins: [
                            'contextmenu',
                            "save,advlist autolink autosave lists charmap hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
                        ],
                        toolbar1: "save code | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect fontselect fontsizeselect | searchreplace | bullist numlist | undo redo | insertdatetime forecolor table | hr spellchecker",
                    }
            );
        </script>
        <?php
        echo $html->css('/calendar/css/dailog.css');
        echo $javascript->link('/calendar/js/Plugins/Common.js');
        echo $javascript->link('/calendar/js/Plugins/jquery.ifrmdailog.chrome.js');
        echo $javascript->link('/calendar/js/Plugins/jquery.ifrmdailog.planner.revised.js');
        ?>
    </head>
    <body>
        <div class="wrapper fixed lime" style="width:100%;">
            <?php echo $content_for_layout;?>	
            <style type="text/css">
                .table-sorting {
                    background-color: #fff;
                    font-size: 12px;
                    padding-left: 14px;
                    padding-right: 14px;
                    position: relative;
                }
                .radio, .checkbox {
                    min-height: 20px;
                    padding-left: 0;
                }
                .radio input[type="radio"], .checkbox input[type="checkbox"] {
                    float: left;
                    margin-left: 0;
                }
                .alert-block {
                    margin-top: 14px;
                    padding-bottom: 8px;
                    padding-top: 8px;
                }
                .row-fluid .span8 {
                    width: 98.812%;
                }
                .row-fluid .span9 {
                    width: 82.359%;
                }
            </style>
            <div class="modal-backdrop fade in" id="ajaxreviewbackdrop" style="display:none;"></div>
        </div>			
    </body>
</html>