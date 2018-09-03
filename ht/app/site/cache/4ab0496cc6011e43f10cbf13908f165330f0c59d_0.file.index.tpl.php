<?php
/* Smarty version 3.1.30, created on 2018-09-02 16:55:30
  from "/Users/mtd/Sites/thao/viplike/ht/app/admin/view/nation/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b8bb392e7b152_66936492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ab0496cc6011e43f10cbf13908f165330f0c59d' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/admin/view/nation/index.tpl',
      1 => 1535882115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b8bb392e7b152_66936492 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal edit nation name -->
<div class="modal fade" id='nation'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Chỉnh sửa</h4>
            </div>
            <div class="modal-body">
                <form action="./?mc=nation&site=edit" method="post">
                    <label>Tên quốc gia</label>
                    <input type='text' name='name' class='form-control'>
                    <input type='hidden' name='id'>
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
                        <div class="panel-body">
                            <div>
                                <a href='./ssh' type="submit" name='submit' class="btn btn-primary">Quản lý SSH</a>
                            </div>
                            <form method="POST" action='./?mc=nation&site=create'>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên quốc gia</label>
                                        <input type="text" name="name" placeholder="Nhập tên quốc gia" class="form-control" required="">
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
            <table class="table table-striped table-hover projects">
                <thead>
                    <tr>
                        <th class="text-center">Tên quốc gia</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['nations']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                    <tr>
                        <td class="text-center">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

                        </td>
                        <td class="text-center">
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['num'];?>

                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#nation" onclick="LoadDataForForm(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
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
        $("#DeleteItem").attr("href", "./?mc=nation&site=delete&id=" + id);
    }

    function LoadDataForForm(id) {
        $.post("./?mc=nation&site=ajax_load", { 'id': id }).done(function(data) {
            data = JSON.parse(data);
            console.log(data)
            $("#nation input[name=id]").val(data.id);
            $("#nation input[name=name]").val(data.name);
        });
    }
    <?php echo '</script'; ?>
>
    
<?php }
}
