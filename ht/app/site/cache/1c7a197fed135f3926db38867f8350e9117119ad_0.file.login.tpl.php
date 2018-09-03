<?php
/* Smarty version 3.1.30, created on 2018-08-31 10:02:57
  from "/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b88afe1c08099_25595158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c7a197fed135f3926db38867f8350e9117119ad' => 
    array (
      0 => '/Users/mtd/Sites/thao/viplike/ht/app/site/view/layouts/login.tpl',
      1 => 1535684576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b88afe1c08099_25595158 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/css/demo.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/css/login.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
/site/img/favicon.png">
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center">
                                    <img src="https://cdn6.aptoide.com/imgs/b/3/1/b316e720ac61112d1dbb258f23fe0a99_icon.png?w=50" alt="LIKE">
                                </div>
                                <p class="lead">Đăng nhập</p>
                            </div>
                            <form class="form-auth-small" method="post" action='./?mc=pub&site=postlogin'>
                                <div class="form-group">
                                    <input type="hidden" name='action' value='Login' class="form-control"  placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tài khoản</label>
                                    <input name="username" class="form-control"  placeholder="Tài khoản">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label">Mật khẩu</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name='submit'>ĐĂNG NHẬP</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center">
                                    <img src="https://cdn6.aptoide.com/imgs/b/3/1/b316e720ac61112d1dbb258f23fe0a99_icon.png?w=50" alt="LIKE">
                                </div>
                                <p class="lead">Đăng kí tài khoản</p>
                            </div>
                            <form class="form-auth-small" method="post">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label ">Tài khoản</label>
                                    <input type="email" class="form-control" id="signin-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="signin-password"  placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="signin-password"  placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">ĐĂNG KÝ</button>
                                <div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>
</html>
<?php }
}
