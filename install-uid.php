<?php
include "common/include/head.php";
include 'inc/init.php';
if(!$loginCheck)
    lib_redirect("./login.php");

extract($_REQUEST);
if(isset($action))
{
    switch($action)
    {
        case 'addVIP':
            if(isset($fbid, $name,$type,$speed,$goi,$expire,$sever)){
                if($goi == null || $sever == null)
                {
                    $return = [
                    'success' => true,
                    'msg' => 'Vui lòng chọn gói và sever'
                ];
                }
                else
                {
                    $return = $client->_addVIP($userData, $fbid, $name,$type,$speed,$goi,$expire,$sever);
                }
            break;
            }
        case 'logout':
            if($loginCheck)
            {
                $return = $client->_logout($_SESSION['userData']);
            }
            else
            {
                $return = [
                    'success' => true,
                    'msg' => 'Logout!!!'
                ];
            }
            session_destroy();
            foreach($_SESSION as $key => $value)
            {
                unset($_SESSION[$key]);
            }
            break;
        default:
            $return = array('error' => true, 'msg' => 'No action found','url'=>'./', 'action' => $_POST);
            break;
    }
}

if(@$return){
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
                                        <div class="panel-body" style="background: #dedbdb;">
                                            <form method="POST">
                                                <input type="hidden" name="action" value="addVIP">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>UID</label>
                                                        <input type="text" name="fbid" placeholder="4" class="form-control" required=""> </div>
                                                    <div class="form-group">
                                                        <label>Gói</label>
                                                        <select name="goi" class="form-control">
                                                            <option value="">Chọn gói sử dụng</option>
                                                            <option value="1">Gói 1 Từ 20 đến 100 like / 1 post</option>
                                                            <option value="2">Gói 2 Từ 100 đến 200 like / 1 post</option>
                                                            <option value="3">Gói 3 Từ 300 đến 400 like / 1 post</option>
                                                            <option value="4">Gói 4 Từ 500 đến 600 like / 1 post</option>
                                                            <option value="5">Gói 5 Từ 700 đến 800 like / 1 post</option>
                                                            <option value="6">Gói 6 Từ 1000 đến 1200 like / 1 post</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Thời hạn / ngày</label>
                                                        <input type="text" name="expire" placeholder="1" class="form-control" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cách thức</label>
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
                                                        <img src="https://likethue.com/assets/img/sad.svg" class="img-circle" alt="Cinque Terre" width="27" height="27"> </div>
                                                    <div class="form-group">
                                                        <label>Tốc độ</label>
                                                        <select name="speed" class="form-control">
                                                            <option value="5">5 lượt like / 2 phút</option>
                                                            <option value="10">10 lượt like / 2 phút</option>
                                                            >
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sever còn trống:</label>
                                                        <select name="sever" class="form-control">
                                                            <option value="">Vui lòng chọn gói trước</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Chú thích:</label>
                                                        <input type="text" name="name" placeholder="Viết gì đó ví dụ ngày hết hạn" class="form-control" required=""> </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Thêm VIP</button>
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
        var gois = <?=json_encode($goirule);?>;
        $(function(){
            $('[name="goi"]').change(function(){
                var goi = $(this).val();
                data = '';
               $(gois[goi]).each(function(a) {
                   var tengoi = gois[goi][a].split("sv")[1];
                   data+= '<option value="'+gois[goi][a]+'">Sever '+tengoi+'</option>';
                });

                $('[name="sever"]').html(data);
            })
        })
        $(document).ready(function()
        {
            $("#sidebar-nav .nav li a").attr("class", "");
            $("#sidebar-nav .nav li a[href='install-uid.php']").attr("class", "active");
        })
    </script>
    </body>
