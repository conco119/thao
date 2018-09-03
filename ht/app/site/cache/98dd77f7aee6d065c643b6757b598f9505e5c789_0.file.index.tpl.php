<?php
/* Smarty version 3.1.30, created on 2018-08-15 17:41:02
  from "/Users/mtd/Sites/buff/app/site/view/viplike/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b74033eef3b05_16259085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98dd77f7aee6d065c643b6757b598f9505e5c789' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/viplike/index.tpl',
      1 => 1534329659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b74033eef3b05_16259085 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card animated bounceIn">
                    <div class="header">
                        <h2>
                            <i class="fa fa-heartbeat" aria-hidden="true"></i> BUFFF LIKE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="email_address">FB ID (*)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" onchange="update()" id="id" class="form-control" placeholder="Nhập FBID người huởng LIKE ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email_address">Nhập số like</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="user" onchange="update()" class="form-control" placeholder="Số like không được nhỏ hơn 50">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="package-vip" class="control-label">Lựa Chọn Cảm Xúc</label> <br>
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
                                <div class="form-group">
                                    <label for="input" class="control-label">Tốc Độ (LIKE/Phút)</label>
                                    <input type="text" id="speed" value="" onchange="update()" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12">
                                <div class="text-center" style="margin-bottom: 10px;">
                                    <button  style="background-color:#8BC34A !important; color:white" stype="button" class="btn bg-light-green waves-effect" id="buy" onclick="buy()">
                                        <i class="fa fa-shopping-cart"></i> Thực hiện
                                    </button>
                                </div>
                            </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        get_package();
        var _PACKAGE;
        $("#speed").ionRangeSlider({
            min: 1,
            max: 100,
            from: 50
        });
        $('[data-toggle="tooltip"]').tooltip();
    })
    function trim(s){
        while (s.substring(0,1) == "|"){
            s = s.substring(1, s.length);
        }
        while (s.substring(s.length-1, s.length) == "|") {
            s = s.substring(0,s.length-1);
        }
        return s;
    }
    function buy(){
        var id = $("#id").val();
        var user = $("#user").val();
        var package = $("#package-vip").val();
        var speed = $("#speed").val();
        var time = $("#time-vip").val();
        var cx = '';
        $('.filled-in:checked').each(function(){
            var values = $(this).val();
            cx += values+'|';
        })
        if(!id || !user){
            showNotification('bg-red', 'Vui Lòng Điền Đầy Đủ Thông Tin');
            return;
        }
        $("#buy").html('<i class="fa fa-refresh fa-spin"></i> Vui Lòng Đợi');
        $.ajax({
            url     : prefix+modun+ '/modun_post.php',
            type    : 'POST',
            dataType: 'JSON',
            data    : {
                t       : 'buy-vip',
                id      : id,
                user    : user,
                package : package,
                speed   : speed,
                time    : time,
                camxuc  : trim(cx)
            },
            success: (data) => {
                $("#buy").html('<i class="fa fa-shopping-cart"></i> Thanh Toán');
                if (data.error) {
                    showNotification('bg-red', data.msg);
                } else {
                    showNotification('bg-green', data.msg);
                    $("input").val('');
                }
            }
        })
    }
    function get_package(){
        var option = '';
        var table  = '';
        $.ajax({
            url     : prefix+modun+ '/modun_post.php',
            type    : 'POST',
            dataType: 'JSON',
            data    : {
                t           : 'get_name_package',
            },
            success : (data) => {
                _PACKAGE = data;
                $.each(data, (i, item) => {
                    option += '<option value="'+item.name+'">'+item.name+'</option>';
                    table  += '<tr>\
                                    <td>'+item.name+'</td>\
                                    <td>'+number_format(item.price)+'</td>\
                                </tr>';
                })

                setTimeout(function(){
                    $("#package-vip").html(option);
                    $("#table-vip").html(table);
                }, 500);
            }
        })
    }
    function reset(){
        $("input").val('');
        $('select').prop('selectedIndex', 0);
        $("#name-vip").text('NULL');
        $("#limit-like").text('NULL');
        $("#limit-post").text('NULL');
        $("#price").text('NULL');
        $("#name-user").text('NULL');
        $("#id-user").text('NULL');
        $("#speed-like").text('NULL');
        $("#limit-time").text('NULL');
    }
    function update(){
        var id = $("#id").val();
        var user = $("#user").val();
        var package = $("#package-vip").val();
        var speed = $("#speed").val();
        var time = $("#time-vip").val();
        $("#name-vip").text(package);
        $.each(_PACKAGE, (i, item) => {
            if (item.name == package) {
                $("#limit-like").text(item.limit_like + ' Like');
                $("#limit-post").text(item.limit_post + ' Post');
                $("#price").text(number_format(time*item.price) + ' Cash')
            }
        })
        $("#name-user").text(user);
        $("#id-user").text(id);
        $("#speed-like").text(speed+'Like/Phút');
        $("#limit-time").text(time+' Tháng')
    }
<?php echo '</script'; ?>
><?php }
}
