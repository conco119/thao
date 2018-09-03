<?php
include 'inc/init.php';
include "common/include/head.php";
if(!$loginCheck){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}

extract($_REQUEST);
if(isset($action)){
$return = array('msg' => 'No action');

switch($action){
	case 'addUID':
		if(isset($uid,$viewers,$month)){
			@$return = $lstream->adduid($userData, $uid,$viewers,$month);
			break;
		}
	default:
		$return = array('error' => true, 'msg' => 'No action found', 'action' => $_POST);
	break;


}

$msg = $return;

}

if(@$msg){
    print '<script>alert("'.$msg["msg"].'");window.location=window.location;</script>';
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
                    <div class="container" style="margin-top: 70px;">
    <!-- Đã login -->



				<div class="row text-center"><h2>BÁO GIÁ MẮT</h2>

  <table class="table">
    <thead>


        <th class="text-center">TÊN GÓI</th>

        <th class="text-center">SỐ MẮT</th>
        <th class="text-center">BẢNG GIÁ THEO THÁNG</th>
      </tr>
    </thead>
    <tbody>

         <tr class="info">
        <tr>
        <td>Gói Vip 1</td>

        <td>100 mắt</td>
       <td>150.000 rik / 1 tháng</td>
      </tr>
      <tr class="info">
      <tr>
        <td>Gói Vip 2</td>

          <td>200 mắt</td>
       <td>300.000 rik / 1 tháng</td>
      </tr>

     <tr class="danger">
        <td>Gói Vip 3</td>

          <td>300 mắt</td>
        <td>450.000 rik / 1 tháng</td>
      </tr>
       <tr class="danger">
        <td>Gói Vip 4</td>

          <td>400 mắt</td>
         <td>600.000 rik / 1 tháng</td>
      </tr>
      <tr class="info">
        <td>Gói Vip 5</td>

          <td>500 mắt</td>
        <td>750.000 rik / 1 tháng</td>
      </tr>
      <tr class="info">
        <td>Gói Vip 6</td>

          <td>600 mắt</td>
         <td>900.000 rik / 1 tháng</td>
      </tr>

              <td>Gói Vip xxx </td>

          <td>xxx mắt</td>
         <td>x 1k5 /1 mắt / 1 tháng</td>
      </tr>


                   <td>Gói Vip 5000 </td>

          <td>5000 mắt</td>
         <td>7tr500 rik / 1 tháng</td>
      </tr>




      </tr>
    </tbody>
  </table></div>













                <div class="row"><div class="col-lg-3"> <p><h4>Xin chào, <b><?=$userData->username;?></b>.</h4></p>
                <p>- Số dư hiện có : <b style="color:red"><?=number_format($userData->lstream_balance);?> Rik.</b></p>
                 <p>- Lưu ý : Tiền <b>Rik</b> là tiền dành riêng cho dịch vụ tăng mắt - tăng view </b></p></div>
                <div class="col-lg-9">
                     <div class="panel panel-default">
                         <div class="panel-body">
                    <form method="POST">
                         <input type="hidden" name="action" value="addUID">
                         <div class="form-group"> <label>UID</label> <input type="text" name="uid" placeholder="4" class="form-control" required=""> </div>
                         <div class="form-group"> <label>Số mắt</label> <input type="number" name="viewers" placeholder="4" class="form-control" required=""> </div>
                         <div class="form-group"> <label>Thời hạn(tháng)</label> <input type="number" name="month" placeholder="4" class="form-control" required=""> </div>
                         <div class="form-group text-center"> <button type="submit" class="btn btn-primary">Thêm UID</button></div>
                         </form>
                         </div>
                </div>
                </div>
                </div>
                <div class="row"><div class="col-lg-12">
                <div class="table-responsive" style="background: #fff;">
       <table class="table table-hover">
                        <thead>
                            <tr>
								<th>#</th>
								<th>UID</th>
								<th class="text-center">Tên</th>
								<th class="text-center">Hạn dùng</th>
								<th class="text-center">Số mắt</th>
								<th class="text-center">Live hôm nay</th>
								<th class="text-center">Tạo lúc</th>
								<th class="text-center">Trạng thái</th>

							</tr>
                        </thead>

                        <tbody>
                            <?php $j = 1;foreach($lstream->thongke($userData) as $vip){ ?>
                            <tr>
                               <td class="text-center"><?=$j;?></td>
                                 <td><?=$vip->uid;?></td>
                                 <td class="text-center"><?=$vip->name;?></td>
                                 <td class="text-center"> <?=date('H:i d/m/y',$vip->vip_end);?></td>
                                 <td class="text-center"><?=$vip->viewers;?></td>
                                 <td class="text-center"><?=$vip->livevideo_today;?></td>

                                 <td class="text-center"><?=date('H:i d/m/y',$vip->create_time);?></td>
                                 <td class="text-center"><?=$vip->status;?></td>
                            </tr>
                            <?php ++$j;} ?>
                        </tbody>
                    </table>

             </div>

            </div>
        </div>
          <!-- /Đã login -->
    </div>
                    <!-- END MAIN -->
                    <div class="clearfix"></div>
                    <?php include 'common/include/footer.php'; ?>
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
                var gois = <?=json_encode($goirule);?>;
                $(function() {
                    $('[name="goi"]').change(function() {
                        var goi = $(this).val();
                        data = '';
                        $(gois[goi]).each(function(a) {
                            var tengoi = gois[goi][a].split("sv")[1];
                            data += '<option value="' + gois[goi][a] + '">Sever ' + tengoi + '</option>';
                        });

                        $('[name="sever"]').html(data);
                    })
                })

                function getInfo(id) {
                    $.post("./v1.php?mc=vip&site=getInfoVip", { 'id': id }).done(function(data) {
                        data = JSON.parse(data);
                        console.log(data);
                        var types = JSON.parse(data.type)
                        console.log(types);
                        if (data.id) {
                            select = '';
                            $("#UpdateForm input[name=id]").val(data.id);
                            $("#UpdateForm input[name=name]").val(data.name);
                            $("#UpdateForm input[name=speed]").val(data.speed);
                            $(gois[data.goi]).each(function(index, value) {
                                select += `<option value='${value}'`;
                                if (value == data.sever)
                                    select += `selected>${value} </option>`;
                                else
                                    select += `>${value} </option>`;
                                $("#UpdateForm select[name=server]").html(select);
                            });
                            for (type of types) {
                                switch (type) {
                                    case "LIKE":
                                        $("#UpdateForm input[value=LIKE]").attr("checked", "checked");
                                        break;
                                    case "HAHA":
                                        $("#UpdateForm input[value=HAHA]").attr("checked", "checked");
                                        break;
                                    case "WOW":
                                        $("#UpdateForm input[value=WOW]").attr("checked", "checked");
                                        break;
                                    case "ANGRY":
                                        $("#UpdateForm input[value=ANGRY]").attr("checked", "checked");
                                        break;
                                    case "LOVE":
                                        $("#UpdateForm input[value=LOVE]").attr("checked", "checked");
                                        break;
                                    case "SAD":
                                        $("#UpdateForm input[value=SAD]").attr("checked", "checked");
                                        break;
                                    default:
                                        console.log("NOPE");
                                        break;
                                }
                            }
                        }

                    });
                }
                $(document).ready(function() {
                    $("#sidebar-nav .nav li a").attr("class", "");
                    $("#sidebar-nav .nav li a[href='vip-live.php']").attr("class", "active");
                })
                </script>
        </body>
        ?>