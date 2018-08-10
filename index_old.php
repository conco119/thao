<?php
require 'inc/head.php';
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
//notification
$notification = $notification_model->get();
//maintenance
$maintenance = $maintenance_model->getMaintainServer();
?>
    <?php
if(@$return){
    print '<script>alert("'.$return["msg"].'");window.location="'.$return["url"].'";</script>';
}
?>
        <div class="container" style="margin-top: 70px;">
            <!-- Chưa login -->
            <?  if(!$loginCheck){?>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Tài khoản</span>
                                        <input type="text" class="form-control" name="username" placeholder="Tài khoản">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Mật khẩu</span>
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="hidden" name="action" value="Login">
                                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Tài khoản</span>
                                        <input type="text" class="form-control" name="username" placeholder="Tài khoản">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Mật khẩu</span>
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Nhập lại</span>
                                        <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="hidden" name="action" value="Register">
                                        <button type="submit" class="btn btn-success">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- /Chưa login -->
                <? }else{ ?>
                    <!-- Đã login -->
                    <div class="row text-center">
                        <h2>BÁO GIÁ</h2>
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
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <div class="container">
                        <center>
                            <h2>THÔNG BÁO </h2></center>
                        <div class="alert alert-success alert-dismissible fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $notification['content']; ?>
                            <!--    </strong> <p>- Chọn gói trước và chọn server sau
   <p>----------------------------
    </strong> <p>- Lưu ý hiện tại facebook chặn 1 số bài không lên like như bên dưới
<p>- Bài share không lên like
<p>- Bài chứa link không lên like
<p>- Đây là thuật toán mới của fb nên tạm thời các bạn thông báo khách vậy nhé .
<p>---------------------------- -->
                        </div>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                        <div class="container">
                            <center>
                                <h2>DANH SÁCH SV BẢO TRÌ</h2></center>
                            <div class="alert alert-danger">
                                <?php foreach ($maintenance as  $value): ?>
                                <h4> <?php echo $value->sv_name . " - gói " . $value->goi; ?> </h4>
                                <?php endforeach; ?>
                                <!-- <a href="#" class="alert-link">-0 </a>. -->
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <p>
                                        <h4>Xin chào, <b><?=$userData->username;?></b>.</h4></p>
                                    <p>Balance: <b style="color:red"><?=number_format($userData->balance);?> Xu.</b></p>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
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
                            <!-- /Đã login -->
                            <?}?>
                        </div>
                        <!-- jQuery -->
                        <script src="./js/jquery-3.3.1.min.js"></script>
                        <!-- Bootstrap Core JavaScript -->
                        <script src="./js/bootstrap.min.js"></script>
                        <script>
                        var gois = <?=json_encode($goirule);?>;
                        var sv = <?=json_encode($client->_getStats());?>;
                        $(function() {
                            $('[name="goi"]').change(function() {
                                var goi = $(this).val();
                                data = '';
                                $(gois[goi]).each(function(a) {
                                    var tengoi = gois[goi][a].split("sv")[1];

                                    var sever = gois[goi][a];
                                    if (sv[sever] < 100) {
                                        data += '<option value="' + gois[goi][a] + '">Sever ' + tengoi + '</option>';
                                    }
                                });

                                $('[name="sever"]').html(data);
                            })
                        })
                        </script>
                        </body>

                        </html>
