<?php
/* Smarty version 3.1.30, created on 2018-08-12 18:44:51
  from "/Users/mtd/Sites/pknew/app/admin/view/post/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b701db3e1fa53_34414319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e03ce736a6af8b5e7d62127e15acc7f0472b67ce' => 
    array (
      0 => '/Users/mtd/Sites/pknew/app/admin/view/post/index.tpl',
      1 => 1534074289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b701db3e1fa53_34414319 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="">
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
		            <h2>Quản lý bài viết</h2>
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
                                    <th>Tiêu đề bài viết</th>
                                    <th>Hình ảnh</th>
                                    <th>Thuộc danh mục</th>
									<th class="text-right">Trạng thái</th>
                                    <th class="text-right">Nổi bật</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                                    <tr>
                                        <td>
											<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>

                                        </td>
                                        <td>
                                            <img width='50px' src="<?php echo base_url($_smarty_tpl->tpl_vars['data']->value['media']['path']);?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['media']['name'];?>
">
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['data']->value['category']['name'];?>
</td>
                                        <td class="text-center">
                                            <?php if ($_smarty_tpl->tpl_vars['data']->value['status'] == 1) {?>
                                                <a href='./admin?mc=post&site=active_status&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
' type="button" class="btn btn-success btn-xs btn-status"><i class="fa fa-check"></i></a>
                                            <?php } else { ?>
                                                <a href='./admin?mc=post&site=active_status&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
' type="button" class="btn btn-danger btn-xs btn-status"><i class="fa fa-close"></i></a>
                                            <?php }?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($_smarty_tpl->tpl_vars['data']->value['is_hot'] == 1) {?>
                                                <a href='./admin?mc=post&site=is_hot&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
' type="button" class="btn btn-success btn-xs btn-status"><i class="fa fa-check"></i></a>
                                            <?php } else { ?>
                                                <a href='./admin?mc=post&site=is_hot&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
' type="button" class="btn btn-danger btn-xs btn-status"><i class="fa fa-close"></i></a>
                                            <?php }?>
                                        </td>
                                        <td class="text-right" width="15%">
											<a href='./admin?mc=post&site=imagepost&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
'><button type="button" class="btn btn-default btn-xs" title="Hình ảnh bài viết"><i class="fa fa-image"></i></button><a/>
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#EditForm" title="Sửa thông tin bài viết" onclick="LoadDataForForm(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['category_id'];?>
);"><i class="fa fa-pencil"></i></button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" title="Xóa bài viết" onclick="ConfirmDelete(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
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
                <h4 class="modal-title">Thêm bài viết mới</h4>
            </div>
            <form data-parsley-validate
                class="form-horizontal form-label-left" method="post" action="./admin?mc=post&site=add_post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục bài viết</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="category_id">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'item', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề bài viết</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="title" required="required" class="form-control" placeholder="Tiêu đề bài viết...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit_product" name="submit">Lưu lại</button>
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
                <h4 class="modal-title">Chỉnh sửa bài viết</h4>
            </div>
            <form data-parsley-validate
                class="form-horizontal form-label-left" method="post" action="./admin?mc=post&site=edit_post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name='id'>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Danh mục bài viết</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="category_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề bài viết</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="title" required="required" class="form-control" placeholder="Tiêu đề bài viết...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit_product" name="submit">Lưu lại</button>
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
    $("#DeleteItem").attr('href', "./admin?mc=post&site=delete&id=" + id);
}

$(document).on('hidden.bs.modal', '.modal', function () {
	$('.modal:visible').length && $(document.body).addClass('modal-open');
});




$('#key, #category').keypress(function( event ){
      if ( event.which == 13 ) {
         $('#search_btn').trigger('click');
      }
});



function filter() {
    var key = $("#key").val();
    var category = $("#category").val();

    var url = "./admin?mc=product&site=index";
    url += "&category=" + category;
    url += "&key=" + key;
    window.location.href = url;
}

function LoadDataForForm(id, category_id) {
    console.log(id, category_id);
    $.post(`./admin?mc=post&site=ajax_load`, {'id': id, "category_id": category_id}).done(function (data) {
        var data = JSON.parse(data);
        console.log(data);
        $("#EditForm input[name=id]").val(data.id);
        $("#EditForm input[name=title]").val(data.title);
        $("#EditForm select[name=category_id]").html(data.category);
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
