<?php
/* Smarty version 3.1.30, created on 2018-08-14 22:21:23
  from "/Users/mtd/Sites/buff/app/admin/view/user/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b72f373238c60_96501065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a39791221605671b721488068dab7cd5ef8bb8f' => 
    array (
      0 => '/Users/mtd/Sites/buff/app/admin/view/user/profile.tpl',
      1 => 1533460657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b72f373238c60_96501065 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="">
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						Thông tin tài khoản
					</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<div class="col-md-5 col-sm-5 col-xs-12 profile_left">

						<div class="profile_img">

							<!-- end of image cropping -->
							<div id="crop-avatar">
								<!-- Current avatar -->
								<div class="avatar-view" title="Thay đổi avatar">
									<img id="avatar_cur" src="<?php echo base_url($_smarty_tpl->tpl_vars['arg']->value['avatar']);?>
" alt="Avatar">
								</div>

								<!-- Cropping modal -->
								<div class="modal fade" id="avatar-modal">
									<div class="modal-dialog modal-lg">
										<div id="avatar_change" class="modal-content">
											<form class="avatar-form" enctype="multipart/form-data" method="post">
												<div class="modal-header">
													<button class="close" data-dismiss="modal" type="button">&times;</button>
													<h4 class="modal-title" id="avatar-modal-label">Thay đổi avatar</h4>
												</div>
												<div class="modal-body" style="background-color: #F7F7F7;">
													<div class="avatar-body">

														<!-- Upload image and data -->

														<!-- Crop and preview -->
														<div class="row">
															<div style="padding-left: 0;" id="avatar_wrap" class="col-md-7 col-sm-7 col-xs-12">
																<div style="position: relative; width: 100%; margin-top: 0;" id="avatar_wrap_child" class="avatar-wrapper">
																	<img id="avatar_image" style="max-width: 100%" src="<?php echo base_url($_smarty_tpl->tpl_vars['user']->value['avatar']);?>
">
																</div>
															</div>
															<div style="padding-right: 0;" class="col-md-5 col-sm-5 col-xs-12">
																<div class="form-group">
																	<label for="avatarInput" class="col-md-3 col-sm-12 col-xs-12 control-label" style="padding-left: 0; margin-top: 3px;">Tải lên</label>
																	<div class="col-md-9 col-sm-12 col-xs-12" style="padding: 0; margin-bottom: 10px;">
																		<input class="avatar-input" id="avatarInput" name="avatar_file" type="file" onchange="readURL(this);" style="width: 100%;">
																	</div>
																</div>

																<div style="display: block;">
																	<label style="padding-top: 25px; margin-bottom: 0; display: block;" class="control-label">Xem trước</label>
																	<div style="display: inline-block; width: 214px; height: 214px; border: 1px solid #aaa; margin-top: 10px;" class="avatar-preview preview-lg"></div>
																	<div style="display: inline-block; width: 56px; height: 56px; border: 1px solid #aaa; border-radius: 28px;" class="avatar-preview preview-sm"></div>
																</div>

																<br>

																<input name="avatar_x" type="hidden">
																<input name="avatar_y" type="hidden">
																<input name="avatar_width" type="hidden">
																<input name="avatar_height" type="hidden">

																<div class="text-right" style="margin-top: 10px; display: block;">
																	<button id="del_avt_btn" class="btn btn-danger" name="delete_avatar">Xóa avatar hiện tại</button>
																	<button class="btn btn-default" data-dismiss="modal" type="button">Hủy bỏ</button>
																	<button class="btn btn-primary avatar-save" name="avatar_change" type="submit">Lưu lại</button>
																</div>

															</div>
														</div>

													</div>
												</div>
												<!-- <div class="modal-footer">
                                                </div> -->
											</form>
										</div>
									</div>
								</div>
								<!-- /.modal -->

								<!-- Loading state -->
								<div class="loading" tabindex="-1"></div>
							</div>
							<!-- end of image cropping -->

						</div>
						<h3><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</h3>

						<ul class="list-unstyled user_data">
							<li><i class="fa fa-map-marker user-profile-icon"></i>&ensp;<?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
</li>

							<li><i class="fa fa-phone" aria-hidden="true"></i>
								<?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
</li>

							<li class="m-top-xs"><i class="fa fa-envelope-o" aria-hidden="true"></i>
							     <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</a>
							</li>
						</ul>

						<a class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit m-right-xs"></i> Thay đổi thông tin</a>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#password"><i class="fa fa-edit m-right-xs"></i>Thay đổi mật khẩu</a>


					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thay đổi thông tin chung</h4>
      </div>
      <div class="modal-body">
        <form id="edit-profile" method="post" class="form-horizontal">
                <fieldset>

                    <div class="row form-group">
                        <div class="col-lg-2"><label class="control-label" for="firstname">Tên đầy đủ</label></div>
                        <div class="col-lg-10"><div class="controls">
                            <input type="text" class="form-control" name="name" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
">
                        </div></div>
                        <!-- /controls -->
                    </div>
                    <div class="row form-group">
                            <div class="col-lg-2"><label class="control-label" for="selectError3">Sinh nhật</label></div>
                            <div class="col-lg-3">
                                <select id="" name="day" class="form-control required">
                                    <?php echo $_smarty_tpl->tpl_vars['user']->value['birthday']['day'];?>

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <select id="" name="month" class="form-control required">
                                    <?php echo $_smarty_tpl->tpl_vars['user']->value['birthday']['month'];?>

                                </select>
                                </div>
                                <div class="col-lg-4">
                                <select id="" name="year" class="form-control required">
                                    <?php echo $_smarty_tpl->tpl_vars['user']->value['birthday']['year'];?>

                                </select>
                                </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2">
                        <label class="control-label" for="selectError3">Giới tính</label>
                        </div>
                        <div class="col-lg-10">
                            <select id="" name="gender" class="form-control required">
                                <?php echo $_smarty_tpl->tpl_vars['user']->value['gender'];?>

                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-2">
                            <label class="control-label" for="firstname">Địa chỉ</label>
                        </div>
                        <div class="col-lg-10">
                                <textarea type="text" class="form-control" name="address" id="firstname"><?php echo $_smarty_tpl->tpl_vars['user']->value['address'];?>
</textarea>
                        </div>
                    </div>

                    <div class=" row form-group">
                        <div class="col-lg-2"><label class="control-label" for="firstname">Email</label></div>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->

                    <div class="row form-group">
                        <div class="col-lg-2"><label class="control-label" for="firstname">Điện thoại</label></div>
                        <div class="col-lg-10 controls">
                            <input type="text" class="form-control" name="phone" id="firstname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
">
                        </div>
                        <!-- /controls -->
                    </div>
                    <!-- /control-group -->
                    <br /> <br />


                    <div class=" row form-group">
                        <center><button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></center>
                    </div>
                    <!-- /form-actions -->
                </fieldset>
            </form>
      </div>
    </div>
  </div>
</div>


 <!-- Modal mật khẩu -->
 <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thay đổi mật khẩu</h4>
      </div>
      <div class="modal-body">
        <form method="post" class="form-horizontal">
          <div class="row form-group">
            <div class="col-lg-3"><label for="exampleInputEmail1">Nhập mật khẩu cũ</label></div>
            <div class="col-lg-9"> <input type="password" name="pass_old"class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu cũ"></div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3"><label for="exampleInputPassword1">Nhập mật khẩu mới</label></div>
           <div class="col-lg-9"> <input type="password" required name="password"class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu mới"></div>
          </div>
          <div class=" row form-group">
            <div class="col-lg-3"><label for="exampleInputPassword1">Xác nhận mật khẩu</label></div>
            <div class="col-lg-9"> <input type="password" name="Re_password"class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu"></div>
          </div>
         <center><button type="submit" name="pass" class="btn btn-primary">Cập nhật</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/cropping/cropper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['arg']->value['stylesheet'];?>
js/cropping/avatar.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
       function UpdateDate()
        {
             var filter = $("#select_export").val();
             var url = "./admin?mc=user&site=profile";
             url += "&date=" + filter;
             window.location.href = url;
        }
    <?php echo '</script'; ?>
>

<!-- image cropping -->
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
