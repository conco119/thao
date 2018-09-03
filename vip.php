<?php
include_once 'inc/head.php';
if(!$loginCheck){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}

extract($_REQUEST);
if(isset($action)){
$return = array('msg' => 'No action');

switch($action)
{
	case 'removeVIP':
		if(isset($id)){
			@$return = $client->_removeVIP($userData, $id);
			break;
		}
	default:
		$return = array('error' => true, 'msg' => 'No action found', 'action' => $_POST);
	break;
}

$msg = $return;

}

?>
<?php
if(@$msg){
    print '<script>alert("'.$msg["msg"].'");window.location="'.$msg["url"].'";</script>';
}
?>

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
                            <select name="speed" class='form-control' >
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

<div class="container" style="margin-top: 70px;">
    <!-- Đã login -->

                <div class="row"><div class="col-lg-3"> <p><h4>Xin chào, <b><?=$userData->username;?></b>.</h4></p>
                <p>Balance: <b style="color:red"><?=number_format($userData->balance);?> đ.</b></p></div>
                <div class="row"><div class="col-lg-12">
                <div class="table-responsive" style="background: #fff;">
       <table class="table table-hover">
                        <thead>
                            <tr>
								<th>#</th>
								<th>UID</th>
								<th class="text-center">Chế độ</th>
								<th class="text-center">Speed</th>
								<th class="text-center">Gói</th>
								<th class="text-center">Server</th>
								<th class="text-center">Like cuối</th>
								<th class="text-center">HSD</th>
                                <th class="text-center" style="width: 104px;">SỬA</th>
								<th class="text-center" style="width: 104px;">XÓA</th>
								<th>Chú thích</th>
							</tr>
                        </thead>

                        <tbody>
                            <?php $j = 1;foreach($client->_getVIP($userData) as $vip){ ?>
                            <tr <?php if($vip->expire <= time()): ?> class="danger" <?php endif; ?> >
                                <td>
                                    <?=$j;?>
                                </td>
                                <td>
                                    <?=$vip->fbid;?>
                                </td>

                                <td class="text-center">
                                    <?php
                                    $cd = json_decode($vip->type);
                                    foreach($cd as $value){
                                        echo '<img src="./img/'. $value.'.png" width="25px"/> ';
                                    }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?=$vip->speed;?>
                                </td>
                                <td class="text-center">
                                    <?php $hihi = $vip->goi; echo $gois[$hihi];?>
                                </td>
                                 <td class="text-center">
                                    <?=$vip->sever;?>
                                </td>
                                <td class="text-center">
                                    <?=date('H:i d/m/y',$vip->last_act);?>
                                </td>

                                <td class="text-center">
                                    <?=($vip->expire- time()) > 0 ? 'Còn ' . number_format(round(($vip->expire- time())/86400)).' ngày' : 'HẾT HẠN';?>
                                </td>


                                <td class="text-center">
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#UpdateForm" onclick="getInfo(<?php echo $vip->id ?>)" >Sửa</button>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-xs" href="?action=removeVIP&id=<?=$vip->id?>" >Xóa</a>
                                </td>
                                 <td>
                                    <?=$vip->name;?>
                                </td>



                            </tr>
                            <?php ++$j;} ?>
                        </tbody>
                    </table>

             </div>

            </div>
        </div>
          <!-- /Đã login MTD-->
    </div>
  <?php
include_once 'inc/foot.php';
?>
