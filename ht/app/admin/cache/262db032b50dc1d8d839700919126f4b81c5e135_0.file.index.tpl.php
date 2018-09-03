<?php
/* Smarty version 3.1.30, created on 2018-09-02 10:48:19
  from "/Users/mtd/Sites/thao/viplike/ht/app/admin/view/home/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8b5d831fcf44_82909906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '262db032b50dc1d8d839700919126f4b81c5e135' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/admin/view/home/index.tpl',
      1 => 1535687095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8b5d831fcf44_82909906 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <!-- END OVERVIEW -->
            <div class="row">
                <div class="col-md-12">
                <!-- PANEL NO PADDING -->
                    <div class="panel">
                        <div class="panel-heading">
                            <b><h2 class="panel-title" style="color:red">Báo giá</h2></b>
                            <table class="table">
                                <thead>
                                    <th class="text-center">TÊN GÓI</th>
                                    <th class="text-center">BẢNG GIÁ THEO NGÀY</th>
                                    <th class="text-center">BẢNG GIÁ THEO THÁNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="info">
                                        <tr>
                                            <td>Gói Vip 1</td>
                                            <td>600 Xu / 1 ngày</td>
                                            <td>20.000 Xu / 1 tháng</td>
                                        </tr>
                                        <tr class="info">
                                            <tr>
                                                <td>Gói Vip 2</td>
                                                <td>1500 Xu / 1 ngày</td>
                                                <td>50.000 Xu / 1 tháng</td>
                                            </tr>
                                            <tr class="danger">
                                                <td>Gói Vip 3</td>
                                                <td>3000 Xu / 1 ngày</td>
                                                <td>100.000 Xu / 1 tháng</td>
                                            </tr>
                                            <tr class="danger">
                                                <td>Gói Vip 4</td>
                                                <td>5000 Xu / 1 ngày</td>
                                                <td>150.000 Xu / 1 tháng</td>
                                            </tr>
                                            <tr class="info">
                                                <td>Gói Vip 5</td>
                                                <td>6000 Xu / 1 ngày</td>
                                                <td>200.000 Xu / 1 tháng</td>
                                            </tr>
                                            <tr class="info">
                                                <td>Gói Vip 6</td>
                                                <td>10.000 Xu / 1 ngày</td>
                                                <td>300.000 Xu / 1 tháng</td>
                                            </tr>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END PANEL NO PADDING -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <!-- TODO LIST -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="color:red">Thông báo</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                                <!-- notification here -->
                            <?php echo $_smarty_tpl->tpl_vars['notification']->value['content'];?>

                        </div>
                    </div>
                    <!-- END TODO LIST -->
                </div>
                <div class="col-md-5">
                    <!-- TIMELINE -->
                    <div class="panel panel-scrolling">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="color:red">Danh sách bảo trì server</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled activity-list">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['maintenance']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <li>
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['sv_name'];?>

                                        <span class="timestamp">Gói <?php echo $_smarty_tpl->tpl_vars['item']->value['goi'];?>
</span>
                                    </p>
                                </li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </div>
                    </div>
                    <!-- END TIMELINE -->
                </div>
            </div>

        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<?php echo '<script'; ?>
>
$(document).ready(function(){
    $("#sidebar-nav .nav li a").attr("class", "");
    $("#sidebar-nav .nav li a[href='index.php']").attr("class", "active");
})
<?php echo '</script'; ?>
><?php }
}
