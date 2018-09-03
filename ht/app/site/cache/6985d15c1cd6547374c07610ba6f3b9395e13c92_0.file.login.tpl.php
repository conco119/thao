<?php
/* Smarty version 3.1.30, created on 2018-08-14 22:18:42
  from "/Users/mtd/Sites/buff/app/admin/view/pub/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b72f2d2601684_18982967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6985d15c1cd6547374c07610ba6f3b9395e13c92' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/admin/view/pub/login.tpl',
      1 => 1533548724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b72f2d2601684_18982967 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="">
    <a class="hiddenanchor" id="toregister"></a> <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <form method="post" action="./admin?mc=pub&site=postLogin">
                    <h1>Đăng nhập</h1>
                    <div>
                        <input type="text" autofocus class="form-control text-center" name="username" placeholder="Tên đăng nhập" required value='admin'/>
                    </div>
                    <div>
                        <input type="password" class="form-control text-center" name="password" placeholder="Mật khẩu" required  value='12345'/>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-default submit" name="submit" value="Đăng nhập">
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                        <div>
                        </div>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
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
