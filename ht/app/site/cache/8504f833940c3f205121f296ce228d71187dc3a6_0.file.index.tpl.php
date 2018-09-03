<?php
/* Smarty version 3.1.30, created on 2018-08-23 12:54:03
  from "/Users/mtd/Sites/buff/app/site/view/vipsub/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7e4bfbe648c8_18414434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8504f833940c3f205121f296ce228d71187dc3a6' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/vipsub/index.tpl',
      1 => 1535003641,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7e4bfbe648c8_18414434 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="" style='color:black'>
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List Uid VIP SUB</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="h_content">
            <div class="form-group form-inline">
              <p class='left'> <b>Chú ý:</b>  </p>

            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addnew"><i class="fa fa-pencil"></i> Thêm mới</button>
            <div class="clearfix"></div>
          </div>

          <!-- start project list -->
          <div class="table-responsive">
              <table class="table table-striped table-hover projects">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Name</th>
                    <th>Sub hiện tại</th>
                    <th >Sub gốc</th>
                    <th >Sub đã tăng</th>
                    <th >Ngày mua</th>
                    <th >Ngày hết hạn</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vipcmts']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                  <tr id="field<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['fbid'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['current_sub'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['original_sub'];?>
</td>
                    
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['current_sub']-$_smarty_tpl->tpl_vars['data']->value['original_sub'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['created_at'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['expire'];?>
</td>
                    <td class="text-right">
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#giahan" onclick="giahan(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
)"><i class="fa fa-plus"></i></button>
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


<!-- ADD NEW -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title"">Thêm UID mới</h4>
      </div>
      <div class="modal-body">
        <form action="./?mc=vipsub&site=create" method="post">
            <label>UID</label>
            <input type='text' name='uid' class='form-control'>
          <div class="form-group">
              <label>Số ngày cần thuê</label>
              <input type='text' name='day' class='form-control'>
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
            <button type="submit" class="btn btn-success" id='plus_like'>Thêm</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Add Money -->
<div class="modal fade" id="giahan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gia hạn</h4>
      </div>
      <div class="modal-body">
        <form action="./?mc=vipsub&site=giahan" method="post">
            <label id='label_uid'>UID</label>
            <input type='text' name='uid' class='form-control' disabled>
            <input type='hidden' name='id'>
          <div class="form-group">
              <label>Số ngày cần gia hạn thêm</label>
              <input type='number' name='day' class='form-control'>
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
            <button type="submit" class="btn btn-success" id='plus_like'>Thêm</button>
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
        <h4 class="modal-title" id="myModalLabel">Xóa mục này</h4>
      </div>
      <div class="modal-body">Bạn chắc chắn muốn xóa mục này chứ?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
        <a class="btn btn-danger" id="DeleteItem">Xóa</a>
      </div>
    </div>
  </div>
</div>


<?php echo '<script'; ?>
>

$(document).ready(function(){
  $("#vipsub").attr('class', 'active');
  $("#vipsub ul").css('display', 'block');
  var li = $("#vipsub ul").children()[0];
  $(li).attr("class", "current-page");
})

function Delete(id)
{
  $("#DeleteItem").attr("href", "./admin?mc=user&site=delete&id=" + id);
}

function giahan(id)
{
  $.post("./?mc=vipsub&site=ajax_load_vipsub", {'id' : id}).done(function(data) {
    data = JSON.parse(data)
    console.log(data);
    $("#giahan input[name=id]").val(data.id);
    $("#giahan input[name=uid]").val(data.fbid);
  })
}

function LoadDataForForm(id) {
  $.post("./?mc=vipsub&site=ajax_load_vipsub", {'id' : id}).done(function(data) {
        data = JSON.parse(data);
        if (data.id == undefined)
        {
          $("#demo-form2").attr('action', "./admin?mc=vipsub&site=create");
          $("#UpdateFrom input[name=id]").val(0);
          $("#UpdateFrom input[name=fbid]").val('');
          $("#UpdateFrom input[name=day]").val(0);
          $("#title").html('Thêm UID');
        }
        else
        {
          $("#demo-form2").attr('action', "./admin?mc=vipsub&site=edit");
          $("#UpdateFrom input[name=id]").val(data.id);
          $("#UpdateFrom input[name=fbid]").val(data.name);
          $("#UpdateFrom input[name=day]").val(data.username);
          $("#title").html('Gia hạn ' + data.fbid);
        }
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
><?php }
}
