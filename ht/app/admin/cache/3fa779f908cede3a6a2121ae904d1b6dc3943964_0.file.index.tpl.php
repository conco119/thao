<?php
/* Smarty version 3.1.30, created on 2018-08-07 19:40:50
  from "/Users/mtd/Sites/pknew/app/admin/view/calender/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b699352863b31_37522568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fa779f908cede3a6a2121ae904d1b6dc3943964' => 
    array (
      0 => '/Users/mtd/Sites/pknew/app/admin/view/calender/index.tpl',
      1 => 1533527237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b699352863b31_37522568 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý lịch làm việc</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="h_content">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateForm" onclick="LoadDataForForm(0);"><i class="fa fa-pencil"></i> Thêm mới</button>

                        <div class="clearfix"></div>
                    </div>
                    <!-- start project list -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Phòng</th>
                                    <th>Thứ 2</th>
                                    <th>Thứ 3</th>
                                    <th>Thứ 4</th>
                                    <th>Thứ 5</th>
                                    <th>Thứ 6</th>
                                    <th>Thứ 7</th>
                                    <th>Chủ nhật</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calenders']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['thu2'];?>
</td>
                                        <td class="text-right" width="15%">
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#EditForm" onclick="LoadDataForForm(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
);"><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" onclick="ConfirmDelete(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
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
                    <!-- end project list -->
                    <div class="paging"><?php echo $_smarty_tpl->tpl_vars['paging']->value['paging'];?>
</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete All -->
<div class="modal fade" id="DeleteForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Xóa mục này</h4>
            </div>
            <div class="modal-body">Bạn chắc chắn muốn xóa mục này chứ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                <a type="button" class="btn btn-danger" id="DeleteItem">Xóa</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal UpdateFrom -->
<div class="modal fade" tabindex="-1" id="UpdateForm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4 class="modal-title">Thêm lịch bác sỹ</h4>
            </div>
            <form data-parsley-validate
                class="form-horizontal form-label-left" method="post" action="./admin?mc=calender&site=create">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Phòng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="room" class="form-control" placeholder="Tên phòng...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu2" class="form-control" placeholder="Thứ 2..." >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu3" class="form-control" placeholder="Thứ 3...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 4</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu4" class="form-control" placeholder="Thứ 4...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 5</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu5" class="form-control" placeholder="Thứ 5...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 6</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu6" class="form-control" placeholder="Thứ 6...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 7</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu7" class="form-control" placeholder="Thứ 7...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Chủ nhật</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="cn" class="form-control" placeholder="Chủ nhật...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal UpdateFrom -->
<div class="modal fade" tabindex="-1" id="EditForm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4 class="modal-title">Chỉnh sửa lịch bác sỹ</h4>
            </div>
            <form data-parsley-validate
                class="form-horizontal form-label-left" method="post" action="./admin?mc=calender&site=edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Phòng</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name='id'>
                            <input type="text" name="room" class="form-control" placeholder="Tên phòng...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 2</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu2" class="form-control" placeholder="Thứ 2..." >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 3</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu3" class="form-control" placeholder="Thứ 3...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 4</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu4" class="form-control" placeholder="Thứ 4...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 5</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu5" class="form-control" placeholder="Thứ 5...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 6</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu6" class="form-control" placeholder="Thứ 6...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Thứ 7</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="thu7" class="form-control" placeholder="Thứ 7...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Chủ nhật</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="cn" class="form-control" placeholder="Chủ nhật...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






<?php echo '<script'; ?>
>


function ConfirmDelete(id)
{
    $("#DeleteItem").attr('href', "./admin?mc=calender&site=delete&id=" + id);
}




function LoadDataForForm(id, category_id) {
    console.log(id, category_id);
    $.post(`./admin?mc=calender&site=ajax_load`, {'id': id}).done(function (data) {
        var data = JSON.parse(data);
        console.log(data);
        $("#EditForm input[name=id]").val(data.id);
        $("#EditForm input[name=room]").val(data.room);
        $("#EditForm input[name=thu2]").val(data.thu2);
        $("#EditForm input[name=thu3]").val(data.thu3);
        $("#EditForm input[name=thu4]").val(data.thu4);
        $("#EditForm input[name=thu5]").val(data.thu5);
        $("#EditForm input[name=thu6]").val(data.thu6);
        $("#EditForm input[name=thu7]").val(data.thu7);
        $("#EditForm input[name=cn]").val(data.cn);
    });
}


<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
$(document).ready(function() {
    if( "<?php echo $_smarty_tpl->tpl_vars['notification']->value['status'];?>
" == "success" || "<?php echo $_smarty_tpl->tpl_vars['notification']->value['status'];?>
" == "error")
    {
        var notice = new PNotify({
            title: "<?php echo $_smarty_tpl->tpl_vars['notification']->value['title'];?>
",
            text: "<?php echo $_smarty_tpl->tpl_vars['notification']->value['text'];?>
",
            type: "<?php echo $_smarty_tpl->tpl_vars['notification']->value['status'];?>
",
            mouse_reset: false,
            buttons: {
                sticker: false,
        }
        });
        notice.get().click(function () {
            notice.remove();
        });
    }
})
<?php echo '</script'; ?>
>
<?php }
}
