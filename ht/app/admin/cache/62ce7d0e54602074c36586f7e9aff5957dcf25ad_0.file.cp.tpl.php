<?php
/* Smarty version 3.1.30, created on 2018-08-18 10:43:02
  from "/Users/mtd/Sites/buff/app/site/view/user/cp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7795c6612274_73005503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62ce7d0e54602074c36586f7e9aff5957dcf25ad' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/site/view/user/cp.tpl',
      1 => 1534563781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7795c6612274_73005503 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container">
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
						<br>
            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="email" class="form-control" disabled value="<?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['username'];?>
">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id='old_password'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="email" class="form-control" disabled value="<?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['phone'];?>
">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Mật khẩu mới</label>
                                <input type="password" class="form-control" id='new_password'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">FBID</label>
                                <input type="email" class="form-control" disabled value="<?php echo $_smarty_tpl->tpl_vars['arg']->value['user']['fbid'];?>
">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputEmail1">Nhập lại mật khẩu mới</label>
																<input type="password" class="form-control" id='re_new_password'>
                            </div>
                        </div>
                        </div>
												<br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" onclick="change()" class="btn btn-primary next-step">Đổi mật khẩu</button></li>
                        </ul>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>

<?php echo '<script'; ?>
>
		String.prototype.count=function(s1) {
				return (this.length - this.replace(new RegExp(s1,"g"), '').length) / s1.length;
		}
		function change()
		{
			var old_password = $("#old_password").val();
			var new_password = $("#new_password").val();
			var re_new_password = $("#re_new_password").val();
			if(!old_password || !new_password || !re_new_password ) {
				create_notification(false, "Bạn chưa nhập mật khẩu");
				return;
			}
			var data = {old_password, new_password, re_new_password}
			$.post("./?mc=user&site=change_password", data).done(function(data){
				data = JSON.parse(data)
				if(data.error)
					create_notification('error', data.message);
				else
					create_notification('success', data.message);
			})
		}
<?php echo '</script'; ?>
>
<?php }
}
