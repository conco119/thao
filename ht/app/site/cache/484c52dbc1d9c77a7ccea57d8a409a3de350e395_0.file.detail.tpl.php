<?php
/* Smarty version 3.1.30, created on 2018-08-12 11:28:05
  from "/Users/mtd/Sites/pknew/app/admin/view/patient/detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b6fb75550ba54_51229365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '484c52dbc1d9c77a7ccea57d8a409a3de350e395' => 
    array (
      0 => '/Users/mtd/Sites/pknew/app/admin/view/patient/detail.tpl',
      1 => 1534048082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b6fb75550ba54_51229365 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bệnh nhân: <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['patient']->value['name'], 'UTF-8');?>
 </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="h_content">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['prefix_admin'];?>
mc=patient" class="btn btn-primary left"><i
                                class="fa fa-arrow-left"></i> Quản lý bệnh nhân</a>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Thông tin bệnh nhân</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class=" col-md-12 col-lg-12 ">
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                            <tr>
                                                                <td>Họ Tên:</td>
                                                                <td><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['patient']->value['name'], 'UTF-8');?>
</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tuổi:</td>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['patient']->value['age'];?>
</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Giới tính: </td>
                                                                <td>
                                                                    <?php if ($_smarty_tpl->tpl_vars['patient']->value['gender'] == 1) {?> Nam <?php } else { ?> Nữ <?php }?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <tr>
                                                                    <td>Địa chỉ: </td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['patient']->value['address'];?>
</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email: </td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['patient']->value['email'];?>
</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Điện thoại</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['patient']->value['phone'];?>
</td>
                                                                </tr>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='col-md-12'>
                        <div class=row>
                            <div class="col-md-offset-1" id='parent-player'>
                                <video controls='controls' id='player' >
                                    <source src="">
                                </video>
                            </div>
                        </div>
                        <br>
                        <div class="row container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ngày khám</th>
                                        <th>Video</th>
                                        <td>Nội dung</td>
                                        <th>Đang phát</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['media_patient']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
                                            <td>
                                                <a id="link-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
                                                   style="cursor: pointer;"
                                                   data-link="<?php echo base_url($_smarty_tpl->tpl_vars['item']->value['media']['path']);?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['media']['name'];?>
"
                                                   onclick="change_video(<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
)"
                                                >Video <?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</a>
                                            </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</td>
                                            <td >
                                                <i id="i-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?> fa fa-play blink <?php } else { ?> '' <?php }?>"></i>
                                            </td>
                                            <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" onclick="delete_video(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)"><i class="fa fa-trash-o"></i></button></td>
                                        </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa mục này</h4>
      </div>
      <div class="modal-body">Bạn chắc chắn muốn xóa video này chứ?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
        <a type="button" class="btn btn-danger" id="DeleteItem">Xóa</a>
      </div>
    </div>
  </div>
</div>



<?php echo '<script'; ?>
>

function delete_video(key)
{
    $("#DeleteItem").attr("href", "./admin?mc=patient&site=delete_video&id=" + key);
}
function change_video(key)
{
        var link  = $(`#link-${key}`).attr("data-link")
        $('#player').remove()
        $('#parent-player').append(`
          <video  controls='controls' id='player'>
            <source src='${link}'>
          </video>
        `)

        var alli = $("i.fa-play");
        alli.attr('class', '');

        $(`#i-${key}`).attr('class', 'fa fa-play blink');
}

$(document).ready(function() {

        // load video onload
        var link  = $('#link-0').attr("data-link")
        $('#player').remove()
        $('#parent-player').append(`
          <video  controls='controls' id='player'>
            <source src='${link}'>
          </video>
        `)

});
<?php echo '</script'; ?>
>

<?php }
}
