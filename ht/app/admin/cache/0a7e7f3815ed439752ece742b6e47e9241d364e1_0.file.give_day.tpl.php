<?php
/* Smarty version 3.1.30, created on 2018-08-23 12:54:27
  from "/Users/mtd/Sites/buff/app/site/view/vipsub/give_day.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7e4c13968cc6_23286273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a7e7f3815ed439752ece742b6e47e9241d364e1' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/vipsub/give_day.tpl',
      1 => 1535003664,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7e4c13968cc6_23286273 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row" style='color:black'>
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Chuyển ngày
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix add-package">
                    <div class="col-md-6">
                        <label for="input" class="control-label">Tên tài khoản người nhận</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input  style='font-size:13px' type="text" name='name' class="form-control" placeholder="Nhập tên tài khoản người nhận">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input" class="control-label">Số Lượng</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input style='font-size:13px' type="number" name='soluong' class="form-control" placeholder="Nhập Vào Số Lượng">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                            <button  style="background-color:#8BC34A !important; color:white" stype="button" class="btn has-spinner" onclick="chuyen(this)">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="spinner" style='display:none'><i class="fa fa-refresh fa-spin"></i></span>
                                    Thực hiện
                            </button>
                    </div>
                    <br />
                    <div id="result-gift">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lịch sử chuyển/nhận</h2>
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
                                <th>STT</th>
                                <th>Ngày giờ</th>
                                <th class='text-center'>Chuyển</th>
                                <th>Nhận</th>
                                <th>Tài khoản</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['day_logs']->value, 'data', false, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['created_at'];?>
</td>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['tranfer_user_id'] == $_smarty_tpl->tpl_vars['arg']->value['user']['id']) {?>
                                    <td class='text-center'><i style='color:green' class='glyphicon glyphicon-ok'> </i></td>
                                <?php }?>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['recive_user_id'] == $_smarty_tpl->tpl_vars['arg']->value['user']['id']) {?>
                                        <td class='text-center'><i style='color:green' class='glyphicon glyphicon-ok'> </i></td>
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['account'];?>
</td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['day_count'];?>

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





<?php echo '<script'; ?>
>
    $(document).ready(function(){
        $("#vipsub").attr('class', 'active');
        $("#vipsub ul").css('display', 'block');
        var li = $("#vipsub ul").children()[1];
        $(li).attr("class", "current-page");
    })
// give day
    function chuyen(btn)
    {
        $(btn).attr('disabled', true);
        $(btn).attr('class', "btn has-spinner active");
        $(".spinner").css("display","inline");
        var name = $("input[name=name]").val();
        var soluong = $("input[name=soluong]").val();
        if(name == '') {
            create_notification("error", "Bạn chưa nhập tên tài khoản nhận");
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            $(".spinner").css("display","none");
            return false;
        }
        if(soluong <= 0 )
        {
            create_notification("error", "Số like không được nhỏ hơn 0");
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            $(".spinner").css("display","none");
            return false;
        }
        $.post("./?mc=vipsub&site=ajax_give_day", {"name": name, "soluong": soluong}).done(function(data){
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            $(".spinner").css("display","none");
            data = JSON.parse(data)
            if(data.error)
                create_notification("error", data.message);
            else
                create_notification("success", data.message);
            $("input[name=name]").val("");
            $("input[name=soluong]").val("");
        })
        $(btn).attr('disabled', false);
        $(btn).attr('class', "btn has-spinner");
        $(".spinner").css("display","none");
    }
<?php echo '</script'; ?>
>
<?php }
}
