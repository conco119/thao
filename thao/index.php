<?php
include_once '../inc/init.php';
if(!$loginCheck || $userData->username != $config['ADMIN_USER']){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}
$linksv = ["http://cmt13.dichvufacebook.info/stat.php"];

$data = $adminlib->_adminStats();



?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<div class="container">
    <?php
    foreach($linksv as $stt1 => $link){
    $stat = json_decode(file_get_contents($link));
    $stt = $stt1 + 1;
    $sv = 'sv'.$stt;
    echo '<p>Token còn lại sv'.$stt.': ' . $stat->$sv.'</p>';
}
?>
<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=number_format($data['data']->total_user);?></div>
                                    <div>Người dùng</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=number_format($data['data']->total_vipactive);?></div>
                                    <div>UID đang hoạt động</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=number_format($data['data']->total_vipinactive);?></div>
                                    <div>UID hết hạn</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=number_format($data['data']->thunhap);?></div>
                                    <div>Tổng thu nhập ATM</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- <br/><div class="row"><div class="col-lg-12"><a href="user.php"><button class="btn btn-primary">Quản lý user</button></a>
             <a href="atm.php"><button class="btn btn-primary">Quản lý ATM</button></a>
            <a href="hethong.php"><button class="btn btn-primary">Quản lý LOG</button></a>
              <a href="/napthe/his.php"><button class="btn btn-primary">Quản lý Thẻ</button></a>
              <a href="./thongbao.php"><button class="btn btn-primary">Quản lý thông báo</button></a>
              <a href="./maintain.php"><button class="btn btn-primary">Bảo trì server</button></a>
            </div></div><br/> -->
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <?php require_once './include/menu.php'; ?>
                </div>
            </div>
            <br>
            <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                        <div class="panel-heading">
                            Quản lý tài khoản
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <table id="data" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="width:100%">
        <thead>
            <tr>
                 <th>#</th>
                <th>UID</th>
                <th>Sever</th>
                <th>Sở hữu</th>
                <th>Gói</th>
                <th>Like cuối</th>
                <th>Hết hạn</th>
            </tr>
        </thead>

    </table>
    </div>
    </div>
        </div>
    </div>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#data').DataTable( {
        "ajax": 'data.php?mode=vip',
        "initComplete": function () {
            var api = this.api();
            api.$('td').click(function(){
                api.search($(this).html()).draw();
            })
             },
        "columns": [
            { "data": "id" },
            { "data": "fbid" },
            { "data": "sever" },
            { "data": "owned_by" },
            { "data": "goi" },
            { "data": "last_act" },
            { "data": "expire" }
        ]
    } );
} );
</script>
