<?php
include_once '../inc/init.php';
if(!$loginCheck || $userData->username != $config['ADMIN_USER']){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}
$linksv = ["http://cmt13.dichvufacebook.info/stat.php"];

$data = $adminlib->_adminStats();

//reading notification
// $notification = fopen("../notification.txt", "r");
$notification = $notification_model->get();

//write notification
extract($_REQUEST);
if(isset($submit_notification, $content))
{
    $notification_model->edit($content);
}

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
                            Quản lý thông báo
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method='post'>
                                <textarea name="content" id="notification" cols="30" rows="10">
                                    <?php echo $notification['content']; ?>
                                </textarea>
                                <button class='btn btn-primary' style='margin-top: 20px' type='submit' name='submit_notification'>Lưu</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="../js/ckeditor/ckeditor.js"></script>
    <script>
    $(document).ready(function() {
        $('#data').DataTable({
            "ajax": 'data.php?mode=vip',
            "initComplete": function() {
                var api = this.api();
                api.$('td').click(function() {
                    api.search($(this).html()).draw();
                })

            },
            "columns": [
                { "data": "id" },
                { "data": "fbid" },
                { "data": "sever" },
                { "data": "owned_by" },
                { "data": "last_act" },
                { "data": "expire" }
            ]
        });
        CKEDITOR.replace( 'notification' );
    });
    </script>
