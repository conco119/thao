<?php
include_once 'func.php';
include_once '../configs.php';


if(!$loginCheck){
    header('Location: /');
    exit;
}


$con = mysqli_connect($config['host'],$config['user'], $config['pass'], $config['dbname']);




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
                            <div class="panel-heading">Chi tiết nạp
            </div>
                            <div class="panel-body">
                                Vietcombank : ABC
                                STK : xx
                                Nội dung: <?=$server?>_<?=strtolower($userData->username)?>
                                <br />
                                <a href="check.php">Check giao dịch</a>
                                
                            </div>
                            </div></div></div>
                            
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
                
                
                ?>
                
                <form role="form" id="card-charing">
                <table class="table table-striped table-bordered">
                    <tbody>                        
                        

                                    <tr>
                                                                           <td><img src="vcb.php?image=<?=$matches[1][0]?>">                <input type="hidden" name="key" value="<?=$matches[1][0]?>"></td>
                                        <td><input type="text" id="captcha" class="form-control border-input" value="" name="captcha" style="border: 1px solid #ccc;"></td>
                                    </tr>
                               
               
                                    
                                    
                                   
                                    
                                </tbody>
                            </table><br>
            				<center>
            				<button id="sub" form="form1" class="btn btn-success" type="submit">Kiểm tra</button>   
            				</center>
                        </form>
             
                                
                                
</div></div></div></div>                    
    <div class="panel panel-info ">
            <div class="panel-heading">
                <h5 class="panel-title">Lịch sử nạp tiền</h5>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tiền</th>
                        <th>Mã Giao Dịch</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                       <?php $abc = mysqli_query($con,"SELECT * FROM `ATM` WHERE `username` = '".$userData->username."' ORDER BY `id` DESC");

                    ?>
                    
                    
                     <?php $i = 1;
                     
                     while ($hihi = mysqli_fetch_assoc($abc)) {
                    ?>
                            <tr>
                                <td>
                                    <?=number_format($hihi['cash'])?>
                                </td>
                                <td>
                                    <?=$hihi['thamchieu']?>
                                </td>
                                
                                  <td>
                                   Nạp thành công <?=number_format($hihi['cash'])?> đ
                                </td>
                                
                                  <td>
                                    <?=date('d-m-Y H:m:s',$hihi['thoigian'])?>
                                </td>
                                
                            </tr>
                            <?php ++$i;} ?>
                                        
                    
                                         
                    
                </tbody>
            </table>

        </div>
       

    </div>



</div>
<script>
      $(document).ready(function () {


          

		$("#sub").on('click',function(){



 
          $('#sub').html("ĐANG XỬ LÝ...");


                        
                              
                  $.ajax({
                  type: "POST",
                  cache: false,
                  url: "check.php",
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