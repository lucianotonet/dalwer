<?php
if (!function_exists('acera_admin_head')) {

    function acera_admin_head() {
        ?>
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>css/acera_css.css" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>css/colorpicker.css" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>css/custom_style.css" />

        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>js/colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>js/ajaxupload.js"></script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()."/acera-options/"; ?>js/mainJs.js"></script>
        <?php
    }

}
?>