<?php
include_once 'inc/head2.php';
if(!$loginCheck){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}

extract($_REQUEST);
if(isset($action)){
$return = array('msg' => 'No action');

switch($action){
	case 'addUID':
		if(isset($videoId,$viewers,$viewers_per_1,$viewers_per_2,$time_per_1,$time_per_2)){
			@$return = $lstream->tangview($userData, $videoId,$viewers,$viewers_per_1,$viewers_per_2,$time_per_1,$time_per_2);
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
    print '<script>alert("'.$msg["msg"].'");window.location=window.location;</script>';
}
?>
<div class="container" style="margin-top: 70px;">
    <!-- Đã login -->
       
       
       
       
       
        	
	   
				<div class="row text-center"><h2>BÁO GIÁ VIEW VIDEO</h2>
  
  <table class="table">
    <thead>
     
         
        <th class="text-center">TÊN GÓI</th>
       
        <th class="text-center">SỐ VIEW</th>
     
      </tr>
    </thead>
    <tbody>
        
     
      
     <tr class="danger">
        <td>Gói view</td>
    
       <td>1 view / 10 rik ( tối đa 1 triệu view )</td>

      </tr>
       <tr class="danger">
 
    

      
  
      
      
     
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
                         <div class="form-group"> <label>ID video</label> <input type="text" name="videoId" placeholder="4" class="form-control" required=""> </div>
                         <div class="form-group"> <label>Lượt views</label> <input type="number" name="viewers" placeholder="4" class="form-control" required=""> </div>
                         <div class="form-group"> Mỗi lượt tăng <input type="number" name="viewers_per_1" value="50" min="50" max="1000" required=""> đến <input type="number" name="viewers_per_2" value="100" min="50" max="1000" required=""> người xem</div>
                         <div class="form-group"> Mỗi lượt tăng cách nhau <input type="number" name="time_per_1" value="10" min="10" max="60" required=""> đến <input type="number" name="time_per_2" value="60" min="10" max="60" required=""> giây</div>
                         <div class="form-group text-center"> <button type="submit" class="btn btn-primary">Thêm ID</button></div> 
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
								<th class="text-center">#</th>
								<th>Video ID</th>
								<th class="text-center">View cần tăng</th>
								<th class="text-center">Đã tăng</th>
								<th class="text-center">Tạo lúc</th>
								<th class="text-center">Trạng thái</th>
							
							</tr>
                        </thead>

                        <tbody>
                            <?php $j = 1;foreach($lstream->thongkeviews($userData) as $vip){ ?>
                            <tr>
                               <td class="text-center"><?=$j;?></td>
                                 <td><?=$vip->videoId;?></td>
                                 <td class="text-center"><?=$vip->views;?></td>
                                 <td class="text-center"> <?=$vip->views_finish;?></td>
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
  <?php
include_once 'inc/foot.php';
?>