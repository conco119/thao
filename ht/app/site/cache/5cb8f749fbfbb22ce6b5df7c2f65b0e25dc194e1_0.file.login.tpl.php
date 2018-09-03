<?php
/* Smarty version 3.1.30, created on 2018-08-18 20:21:28
  from "/Users/mtd/Sites/buff/app/site/view/pub/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b781d58a5a287_16683012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb8f749fbfbb22ce6b5df7c2f65b0e25dc194e1' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/pub/login.tpl',
      1 => 1534598485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b781d58a5a287_16683012 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Vietnamfb.com</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="./?mc=pub&site=postLogin">
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Tên đăng nhập <span style='color:red'>* </span></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="name" placeholder="Nhập tên tài khoản" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Mật khẩu<span style='color:red'> * </span></label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập password" />
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Đăng nhập</button>
                </div>
                <div class="login-register">
                    <p> Bạn chưa có tài khoản? </p>
                    <h6><a href="./?mc=pub&site=get_register">Đăng ký</a></h6>
                </div>
            </form>
        </div>
    </div>
</div>
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
