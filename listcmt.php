<?php
include 'inc/init.php';
include "common/include/head.php";
if(!$loginCheck)
    lib_redirect("./login.php");

extract($_REQUEST);
if(isset($action))
{
    $return = array('msg' => 'No action');

    switch($action)
    {
        case 'removeVIP':
            if(isset($id))
            {
                @$return = $client->_removeCmt($userData, $id);
                break;
            }
        default:
            $return = array('error' => true, 'msg' => 'No action found', 'action' => $_POST);
        break;
    }

    $msg = $return;
}

$vipcmts = $cmt_model->getAll(" WHERE `owned_by` = $userData->id ");

?>
    <?php
if(@$msg){
    print '<script>alert("'.$msg["msg"].'");window.location="'.$msg["url"].'";</script>';
}
?>

        <body>
            <!-- WRAPPER -->
            <div id="wrapper">
                <!-- NAVBAR -->
                <?php include 'common/include/nav.php'; ?>
                <!-- END NAVBAR -->
                <!-- LEFT SIDEBAR -->
                <?php include 'common/include/sidebar.php'; ?>
                <!-- END LEFT SIDEBAR -->
                <!-- MAIN -->
                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="main-content">
                        <div class="container-fluid">
                            <div class="container">
                                <!-- Đã login -->
                                <div class="row">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive" style="background: #fff;">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>FBID</th>
                                                            <th class="text-center">Số comment giới hạn</th>
                                                            <th class="text-center">Số tháng</th>
                                                            <th class="text-center">Ngày hết hạn</th>
                                                            <th class="text-center" style="width: 104px;">SỬA</th>
                                                            <th class="text-center" style="width: 104px;">XÓA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $j = 1;while($vipcmt = $vipcmts->fetch_object()){ ?>
                                                        <tr <?php if($vipcmt->expire
                                                            <=time()): ?> class="danger"
                                                                <?php endif; ?> >
                                                                <td>
                                                                    <?=$j;?>
                                                                </td>
                                                                <td>
                                                                    <?= $vipcmt->fbid; ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo $vipcmt->cmt_limit ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?=$vipcmt->month;?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php echo gmdate('d-m-Y', $vipcmt->expire); ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#UpdateForm" onclick="getInfo(<?php echo $vipcmt->id ?>)">Sửa</button>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a class="btn btn-warning btn-xs" href="./v1.php?mc=cmt&site=delete&id=<?=$vipcmt->id?>">Xóa</a>
                                                                </td>
                                                        </tr>
                                                        <?php ++$j;} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Đã login -->
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN CONTENT -->
                    </div>
                    <!-- END MAIN -->
                    <div class="clearfix"></div>
                    <?php include 'common/include/footer.php'; ?>
                    <!-- Modal UpdateFrom -->
                    <div class="modal fade" tabindex="1" id="UpdateForm">
                        <div class="modal-dialog">
                            <div class="modal-content" style='background: #efeaea'>
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    <h4 class="modal-title" id="title">Chỉnh sửa thông tin</h4>
                                </div>
                                <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="./v1.php?mc=cmt&site=edit">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="id" value=''>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Số cmt giới hạn</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input class="form-control" type="text" name="cmt_limit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Số tháng</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input class="form-control" name="month">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                            <textarea name="content" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Lưu lại</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </div>
                <!-- END WRAPPER -->
                <!-- Javascript -->
                <script src="common/assets/vendor/jquery/jquery.min.js"></script>
                <script src="common/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
                <script src="common/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
                <script src="common/assets/scripts/klorofil-common.js"></script>
                <script>
                function getInfo(id) {
                    $.post("./v1.php?mc=cmt&site=ajax_getinfo", { 'id': id }).done(function(data) {
                        data = JSON.parse(data);
                        console.log(data);
                        if (data.id) {
                            select = '';
                            $("#UpdateForm input[name=id]").val(data.id);
                            $("#UpdateForm input[name=cmt_limit]").val(data.cmt_limit);
                            $("#UpdateForm input[name=month]").val(data.month);
                            $("#UpdateForm textarea[name=content]").val(data.content);
                        }

                    });
                }
                $(document).ready(function(){
                    $("#sidebar-nav .nav li a").attr("class", "");
                    $("#sidebar-nav .nav li a[href='listcmt.php']").attr("class", "active");
                })
                </script>
        </body>
        ?>
