<?php
/* Smarty version 3.1.30, created on 2018-08-26 23:39:19
  from "/Users/mtd/Sites/buff/app/site/view/layouts/includes/sidebar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b82d7b77fdb53_77522618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48bda2bd786e2ab07e29c31f055bb83855ef5f8d' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/layouts/includes/sidebar.tpl',
      1 => 1535301556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b82d7b77fdb53_77522618 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="left_col scroll-view">

	<div class="navbar nav_title" style="border: 0;">
		<a href="./admin" class="site_title"><i class="fa fa-laptop"></i><span> Dịch vụ facebook</span></a>
	</div>
	<div class="clearfix"></div>
	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

		<div class="menu_section">
			<h3>Chức năng chính</h3>

			<ul class="nav side-menu">
				<li id='bufflike'><a href="./?mc=buff"><i class="fa fa-thumbs-up"></i>BUFF LIKE</a></li>
				
				<li id='vipsub'><a><i class="fa fa-desktop"></i>Vip sub<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu"  style="display: none">
						<li><a href="./?mc=vipsub">Danh sách</a></li>
						<li><a href="./?mc=vipsub&site=give_day">Chuyển ngày sub</a></li>
					</ul>
				</li>
				<li id=''><a><i class="fa fa-desktop"></i>Quản lý bán hàng<span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu"  style="display: none">
						<li><a href="./?mc=cp&site=index">Quản lý tài khoản</a></li>
						<li><a href="#">Quản lý nhóm</a></li>
					</ul>
				</li>
			</ul>
		</div>
		

	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
		
		<a   href='./?mc=user&site=logout' data-toggle="tooltip" data-placement="top" title="Logout"> <span
			class="glyphicon glyphicon-off"></span>
		</a>
	</div>
	<!-- /menu footer buttons -->
</div>
<?php echo '<script'; ?>
>
if($("body.nav-sm").length){
	$(".sidebar-footer.hidden-small").hide();
}
<?php echo '</script'; ?>
>
<?php }
}
