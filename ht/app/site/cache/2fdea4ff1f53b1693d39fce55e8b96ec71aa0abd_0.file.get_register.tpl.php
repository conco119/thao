<?php
/* Smarty version 3.1.30, created on 2018-08-25 17:46:38
  from "/Users/mtd/Sites/buff/app/site/view/pub/get_register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b81338e1f7217_74416632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fdea4ff1f53b1693d39fce55e8b96ec71aa0abd' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/pub/get_register.tpl',
      1 => 1535192583,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b81338e1f7217_74416632 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Vietnamfb.com</h1>
                <hr />
                <div>
                </div>
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="#">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Tên đăng nhập <span style='color:red'>* </span></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Nhập tên tài khoản" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Số điện thoại</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="phone" id="phone"  placeholder="Số điện thoại của bạn"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">UID facebook cửa bạn</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook-f" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="fbid" id="fbid"  placeholder="UID facebook của bạn"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Mật khẩu<span style='color:red'> * </span></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Nhập password" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Nhập lại mật khẩu<span style='color:red'>* </span></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Nhập lại password" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type='button' onclick='push();' class="btn btn-primary btn-lg btn-block login-button">Đăng ký</button>
                </div>
                <div class="login-register">
                    <h6><a href="./?mc=pub&site=login">Đăng nhập</a></h6>
                    </div>
            </form>
        </div>
    </div>
</div>


<?php echo '<script'; ?>
>
function push()
{
    var username = $("#username").val();
    var phone = $("#phone").val();
    var fbid = $("#fbid").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    if(!username) {
        create_notification('error', "Tài khoản không được để trống");
        return;
    }
    if(password != confirm || !password || !confirm) {
        create_notification('error', "Mật khẩu không trùng nhau");
        return;
    }
    $.post("./?mc=pub&site=post_register",{username, phone, fbid, password, confirm}).done(function(data) {
        data = JSON.parse(data)
        console.log(data)
        if(data.error)
            create_notification('error', data.message);
        else
        {
            create_notification('success', data.message);
            setTimeout(function(){
             window.location = "./";
            },1000);

        }
    })
}
<?php echo '</script'; ?>
>


<?php }
}
