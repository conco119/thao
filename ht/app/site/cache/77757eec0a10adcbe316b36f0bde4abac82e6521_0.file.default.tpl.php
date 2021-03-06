<?php
/* Smarty version 3.1.30, created on 2018-08-25 17:24:55
  from "/Users/mtd/Sites/buff/app/site/view/layouts/default.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b812e77758bd5_65316730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77757eec0a10adcbe316b36f0bde4abac82e6521' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/layouts/default.tpl',
      1 => 1535190711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:includes/sidebar.tpl' => 1,
    'file:includes/header.tpl' => 1,
    'file:includes/footer.tpl' => 1,
  ),
),false)) {
function content_5b812e77758bd5_65316730 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['arg']->value['setting']['name'];?>
</title>
    <base href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['domain'];?>
">
    <link href="./mtd.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/custom.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/icheck/flat/green.css" rel="stylesheet">
    <!-- chosen -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/chosen/bootstrap-chosen.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/notify/pnotify.core.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/notify/pnotify.buttons.js"><?php echo '</script'; ?>
>
    <!-- image product -->
    <link  href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/product/gallery-grid.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/product/baguetteBox.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
css/style.css">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <?php $_smarty_tpl->_subTemplateRender("file:includes/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>
            <!-- top navigation -->
                <?php $_smarty_tpl->_subTemplateRender("file:includes/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col">
                <br />
                <!-- site content -->
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tpl_file']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                <!-- /site content -->
                <!-- footer content -->
                <?php $_smarty_tpl->_subTemplateRender("file:includes/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>
    </div>
    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group"></ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- chosen -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/nicescroll/jquery.nicescroll.min.js"><?php echo '</script'; ?>
>
    <!-- bootstrap progress js -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/datepicker/daterangepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/progressbar/bootstrap-progressbar.min.js"><?php echo '</script'; ?>
>
    <!-- icheck -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/icheck/icheck.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/my.js"><?php echo '</script'; ?>
>
    <!-- pace -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/pace/pace.min.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
