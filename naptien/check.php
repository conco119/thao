<?php
include_once 'func.php';
include_once '../configs.php';


if(!$loginCheck){
    $msg = array('msg' => 'Bạn chưa đăng nhập');
    echo json_encode($msg);
    exit;
}


$con = mysqli_connect($config['host'],$config['user'], $config['pass'], $config['dbname']);
function sql(){
    global $config;

    return new mysqli($config['host'],$config['user'], $config['pass'], $config['dbname']);
}
function check($thamchieu,$username){
    global $con;
    $abc = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS `total` FROM `ATM` WHERE  `thamchieu` = '".$thamchieu."' AND `username` = '".$username."'"));
    return $abc['total'];
    
    
}
// Xử lí post qua trang kia 
if(isset($_POST['captcha']) && $_POST['captcha']){

 

    header("Content-type: application/json; charset=utf-8");

    

    $cook = $_SESSION['cookie'];

    $post = 'username=9747973a33&pass=Yeukodoithay@1&captcha='.$_POST['captcha'].'&captcha-guid1='.$_POST['key'];
    $result = curl('https://www.vietcombank.com.vn/ibanking2015/345d44c37255d94c99260f1f39295094/Account/Login',$post,'',$cook);


    preg_match_all('/<a href="\/ibanking2015\/(.+?)">here<\/a>/', $result[1], $matches);
    $AID = '07A040530215CB403DE37F9F74D2AA24';
    $cc = '6CB8A6162AD03406F454150DB9BE2110';
    $result = curl('https://www.vietcombank.com.vn/ibanking2015/'.$matches[1][0],false,'',$cook);

    echo getcookie($result);
    preg_match_all("/var basePath='\/IBanking2015\/(.+?)';/", $result[1], $matcc);

    $result = curl('https://www.vietcombank.com.vn/ibanking2015/'.$matcc[1][0].'/thongtintaikhoan/taikhoan/chitiettaikhoan?aid='.strtolower($AID),false,'',$cook);

    $cook1 = getcookie($result[0]);
    preg_match_all('/<input name=__RequestVerificationToken type=hidden value=(.+?)>/', $result[1], $matches1);
    $RequestVerificationToken = $matches1[1][0];
    $post = 'ToKenData=&__RequestVerificationToken='.$RequestVerificationToken.'&TaiKhoanTrichNo='.$AID.'%7C'.$cc.'&MaLoaiTaiKhoanEncrypt='.$cc.'&SoDuHienTai=&LoaiTaiKhoan=&LoaiTienTe=&AID='.strtolower($AID).'&NgayBatDauText=&NgayKetThucText=';
    $cook .= $cook1;
    $result = curl('https://www.vietcombank.com.vn/IBanking2015/'.$matcc[1][0].'/ThongTinTaiKhoan/TaiKhoan/GetThongTinChiTiet',$post,'',$cook);


    $response = json_decode($result[1],true);
    $tiengui = $response['DanhSachTaiKhoan'][0]['SoDuKhaDung'];
    $ToKenData = $response['TokenData'];


    $post = 'ToKenData='.$ToKenData.'&__RequestVerificationToken='.$RequestVerificationToken.'&TaiKhoanTrichNo='.$AID.'%7C'.$cc.'&MaLoaiTaiKhoanEncrypt='.$cc.'&SoDuHienTai='.$SoDuHienTai.'&LoaiTaiKhoan=TK_D&LoaiTienTe=VND&AID='.$AID.'&NgayBatDauText=&NgayKetThucText=';
    $result = curl('https://www.vietcombank.com.vn/IBanking2015/'.$matcc[1][0].'/ThongTinTaiKhoan/TaiKhoan/ChiTietGiaoDich',$post,'',$cook);
    //thông tin phản hồi
    $response = json_decode($result[1],true);
        
        foreach($response['ChiTietGiaoDich'] as $value){
            if($value['SoTienGhiCo'] != '-'){
                if(check($value['SoThamChieu'],$userData->username) == 0){
                    if(preg_match('/'.strtolower($server).''.strtolower($userData->username).'/',strtolower($value['MoTa']))){
                        
                   $amount =  implode('',number_in_string($value['SoTienGhiCo']));
        
    
    
                       sql()->query('UPDATE `users` SET `balance` =`balance` + '.($amount * 160 / 100).' WHERE `username` = "'.$userData->username.'"');
                       sql()->query('INSERT INTO `ATM` (`username`,`cash`,`thamchieu`,`thoigian`) VALUES("'.$userData->username.'","'.($amount * 160 / 100).'","'.$value['SoThamChieu'].'","'.time().'")');
                           echo json_encode(array('err'=>0,'msg'=>'Cộng thành công '.$value['SoTienGhiCo']));

                        die();
                    }
    
                }
                
            }
            
        }
        
    echo json_encode(array('err'=>1,'msg'=>'Chưa phát sinh giao dịch'));
    die();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nạp thẻ</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/jquery-1.9.1.min.js"></script>

    <script src="https://shopmeou.vn/public/js/sweetalert.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://shopmeou.vn/public/css/sweetalert.css">    
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div id="wrapper">
<div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                <a href="../"><button class="btn btn-info">Trang chủ</button>   </a>
                              <a href="../v1/his.php"><button class="btn btn-info">Lịch Sử Nạp Thẻ</button>   </a>
   
    
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">Kiểm tra giao dịch
            </div>
                            <div class="panel-body">
                                
                                
               <?php
               
               
                $result = curl('https://www.vietcombank.com.vn/IBanking2015/55c3c0a782b739e063efa9d5985e2ab4/Account/Login');
                
                $cook = getcookie($result[0]);
                
                
                
                preg_match_all('/<img id=captchaImage style=margin-right:6px src="\/IBanking2015\/captcha\.ashx\?guid=(.+?)" alt=CAPTCHA width=87 height=25>/', $result[1], $matches);
                $_SESSION['cookie'] = $cook;
                
                
                
                echo '<form action="check.php" method="post">
                <img src="vcb.php?image='.$matches[1][0].'">
                <input type="hidden" name="key" value="'.$matches[1][0].'">
                Nhập Captcha
                <input type="text" name="captcha">
                <input type="submit" value="Submit">
                
                </form>';
                
                
                ?>
                                
                                
</div></div></div></div>





</div>
<center><iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSr6L05ZKcvS9xVECpAa8sREgwF9lWM_3WHaZB7998k-D4yOhk-j9S1lvQqkSMjS5ipbcJX8_jfq4B9/embed?start=false&loop=false&delayms=3000" frameborder="0" width="740" height="539" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> <div class="container"></center>
<script>
      $(document).ready(function () {


          

		$("#sub").on('click',function(){



 
          $('#sub').html("ĐANG XỬ LÝ...");


                        
                              
                  $.ajax({
                  type: "GET",
                  cache: false,
                  url: "api.php",
                  data: $('#card-charing').serialize(),
                  processData: false,
                  dataType: "text",
                  success: function(data) {
                      var data1 = $.parseJSON(data);
                        if(data1.err == 0){
                             swal('Thành công', data1.msg, 'success');

                        } else {
                            swal('Lỗi', data1.msg, 'error');

                        }


                         
                  },      
                  complete: function(){ 
                                $('#sub').html("Nạp thẻ");

                  },
                   error: function(request, error) {    
                    //  alert(error);     
                   }
                }); 



                


        });

  });
</script>


</body>
</html>