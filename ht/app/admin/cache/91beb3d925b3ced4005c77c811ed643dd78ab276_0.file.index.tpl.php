<?php
/* Smarty version 3.1.30, created on 2018-08-23 11:08:53
  from "/Users/mtd/Sites/buff/app/site/view/buff/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7e3355643e74_24127364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91beb3d925b3ced4005c77c811ed643dd78ab276' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/buff/index.tpl',
      1 => 1534997330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7e3355643e74_24127364 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="row">
    <div class="col-md-6 col-xs-12">
        <div class="row clearfix">
                <div class="card animated bounceIn">
                    <div class="header">
                        <h2>
                            <i class="fa fa-heartbeat" aria-hidden="true"></i> BUFFF LIKE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="email_address">FB ID</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input style='font-size:13px' type="text" id="id" class="form-control" placeholder="FBID người huởng LIKE ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email_address">Nhập số like</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input style='font-size:13px' type="text" id="like_number" class="form-control" placeholder="Số phải lớn hơn 50">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="package-vip" class="control-label">Lựa Chọn Cảm Xúc</label>
                                    <br>
                                    <input name="camxuc[]" checked type="checkbox" class="filled-in" id="like" value="LIKE" />
                                    <label for="like" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/like.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Thích"></label>
                                    <input name="camxuc[]" type="checkbox" class="filled-in" id="love" value="LOVE" />
                                    <label for="love" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/love.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Yêu Thích"></label>
                                    <input name="camxuc[]" type="checkbox" class="filled-in" id="haha" value="HAHA" />
                                    <label for="haha" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/haha.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Cười Lớn"></label>
                                    <input name="camxuc[]" type="checkbox" class="filled-in" id="wow" value="WOW" />
                                    <label for="wow" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/wow.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Ngạc Nhiên"></label>
                                    <input name="camxuc[]" type="checkbox" class="filled-in" id="sad" value="SAD" />
                                    <label for="sad" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/sad.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Buồn"></label>
                                    <input name="camxuc[]" type="checkbox" class="filled-in" id="angry" value="ANGRY" />
                                    <label for="angry" style="margin-right: 20px;"><img src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
images/reaction/angry.png" style="width:24px" data-toggle="tooltip" title="" data-original-title="Phẫn Nộ"></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-inline">
                                    <label for="input" class="control-label">Tốc Độ (LIKE/Phút)</label>
                                    <select class='form-control' name='speed'>
                                        <option value='10'>10</option>
                                        <option value='20'>20</option>
                                        <option value='30'>30</option>
                                        <option value='40'>40</option>
                                        <option value='50'>50</option>
                                        <option value='60'>60</option>
                                        <option value='70'>70</option>
                                        <option value='80'>80</option>
                                        <option value='90'>90</option>
                                        <option value='100'>100</option>
                                        <option value='101'>Siêu nhanh</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12 text-center">
                                <button style="background-color:#8BC34A !important; color:white" stype="button" class="btn has-spinner" id="buy" onclick="buff(this)">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="spinner"><i class="fa fa-refresh fa-spin"></i></span> Thực hiện
                                </button>
                            </div>
                            <div class="col-md-12">
                                <p><b>Chú ý: </b> Vào website: <i><a href='https://commentpicker.com/facebook-post-id-finder.php' target='_blank'>https://commentpicker.com/facebook-post-id-finder.php</a></i> để chuyển từ link bài viết sang ID bài viết </p>
                                <p>- Tốc độ LIKE/PHÚT là số lượng like mà bài viết nhận được mỗi phút</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lịch sử buff</h2>
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
                                <th>Like đã buff</th>
                                <th>FBID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['buff_logs']->value, 'data', false, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['data']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['created_at'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['like_buffed'];?>
</td>
                                <td>
                                <a href="https://facebook.com/<?php echo $_smarty_tpl->tpl_vars['data']->value['fbid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['fbid'];?>
</a>
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
                <div id='buff' class="paging"><?php echo $_smarty_tpl->tpl_vars['paging']->value['paging'];?>
</div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Chuyển LIKE
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix add-package">
                    <div class="col-md-6">
                        <label for="input" class="control-label">Tên tài khoản người nhận LIKE</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input  style='font-size:13px' type="text" name='name' class="form-control" placeholder="Nhập tên tài khoản người nhận LIKE">
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
                            <button  style="background-color:#8BC34A !important; color:white" stype="button" class="btn has-spinner"  id="buy" onclick="chuyen(this)">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="spinner"><i class="fa fa-refresh fa-spin"></i></span>
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
                <h2>Lịch sử chuyển/nhận like</h2>
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
                                <th class='text-center'>Chuyển LIKE</th>
                                <th>Nhận LIKE</th>
                                <th>Tài khoản</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['like_logs']->value, 'data', false, 'i');
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
                                <?php } else { ?>
                                    <td></td>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['data']->value['recive_user_id'] == $_smarty_tpl->tpl_vars['arg']->value['user']['id']) {?>
                                    <td class='text-center'><i style='color:green' class='glyphicon glyphicon-ok'> </i></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php }?>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['account'];?>
</td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['like_count'];?>

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
 type="text/javascript">

$(document).ready(function(){
    $("#bufflike").attr('class', 'active');
})

// buff like
function trim(s) {
    while (s.substring(0, 1) == "|") {
        s = s.substring(1, s.length);
    }
    while (s.substring(s.length - 1, s.length) == "|") {
        s = s.substring(0, s.length - 1);
    }
    return s;
}

function buff(btn) {
    $(btn).attr('disabled', true);
    $(btn).attr('class', "btn has-spinner active");
    var like_number = $("#like_number").val();
    var react_type = '';
    var speed = $("select[name=speed]").val();
    var id = $("#id").val();
    $('.filled-in:checked').each(function() {
        react_type += $(this).val() + "|";
    })
    if (id == '') {
        create_notification("error", "Bạn chưa nhập FBID hoặc link bài viết");
        $(btn).attr('disabled', false);
        $(btn).attr('class', "btn has-spinner");
        return false;
    }
    if (like_number < 50) {
        create_notification("error", "Số like không được nhỏ hơn 50");
        $(btn).attr('disabled', false);
        $(btn).attr('class', "btn has-spinner");
        return false;
    }
    if (react_type == '') {
        create_notification("error", "Chọn ít nhất 1 cảm xúc");
        $(btn).attr('disabled', false);
        $(btn).attr('class', "btn has-spinner");
        return false;
    }
    react_type = trim(react_type);
    var data = { react_type, speed, like_number, id }
    console.log(data)
    $.post("./?mc=buff&site=bufflike", { data }).done(function(dt) {
        $(btn).attr('disabled', false);
        $(btn).attr('class', "btn has-spinner");
        var vl = JSON.parse(dt)
        if (vl.error)
            create_notification("error", vl.message);
        else
            create_notification("success", vl.message);
        //console.log(vl)
    })
}
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
// give like
    function chuyen(btn)
    {
        $(btn).attr('disabled', true);
        $(btn).attr('class', "btn has-spinner active");
        var name = $("input[name=name]").val();
        var soluong = $("input[name=soluong]").val();
        if(name == '') {
            create_notification("error", "Bạn chưa nhập tên tài khoản nhận LIKE");
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            return false;
        }
        if(soluong <= 0 )
        {
            create_notification("error", "Số like không được nhỏ hơn 0");
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            return false;
        }
        $.post("./?mc=like&site=ajax_give", {"name": name, "soluong": soluong}).done(function(data){
            $(btn).attr('disabled', false);
            $(btn).attr('class', "btn has-spinner");
            data = JSON.parse(data)
            if(data.error)
                create_notification("error", data.message);
            else
                create_notification("success", data.message);
            $("input[name=name]").val("");
            $("input[name=soluong]").val("");
        })
    }
<?php echo '</script'; ?>
>
<?php }
}
