<?php
/* Smarty version 3.1.30, created on 2018-08-11 12:18:50
  from "/Users/mtd/Sites/pknew/app/admin/view/patient/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b6e71ba750547_90147906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f38a4fd46a73b9d3932e606c206757943ea0bc0' => 
    array (
      0 => '/Users/mtd/Sites/pknew/app/admin/view/patient/index.tpl',
      1 => 1533964725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b6e71ba750547_90147906 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="">
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Quản lý bệnh nhân</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="h_content">
            <!-- <div class="form-group form-inline">
              <input class="left form-control">
              <select class="left form-control"><option>Select</option></select>
            </div> -->

            <div class="form-group form-inline">
              <input type="search" class="left form-control" id="key" placeholder="Tên bệnh nhân hoặc SDT" value="<?php echo $_smarty_tpl->tpl_vars['out']->value['key'];?>
">
              <select class="left form-control" id="day"><option value="">Ngày/Tháng</option><?php echo $_smarty_tpl->tpl_vars['out']->value['day'];?>
</select>
            </div>
            <button id="search_btn" type="button" class="btn btn-primary left" onclick="filter();"><i class="fa fa-search"></i></button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateFrom" onclick="add();"><i class="fa fa-pencil"></i> Thêm mới</button>
            <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-check-square-o"></i> Kích hoạt</button> -->
            
            <div class="clearfix"></div>
          </div>

          <!-- start project list -->
          <div class="table-responsive">
              <table class="table table-striped table-hover projects">
                <thead>
                  <tr>
                    
                    <!-- <th>Avatar</th> -->
                    <th>Mã bệnh nhân</th>
                    <th>Họ Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th class="text-right"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                  <tr id="field<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['code'];?>
</td>
                    <td><a href="#"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a> <br /> <small>Tuổi: <?php echo $_smarty_tpl->tpl_vars['data']->value['age'];?>
</small></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['data']->value['phone'];?>
</td>
                    <td class="text-right">
                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#VideoModal" onclick='modal_video_click(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
)' ><i class="fa fa-camera"></i></button>
                      
                      <a type="button" class="btn btn-primary btn-xs" href='./admin?mc=patient&site=detail&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
'><i class="fa fa-info"></i></a>
                      <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#EditForm" onclick="LoadEditData(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
);"><i class="fa fa-pencil"></i></button>
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteForm" onclick="LoadModalDelete(<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
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

<!-- Modal Delete -->
<div class="modal fade" id="DeleteForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa mục này</h4>
      </div>
      <div class="modal-body">Bạn chắc chắn muốn xóa bệnh nhân này chứ?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
        <a type="button" class="btn btn-danger" id="DeleteItem">Xóa</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" id="UpdateFrom">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="title">Thêm bệnh nhân</h4>
      </div>
      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action='./admin?mc=patient&site=create' enctype="multipart/form-data" >
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Họ Tên <span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="name" required="required" class="form-control" placeholder="Họ và Tên">
            </div>
          </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Giới tính</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="checkbox">
                        <label> <input type="radio" name="gender" value="1"> Nam</label>
                        <label> <input type="radio" name="gender" value="0" checked> Nữ</label>
                    </div>
                </div>
            </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" class="form-control" name="email" placeholder="Địa chỉ email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tuổi<span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" class="form-control" name="age" placeholder="Tuổi" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">SDT<span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control" name="phone" pattern="[0-9]\d*" title="Số điện thoại" onkeydown='hide()' onpaste='hide()' onchange="hide()">
            </div>
          </div>
          <div class="row" id='trung' style="display:none">
            <div class='col-md-offset-2'>
                <h6 style="color:red; padding-left: 5px">Số điện thoại này đã được sử dụng: </h6>
                <p style="padding-left: 5px" id='patient_name'>Bệnh nhân: Nguyễn Hải Duy</p>
                <p style="padding-left: 5px" id='patient_address'>Địa chỉ: Cầu Diễn - Hà Nội</p>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!-- <input type="text" class="form-control" name="phone" pattern="[0-9]\d*" title="Số điện thoại"> -->
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
          <button type="button" onclick='validate()' class="btn btn-primary">Lưu lại</button>
          <button type="submit" class="btn btn-warning" name="submit" style="display:none" id='tieptucthem'>Tiếp tục thêm</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->


</div>
<div class="modal fade" tabindex="-1" id="EditForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title" id="title">Chỉnh sửa bệnh nhân</h4>
      </div>
      <form  data-parsley-validate class="form-horizontal form-label-left" method="post" action='./admin?mc=patient&site=edit' enctype="multipart/form-data" >
        <div class="modal-body">

          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type='hidden' name='id'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Họ Tên <span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="name" required="required" class="form-control" placeholder="Họ và Tên">
            </div>
          </div>

            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">Giới tính</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="checkbox">
                        <label> <input type="radio" name="gender" value="1" id='nam'> Nam</label>
                        <label> <input type="radio" name="gender" value="0" id='nu'> Nữ</label>
                    </div>
                </div>
            </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" class="form-control" name="email" placeholder="Địa chỉ email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tuổi<span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" class="form-control" name="age" placeholder="Tuổi" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">SDT<span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control" name="phone" pattern="[0-9]\d*" title="Số điện thoại">
            </div>
          </div>
          <div class="row" id='edit_trung' style="display:none">
            <div class='col-md-offset-2'>
                <h6 style="color:red; padding-left: 5px">Số điện thoại này đã được sử dụng: </h6>
                <p style="padding-left: 5px" >Bệnh nhân: Nguyễn Hải Duy</p>
                <p style="padding-left: 5px" >Địa chỉ: Cầu Diễn - Hà Nội</p>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!-- <input type="text" class="form-control" name="phone" pattern="[0-9]\d*" title="Số điện thoại"> -->
                </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <input class="form-control" type="text" name="address" placeholder="Địa chỉ">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
          <button type="submit" class="btn btn-primary">Lưu lại</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" tabindex="-1" id="VideoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        <h4 class="modal-title">Thêm video cho bệnh nhân</h4>
      </div>
      <form  data-parsley-validate class="form-horizontal form-label-left" method="post" action='./admin?mc=patient&site=add_video' enctype="multipart/form-data" >
        <div class="modal-body">

          <div class="form-group">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type='hidden' name='id'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Video<span style="color:red">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="file" name="video">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Chú thích</label>
            <div class="col-md-8 col-sm-8 col-xs-8">
              <textarea style="width: 350px" name="note" cols="100" rows="8"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Ngày</label>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <input class="form-control"  name="day" id='video_day'>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
          <button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Vui lòng đợi..." onclick="f_save_video();"  id='save_video'>Lưu lại</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/jquery-ui.min.js"><?php echo '</script'; ?>
>




<?php echo '<script'; ?>
>

function f_save_video()
{
 $("#save_video").button('loading');

}

function LoadModalDelete(id)
{
  $("#DeleteItem").attr("href", "./admin?mc=patient&site=delete&id=" + id);
}

function modal_video_click(id)
{
  $("#VideoModal input[name=id]").val(id);
}

function hide()
{
        $("#trung").css("display", "none");
        $("#tieptucthem").css("display", "none");
}

function validate()
{
      var phone = $("#UpdateFrom input[name=phone]").val();
      $.post("./admin?mc=patient&site=ajax_check_phone", {'phone':phone} ).done(function(data){
        data = JSON.parse(data);
        if(data)
        {
            $("#trung").css("display", "block");
            $("#patient_name").html(`Bệnh nhân: ${data.name}`);
            $("#patient_address").html(`Địa chỉ: ${data.address}`);
            $("#tieptucthem").css("display", "inline-block");
        }
        else
            $("#tieptucthem").click();
      })
}

function add()
{
    hide();
    $("#UpdateFrom input[name=phone]").val(123456789);
}

function LoadEditData(id) {
  $.post("./admin?mc=patient&site=ajax_load_patient", {'id' : id}).done(function(data) {
      data = JSON.parse(data);
      console.log(data)
      // return;
      if (data.id)
      {
        $("#EditForm input[name=id]").val(data.id);
        $("#EditForm input[name=name]").val(data.name);
        $("#EditForm input[name=age]").val(data.age);
        if( data.gender == 1)
          $("#nam").attr("checked", "checked");
        else
          $("#nu").attr("checked", "checked");
        $("#EditForm input[name=email]").val(data.email);
        $("#EditForm input[name=phone]").val(data.phone);
        $("#EditForm input[name=address]").val(data.address);
      }
  });
}
function filter()
{
    var key = $("#key").val();
    var day = $("#day").val();
    var url = "./admin?mc=patient";
    // var url = "./admin/benh-nhan/?";
    url += "&key=" + key;
    url += "&day=" + day;
    window.location.href = url;
}
$(document).ready(function(){

    $('#video_day').datepicker({
        format: 'm-d-Y'
    }).datepicker("setDate", new Date());

    // $('#video_day').datepciker({
    //     singleDatePicker: true,
    //     calender_style: "picker_4",
    //     format: 'DD-MM-YYYY'
    // }, function (start, end, label) {
    //     $('#video_day').change();
    // });
})

<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
$(document).ready(function(){
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
