<?php
/* Smarty version 3.1.30, created on 2018-09-02 17:41:11
  from "/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/includes/nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8bbe477cd2c2_09483773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fbde6a5d7710185ed2412fc3e070ad7b454575a' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/includes/nav.tpl',
      1 => 1535884870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8bbe477cd2c2_09483773 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="common/assets/img/new-logo.png" alt="" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" >
                        <!-- <i class="lnr lnr-question-circle"></i> -->
                        <span>Số dư: <b style="color:red"><?php echo number_format($_smarty_tpl->tpl_vars['arg']->value['user']['balance']);?>
 <span style='color:black' >Xu</span><?php echo number_format($_smarty_tpl->tpl_vars['arg']->value['user']['lstream_balance']);?>
 <span style='color:black' >Rik</span></b></p></span>
                        <!-- <i class="icon-submenu lnr lnr-chevron-down"></i> -->
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="assets/img/user.png" class="img-circle" alt="Avatar">  -->
                        <span><?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['username'];?>
</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <?php if ($_smarty_tpl->tpl_vars['arg']->value['user']['user_type'] == 1) {?>
                            <li><a href="../admin"><i class="lnr lnr-user"></i> <span>Trang quản lý</span></a></li>
                        <?php }?>
                        <li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin tài khoản</span></a></li>
                        <li><a href="./v1.php?mc=user&site=logout"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
