<?php
/* Smarty version 3.1.30, created on 2018-09-02 16:55:44
  from "/Users/mtd/Sites/thao/viplike/ht/app/admin/view/ssh/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8bb3a03dc516_20683368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4445b278775c30d36e0e03101dd3ee622b908c8b' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/admin/view/ssh/index.tpl',
      1 => 1535882137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8bb3a03dc516_20683368 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal edit nation name -->
<div class="modal fade" id='ssh'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Chỉnh sửa</h4>
            </div>
            <div class="modal-body">
                <form action="./?mc=ssh&site=edit" method="post">
                    <label>SSH</label>
                    <input type='text' name='content' class='form-control'>
                    <input type='hidden' name='id'>
                    <br>
                    <label>Quốc gia</label>
                    <select class='form-control' id='nation' name='nation_id'>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-success">Chỉnh sửa</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="DeleteForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Xóa mục này</h4>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn xóa mục này chứ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                <a class="btn btn-danger" id="DeleteItem">Xóa</a>
            </div>
        </div>
    </div>
</div>

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-body" >
                                <div>
                                    <a href='./quocgia' type="submit" name='submit' class="btn btn-primary">Quản lý quốc gia</a>
                                </div>
                                <form method="POST" action='./?mc=ssh&site=create'>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>SSH</label>
                                            <input type="text" name="content" placeholder="Nhập chuỗi" class="form-control" required="">
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
                                            <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover projects">
                <thead>
                    <tr>
                        <th class="text-center">SSH</th>
                        <th class="text-center">Tên quốc gia</th>
                        <th class="text-right"></th>
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
                        <td class="text-right">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#ssh" onclick="LoadDataForForm(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
);"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" onclick="Delete(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
);"><i class="fa fa-trash-o"></i></button>
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
<?php echo '</script'; ?>
>

<?php }
}
