<?php
/* Smarty version 3.1.30, created on 2018-08-14 22:20:12
  from "/Users/mtd/Sites/buff/app/admin/view/layouts/includes/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b72f32c8f88b5_41306739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '681d834ff236886a4c46798ae34561464208228d' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/admin/view/layouts/includes/header.tpl',
      1 => 1530621187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b72f32c8f88b5_41306739 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="top_nav">

	<div class="nav_menu">
		<nav class="">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url($_smarty_tpl->tpl_vars['arg']->value['avatar']);?>
" alt=""><?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['username'];?>
 <span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['prefix_admin'];?>
mc=user&site=profile"> Tài khoản</a></li>
						<li><a href="admin?mc=user&site=logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>

</div>
<?php }
}
