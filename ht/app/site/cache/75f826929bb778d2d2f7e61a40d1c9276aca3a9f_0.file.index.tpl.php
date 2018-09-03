<?php
/* Smarty version 3.1.30, created on 2018-09-03 23:45:16
  from "/Users/mtd/Sites/thao/viplike/ht/app/site/view/ssh/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8d651c8a22a5_42601257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75f826929bb778d2d2f7e61a40d1c9276aca3a9f' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/site/view/ssh/index.tpl',
      1 => 1535993114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8d651c8a22a5_42601257 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-body" >

                                <form method="POST" action='./?mc=ssh&site=buy'>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nhập số lượng muốn mua</label>
                                            <input type="number" name="num" placeholder="Số lượng" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Lựa chọn quốc gia</label>
                                            <select class='form-control' name='nation_id'>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nations']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                                    <option value=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                            </select>
                                        </div>
                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <button type="submit" name='submit' class="btn btn-primary">Mua</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            <div class='row container'>
                <div class='col-md-2'>
                    <select class='form-control'>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nations']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <option value=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" name='submit' class="btn btn-primary">Xuất file</button>
                </div>
            </div>
            <br>
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover projects">
                <thead>
                    <tr>
                        <th class="text-center">SSH</th>
                        <th class="text-center">Quốc gia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ssh']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                    <tr>
                        <td class="text-center">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

                        </td>
                        <td class="text-center">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

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
        <div>
            <div class="paging text-right"><?php echo $_smarty_tpl->tpl_vars['paging']->value['paging'];?>
</div>
        </div>

    <!-- END MAIN CONTENT -->
</div>

<?php echo '<script'; ?>
>
function Delete(id) {
    console.log(id)
    $("#DeleteItem").attr("href", "./?mc=ssh&site=delete&id=" + id);
}

function LoadDataForForm(id) {
    $.post("./?mc=ssh&site=ajax_load", { 'id': id }).done(function(data) {
        data = JSON.parse(data);
        $("#ssh input[name=id]").val(data.id);
        $("#ssh input[name=content]").val(data.content);
        $("#nation").html(data.str);
    });
}

function filter(id)
{

}
<?php echo '</script'; ?>
>


<?php }
}
