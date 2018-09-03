<?php
/* Smarty version 3.1.30, created on 2018-08-17 23:31:54
  from "/Users/mtd/Sites/buff/app/site/view/like/give.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b76f87a042b69_56344316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d786c18d2cb6e9b10b92581d940a8e9cdee9eff' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/like/give.tpl',
      1 => 1534514652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b76f87a042b69_56344316 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                        <input type="text" name='name' class="form-control" placeholder="Nhập tên tài khoản người nhận LIKE">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input" class="control-label">Số Lượng</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name='soluong' class="form-control" placeholder="Nhập Vào Số Lượng">
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
        </div>
    </div>
</section>

<?php echo '<script'; ?>
 type="text/javascript">
    function create_notification($type, $text)
    {
        var notice = new PNotify({
            text: $text,
            type: $type,
            mouse_reset: false,
            buttons: {
                sticker: false,
            }
        });
    }
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
