<?php
/* Smarty version 3.1.30, created on 2018-09-02 16:09:26
  from "/Users/mtd/Sites/thao/viplike/ht/app/admin/view/layouts/includes/nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8ba8c6b316a8_64844450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2ea6f066af970fa3daab85bc79d9419f40b658f' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/admin/view/layouts/includes/nav.tpl',
      1 => 1535879360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8ba8c6b316a8_64844450 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <li><a href="../"><i class="lnr lnr-user"></i> <span>Trang người dùng</span></a></li>
                        <li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin tài khoản</span></a></li>
                        <li><a href="./?mc=pub&site=logout"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
