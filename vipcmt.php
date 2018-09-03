<?php
include 'inc/init.php';
include "common/include/head.php";
if(!$loginCheck)
    lib_redirect("./login.php");


extract($_REQUEST);
if(isset($submit))
{
    if(isset($fbid, $limit, $month, $content))
    {
        $return = $cmt_model->_addCmt($fbid, $limit, $month, $content);
    }
}

if(@$return)
{
    print '<script>alert("'.$return["msg"].'");window.location="'.$return["url"].'";</script>';
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
                                                    <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body" style="background: #e4dfdf;">
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>FBID</label>
                                                        <input type="text" name="fbid" placeholder="Nhập Facebook ID vào đây" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số comment giới hạn</label>
                                                        <input type="number" name="limit" placeholder="Nhập số comment giới hạn vào đây" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giới hạn số tháng</label>
                                                        <input type="number" name="month" placeholder="Nhập số tháng giới hạn vào đây" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nội dung comment (Mỗi comment một dòng)</label>
                                                        <textarea class='form-control' name="content" id="" cols="30" rows="10">
                                                        </textarea require="">
                                                <div class="modal-footer">
                                                    <div class="text-center">
                                                        <button type="submit" name='submit' class="btn btn-primary">Thêm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
            <!-- END MAIN -->
            <div class="clearfix"></div>
            <?php include 'common/include/footer.php'; ?>
        </div>
        <!-- END WRAPPER -->
        <!-- Javascript -->
        <script src="common/assets/vendor/jquery/jquery.min.js"></script>
        <script src="common/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="common/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="common/assets/scripts/klorofil-common.js"></script>
        <script>
            $(document).ready(function()
            {
                $("#sidebar-nav .nav li a").attr("class", "");
                $("#sidebar-nav .nav li a[href='vipcmt.php']").attr("class", "active");
            })
    </script>
    </body>
