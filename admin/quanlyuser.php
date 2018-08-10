<?php
include_once '../caidats.php';
$checkadmin = (!isset($_SESSION['passadmin']) && empty($_SESSION['passadmin']) && $_SESSION['passadmin'] != $adminpass )? true : false;
extract($_POST);
if(addslashes($passadmin) == $adminpass){
    $_SESSION['passadmin'] = addslashes($passadmin);
    header("Location: ".$home."/admin/");
    exit;
    
}
if($checkadmin){
    echo '<form method="post"><input name="passadmin" placeholder="Nhập pass"/><input type="submit" value="vào"/></form>';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
  

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../theme/bootstrap.min.css" rel="stylesheet">
        
    <style>


.modal-box .btn {
   background-color: #fff;
    border: 1px solid #bbb;
    color: #333;
    -webkit-transition: background-color 1s ease;
    -moz-transition: background-color 1s ease;
    transition: background-color 1s ease;
}

.v-center > div {
  display: table-cell;
  vertical-align: middle;
  position: relative;
  top: -10%;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
@media (min-width: 32em) {

.modal-box { width: 70%; }
}

.modal-box header,
.modal-box .modal-header {
  padding: 1.25em 1.5em;
  border-bottom: 1px solid #ddd;
}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}

a.close {
  line-height: 1;
  font-size: 1.5em;
  position: absolute;
  top: 5%;
  right: 2%;
  text-decoration: none;
  color: #bbb;
}

a.close:hover {
  color: #222;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}
</style>
</head>

<body>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top topnav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
<title>10</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<hr />
<div id="tabs">
  <ul>
     <li><a href="/admin/index.php"><span>Trang Chủ</span></a></li>
    <li><a href="/admin/quanlyuid.php"><span>Quản Lý UID</span></a></li>
    <li><a href="/admin/quanlyuser.php"><span>Quản Lý User</span></a></li>
    <li><a href="/admin/log_tien.php"><span>Log Tiền</span></a></li>

  </ul>
</div>
</body>
</html>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 <!-- Header -->
  <div id="page-wrapper" style="max-width:978px;margin: 0 auto;    padding: 15px;">
      <div class="row">
    <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Quản lý người dùng</h5>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                       <th>Pass</th>
                        <th>Tiền</th>
                        <th>Tạo lúc</th>
                        <th>Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $i = 0;foreach(_getUSER() as $hihi){ ?>
                            <tr>
                                <td>
                                    <?=$i?>
                                </td>
                                <td>
                                    <?=$hihi->username?>
                                </td>
                                 <td>
                                    <?=$hihi->password?>
                                </td>
                                  <td>
                                    <?=number_format($hihi->money)?> đ
                                </td>
                                
                                  <td>
                                    <?=date('H:i d/m/y',$hihi->time_reg)?>
                                </td>
                                <td>
                              <button class="btn btn-default" data-modal-id="congtien" data="<?=$hihi->id?>" data->Cộng tiền</button>
                              <button class="btn btn-default" data-modal-id="changepass" data="<?=$hihi->id?>">Đổi pass</button>
                                <form method="post" style="display: inline;"><input name="id" value="<?=$hihi->id?>" type="hidden"><input name="action" value="xoauser" type="hidden"> <button type="submit" id="deluser<?=$hihi->id?>" class="btn btn-default">Xóa</button></form>
                                </td>
                            </tr>
                            <?php ++$i;} ?>
                    
                    
                </tbody>
            </table>

        </div>
       

    </div>
</div>
   
      
    </div> 
<div id="changepass" class="modal-box">
  <header> <a href="javascript:void(0);" class="js-modal-close close">×</a>
    <h3>Đổi mật khẩu</h3>
  </header>
  <div class="modal-body">
      <form method="post" id="formpopup">
          
                                        <div class="form-group">
                                            <label>Nhập mật khẩu mới</label>
                                            
                                            <input class="form-control" name="newpass">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                            <input class="form-control" name="id" value="" type="hidden">
                                            <input class="form-control" name="action" value="changepass" type="hidden">
                                           <button  class="btn btn-default" type="submit">OK</button>
                                           
                                        </div>
                                        
      </form>
     </div>
  <footer> <a href="javascript:void(0);" class="btn btn-small js-modal-close">Close</a> </footer>
</div>
     <div id="congtien" class="modal-box">
  <header> <a href="javascript:void(0);" class="js-modal-close close">×</a>
    <h3>Cộng tiền</h3>
  </header>
  <div class="modal-body">
      <form method="post" id="formpopup">
          
                                        <div class="form-group">
                                            <label>Cộng thêm</label>
                                            
                                            <input class="form-control" name="money" type="number">
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                            <input class="form-control" name="id" value="" type="hidden">
                                            <input class="form-control" name="action" value="congtien" type="hidden">
                                           <button  class="btn btn-default" type="submit">OK</button>
                                           
                                        </div>
                                        
      </form>
     </div>
  <footer> <a href="javascript:void(0);" class="btn btn-small js-modal-close">Close</a> </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="../theme/bootstrap.min.js"></script>
          <script>
$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox +' input[name="id"]').val($(this).attr('data'));
		$('#'+modalBox).fadeIn($(this).data());
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
  $('form').submit(function(){
        $.post('<?=$adminurl;?>api.php',$(this).serialize()).done(function(a){
            alert(a.msg);
            window.location = window.location;
        }).fail(function(){
            alert('Lỗi');
           window.location = window.location;
        })
        return false
    })
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();
 
});
</script>

</body>

</html>