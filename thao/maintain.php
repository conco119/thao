<?php
include_once '../inc/init.php';
if(!$loginCheck || $userData->username != $config['ADMIN_USER']){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}
$linksv = ["http://cmt13.dichvufacebook.info/stat.php"];
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
extract($_REQUEST);

if(isset($submit))
{
    if($type == "add")
    {

        $maintenance_model->create($server, $goi);
        reload();
    }
    if($type == 'remove')
    {
        $maintenance_model->delete($id);
        reload();
    }
}
$maintain_sv = $maintenance_model->getMaintainServer();
// ---------------
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
                                    <div class="huge">
                                        <?=number_format($data['data']->total_user);?>
                                    </div>
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
                                    <div class="huge">
                                        <?=number_format($data['data']->total_vipactive);?>
                                    </div>
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
                                    <div class="huge">
                                        <?=number_format($data['data']->total_vipinactive);?>
                                    </div>
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
                                    <div class="huge">
                                        <?=number_format($data['data']->thunhap);?>
                                    </div>
                                    <div>Tổng thu nhập ATM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <?php require_once './include/menu.php'; ?>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <table id="data" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Server</th>
                                        <th>Gói</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach($goirule as $k => $servers): ?>
                                    <?php foreach($servers as  $server): ?>
                                    <tr>
                                        <th>
                                            <?= $count ?>
                                        </th>
                                        <th>
                                            <?= $server ?>
                                        </th>
                                        <th>
                                            <?= $k ?>
                                        </th>
                                        <th>
                                            <?php  $check = 0; ?>
                                            <?php foreach($maintain_sv as  $sv): ?>
                                            <?php if($sv->sv_name == $server && $sv->goi == $k): ?>
                                            <?php $check = 1 ?>
                                            <form method="post" onsubmit="return active()">
                                                <button type="submit" name='submit' class="btn order-status btn-danger btn-xs order-status">Bảo trì</button>
                                                <input type="hidden" name='id' value='<?php echo $sv->id; ?>'>
                                                <input type="hidden" name='type' value='remove'>
                                            </form>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php if($check == 0): ?>
                                            <form method="post" onsubmit="return active()">
                                                <button type="submit" name='submit' class="btn order-status btn-success btn-xs order-status">Hoạt động</button>
                                                <input type="hidden" name='server' value='<?php echo $server; ?>'>
                                                <input type="hidden" name='goi' value='<?php echo $k; ?>'>
                                                <input type="hidden" name='type' value='add'>
                                            </form>
                                            <?php endif; ?>
                                        </th>
                                    </tr>
                                    <?php $count++; ?>
                                    <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
    function active() {
        if (confirm(`Thay đổi trạng thái?`)) {
            return true;
        }
        return false;
    }
    $('#data').DataTable()
    </script>
