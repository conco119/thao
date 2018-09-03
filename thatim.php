<?php
include 'inc/init.php';
include "common/include/head.php";
if (!$loginCheck) {
    header("Location: " . 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
    exit;
}

extract($_REQUEST);
if (isset($action)) {
    $return = array('msg' => 'No action');
    switch ($action) {
        case 'addthatim':
            @$return = $tha_tim->create($token, $chedo, $thoihan, $noidung, $note);
            break;
        default:
            $return = array('error' => true, 'msg' => 'No action found', 'action' => $_POST);
            break;
    }
    $msg = $return;
}

$all_thatim = $tha_tim->getAll();

?>
    <?php
if (@$msg) {
    print '<script>alert("' . $msg["msg"] . '");window.location="' . $msg["url"] . '";</script>';
}
?>

        <body>
            <!-- WRAPPER -->
            <div id="wrapper">
                <!-- NAVBAR -->
                <?php include 'common/include/nav.php';?>
                <!-- END NAVBAR -->
                <!-- LEFT SIDEBAR -->
                <?php include 'common/include/sidebar.php';?>
                <!-- END LEFT SIDEBAR -->
                <!-- MAIN -->
                <div class="main">
                    <!-- MAIN CONTENT -->
                    <div class="row" style="margin-left: 15px;">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p style='padding-left:10px;'><b >Cài đặt thả tim</b></p>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method='post'>
                                        <input type="hidden" name="action" value="addthatim">
                                        <div class="form-group text-center">
                                            THẢ TIM TỰ ĐỘNG 10p / 1 LẦN ĐỂ TRÁNH CHECKPOINT.
                                            <br/>
                                            <p>GET TOKEN CÁCH 1 : <a href="/gettoken.php">TẠI ĐÂY</a> </p>
                                            <p>CHECK TOKEN LIVE : <a href="/checkinfo.html">TẠI ĐÂY</a> </p>
                                            <p>Nội dung comment bạn có thể cài nhiều comment bằng cách chèn dấu | giữa mỗi comment. </p>
                                            <p>Ví dụ : comment1|comment2|comment3</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Token*</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="token" required="" class="form-control" placeholder="Token">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hori-pass1" class="col-sm-4 control-label">Chế độ*</label>
                                            <div class="col-sm-7">
                                                <select name="chedo" class="form-control">
                                                    <option value="1">Thả tim</option>
                                                    <option value="2">Thả tim + Auto comment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hori-pass1" class="col-sm-4 control-label">Thời hạn*</label>
                                            <div class="col-sm-7">
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="1" checked="">1 ngày
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="7">7 ngày
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="15">15 ngày
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="30">1 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="60">2 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="90">3 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="120">4 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="150">5 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="180">6 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="210">7 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="240">8 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="270">9 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="300">10 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="330">11 tháng
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="thoihan" value="360">12 tháng
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hori-pass1" class="col-sm-4 control-label">Nội dung comment*</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" name="noidung"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Chú thích</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="note" required="" class="form-control" id="inputEmail3" placeholder="điền bất cứ gì">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Thêm
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <b>Thông tin</b>
                                </div>
                                <div class="panel-body">
                                    <br/> Thả tim hoặc comment : <span style="color:red"><b>700 </b></span> vnđ / 1 ngày.
                                    <br/> Cả 2 chế độ : <span style="color:red"><b>1400 </b></span> vnđ / 1 ngày.
                                    <br/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive" style="background: #fff;">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th data-field="id">
                                                    <div class="th-inner ">#</div>
                                                </th>
                                                <th data-field="name">
                                                    <div class="th-inner ">Token</div>
                                                </th>
                                                <th data-field="date" class="text-center">
                                                    <div class="th-inner ">Chế độ</div>
                                                </th>
                                                    <th data-field="amount" class="text-center">
                                                    <div class="th-inner ">Nội dung</div>
                                                </th>
                                                <th data-field="amount" class="text-center">
                                                    <div class="th-inner ">Thời hạn</div>
                                                </th>
                                                <th data-field="user-status" class="text-center">
                                                    <div class="th-inner ">Chú thích</div>
                                                </th>
                                                <th class="text-center">
                                                    <div class="th-inner ">Trạng thái</div>
                                                </th>
                                                <!-- <th class="text-center">
                                                    <div class="th-inner ">Sửa</div>
                                                </th> -->
                                                <th class="text-center">
                                                    <div class="th-inner ">Xóa</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1?>
                                            <?php while ($row = $all_thatim->fetch_object()): ?>
                                            <tr>
                                                <td>
                                                    <?=$i;?>
                                                </td>
                                                <td>
                                                    <?=strip_str($row->token, 15);?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($row->chedo == 1): ?>
                                                        Thả tim
                                                    <?php else: ?>
                                                        Thả tim + Auto Comment
                                                    <?php endif;?>
                                                </td>
                                                <td class="text-center">
                                                    <?=strip_str($row->noidung, 15);?>
                                                </td>
                                                <td class="text-center">
                                                    <?=gmdate('H:i d/m/y', $row->thoihan);?>
                                                </td>
                                                <td class="text-center">
                                                    <?=strip_str($row->note, 15);?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($row->active == 1): ?>
                                                        <span class="label label-table label-success">Đang chạy</span>
                                                    <?php else: ?>
                                                        <span class="label label-table label-danger">Token die</span>
                                                    <?php endif;?>
                                                </td>
                                                <!-- <td>
                                                <button type="submit" class="btn btn-primary btn-xs xoaid" data="">Sửa</button>
                                                </td> -->
                                                <td class="text-center">
                                                    <a type="submit" class="btn btn-warning btn-xs xoaid" href="./v1.php?mc=thatim&site=delete&id=<?=$row->id?>">Xóa</a>
                                                </td>
                                                <td>
                                                    <?=$vip->note;?>
                                                </td>
                                            </tr>
                                            <?php $i++?>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MAIN -->
                    <div class="clearfix"></div>
                    <?php include 'common/include/footer.php';?>
                    <!-- Modal UpdateFrom -->
                    <div class="modal fade" tabindex="1" id="UpdateForm">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    <h4 class="modal-title" id="title">Chỉnh sửa thông tin</h4>
                                </div>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="./v1.php?mc=vip&site=edit">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="id" value=''>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Chú thích</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input class="form-control" type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Cách thức</label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input checked="" type="checkbox" class="form-check-input" name="type[]" value="LIKE">
                                                <img src="https://likethue.com/assets/img/like.png" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                                <input type="checkbox" class="form-check-input" name="type[]" value="HAHA">
                                                <img src="https://likethue.com/assets/img/haha.svg" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                                <input type="checkbox" class="form-check-input" name="type[]" value="WOW">
                                                <img src="https://likethue.com/assets/img/wow.svg" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                                <input type="checkbox" class="form-check-input" name="type[]" value="ANGRY">
                                                <img src="https://likethue.com/assets/img/angry.svg" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                                <input type="checkbox" class="form-check-input" name="type[]" value="LOVE">
                                                <img src="https://likethue.com/assets/img/love.svg" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                                <input type="checkbox" class="form-check-input" name="type[]" value="SAD">
                                                <img src="https://likethue.com/assets/img/sad.svg" class="img-circle" alt="Cinque Terre" width="27" height="27">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Server</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="server"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Speed</label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select name="speed" class='form-control'>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                </select>
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
                $(document).ready(function() {
                    $("#sidebar-nav .nav li a").attr("class", "");
                    $("#sidebar-nav .nav li a[href='thatim.php']").attr("class", "active");
                })
                </script>
        </body>
        ?>