<?php
include 'inc/init.php';
include "common/include/head.php";
if(!$loginCheck)
{
    lib_redirect("./login.php");
}
?>
<?php
$notification = $notification_model->get();
$maintenance = $maintenance_model->getMaintainServer();
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
                    <!-- OVERVIEW -->
                    <!-- END OVERVIEW -->
                    <div class="row">
                        <div class="col-md-12">
                        <!-- PANEL NO PADDING -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <b><h2 class="panel-title" style="color:red">Báo giá</h2></b>
                                    <table class="table">
                                        <thead>
                                            <th class="text-center">TÊN GÓI</th>
                                            <th class="text-center">BẢNG GIÁ THEO NGÀY</th>
                                            <th class="text-center">BẢNG GIÁ THEO THÁNG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="info">
                                                <tr>
                                                    <td>Gói Vip 1</td>
                                                    <td>600 Xu / 1 ngày</td>
                                                    <td>20.000 Xu / 1 tháng</td>
                                                </tr>
                                                <tr class="info">
                                                    <tr>
                                                        <td>Gói Vip 2</td>
                                                        <td>1500 Xu / 1 ngày</td>
                                                        <td>50.000 Xu / 1 tháng</td>
                                                    </tr>
                                                    <tr class="danger">
                                                        <td>Gói Vip 3</td>
                                                        <td>3000 Xu / 1 ngày</td>
                                                        <td>100.000 Xu / 1 tháng</td>
                                                    </tr>
                                                    <tr class="danger">
                                                        <td>Gói Vip 4</td>
                                                        <td>5000 Xu / 1 ngày</td>
                                                        <td>150.000 Xu / 1 tháng</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td>Gói Vip 5</td>
                                                        <td>6000 Xu / 1 ngày</td>
                                                        <td>200.000 Xu / 1 tháng</td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td>Gói Vip 6</td>
                                                        <td>10.000 Xu / 1 ngày</td>
                                                        <td>300.000 Xu / 1 tháng</td>
                                                    </tr>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END PANEL NO PADDING -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <!-- TODO LIST -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color:red">Thông báo</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                        <!-- notification here -->
                                    <?php echo $notification['content']; ?>
                                </div>
                            </div>
                            <!-- END TODO LIST -->
                        </div>
                        <div class="col-md-5">
                            <!-- TIMELINE -->
                            <div class="panel panel-scrolling">
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="color:red">Danh sách bảo trì server</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled activity-list">
                                    <?php foreach ($maintenance as  $value): ?>
                                        <li>
                                            <p><?php echo $value->sv_name; ?>
                                            <span class="timestamp">Gói <?php echo $value->goi; ?></span></p>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- END TIMELINE -->
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
        $(document).ready(function(){
            $("#sidebar-nav .nav li a").attr("class", "");
            $("#sidebar-nav .nav li a[href='index.php']").attr("class", "active");
        })
    </script>
</body>

</html>
