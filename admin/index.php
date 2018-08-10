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
    
</head>

<title>30</title>
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


  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 <!-- Header -->
  <div id="page-wrapper" style="max-width:978px;margin: 0 auto;    padding: 15px;">
      <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="alert alert-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h1><?=countbang('tokens');?></h1>
                                    <div>Tokens</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alert alert-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h1><?=countbang('users');?></h1>
                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="alert alert-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h1><?=countbang('vip');?></h1>
                                    <div>UIDs</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
    </div>
   
     <script src="../theme/jquery.min.js"></script>
     <script src="../theme/bootstrap.min.js"></script>
</body>

</html>
