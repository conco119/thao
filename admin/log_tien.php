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
                <h5 class="panel-title">Quản lý log nạp tiền</h5>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                       
                        <th>Số tiền</th>
                        <th>seri</th>
                         <th>mã thẻ</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $i = 1;foreach(_getlogtien() as $hihi){ ?>
                            <tr>
                                <td>
                                    <?=$i?>
                                </td>
                                <td>
                                    <?=$hihi->username?>
                                </td>
                                
                                  <td>
                                   + <?=number_format($hihi->menhgia)?> đ
                                </td>
                                    <td>
                                    <?=$hihi->seri?>
                                </td>
                                  <td>
                                    <?=$hihi->mathe?>
                                </td>
                             
                                 <td>
                                    <?=date('H:i d/m/y',$hihi->thoigian)?>
                                </td>
                            </tr>
                            <?php ++$i;} ?>
                    
                    
                </tbody>
            </table>

        </div>
       

    </div>
</div>
   
      
    </div> 

     
  
 <script src="../theme/jquery.min.js"></script>
     <script src="../theme/bootstrap.min.js"></script>


</body>

</html>