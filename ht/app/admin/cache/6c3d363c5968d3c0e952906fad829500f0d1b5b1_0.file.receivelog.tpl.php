<?php
/* Smarty version 3.1.30, created on 2018-08-16 18:20:01
  from "/Users/mtd/Sites/buff/app/site/view/bufflog/receivelog.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b755de1506f32_32397201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c3d363c5968d3c0e952906fad829500f0d1b5b1' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/bufflog/receivelog.tpl',
      1 => 1534418373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b755de1506f32_32397201 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Lịch sử nhận like</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="h_content">
            <div class="clearfix"></div>
          </div>

          <!-- start project list -->
          <div class="table-responsive">
              <table class="table table-striped table-hover projects">
                <thead>
                  <tr>
                    <th>Ngày giờ</th>
                    <th>Tài khoản nhận</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['revice_like']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['created_at'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['like_count'];?>
</td>
                  </tr>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
              </table>
          </div>
          <!-- end project list -->

          <div class="paging"><?php echo $_smarty_tpl->tpl_vars['paging']->value['paging'];?>
</div>
        </div>
      </div>
    </div>
  </div><?php }
}
