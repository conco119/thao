<?php
/* Smarty version 3.1.30, created on 2018-08-30 00:05:18
  from "/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/includes/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b86d24ee69877_32632209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ded852353de6fc72e40a0f0859c00108f9428718' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/includes/header.tpl',
      1 => 1534778651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b86d24ee69877_32632209 (Smarty_Internal_Template $_smarty_tpl) {
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
						<img src="<?php echo base_url('upload/avatar/fallback-avatar.png');?>
" alt=""><?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['username'];?>
 <span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
						<li><a href="./?mc=user&site=cp"> Đổi mật khẩu</a></li>
						<?php if ($_smarty_tpl->tpl_vars['arg']->value['user']['permission'] == 1) {?>
							<li><a href="./admin"> Trang quản lý</a></li>
						<?php }?>
						<li><a href="./?mc=user&site=logout"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
					</ul>
				</li>
				<li role="presentation" class="dropdown">
                  <a href="javascript:;"  class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
				  <span style='color:red!important'><?php echo number_format($_smarty_tpl->tpl_vars['arg']->value['user']['like_count']);?>
 </span>
					<i class="fa fa-thumbs-up" aria-hidden="true" style='color:#717171!important'></i>
                  </a>
                </li>
				<li role="presentation" class="dropdown">
                  <a href="javascript:;"  class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
				  <span ><?php echo number_format($_smarty_tpl->tpl_vars['arg']->value['user']['sub_day']);?>
 Ngày </span>
                  </a>
                </li>

			</ul>
		</nav>
	</div>

</div>
<?php }
}
