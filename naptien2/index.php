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



           
            
            <body>

    <div class="infomation_col" style="width: 100%;">
        <div style="box-sizing:border-box;font-size:20px;width:100%;display:inline-block;padding:12px;float:left;background-color:rgb(244,244,244);margin-bottom: 20px;"><img alt="" style="border:0px;box-sizing:border-box;float:left;margin-right: 8px;" class="CToWUd"><span style="font-size: 16px;font-weight: bold;margin-top: 7px;display: inline-block;color: #64C306;">
	- HƯỚNG DẪN NẠP TIỀN QUA VIETCOMBANK TỰ ĐỘNG </span></div>
        <h2 class="_t1">
         <p> + Khi Chuyển Khoản Thành Công Sẽ Được + 5% vào tài khoản
          <p> + Nếu chuyển khoản không đúng thông tin bên dưới sẽ không được cộng tiền
          <p> + Hệ thống tự động 100%
        </h2>
        <h3 class="_t2">Bước 1: Thực hiện Chuyển khoản Internet Banking hoặc Nộp tiền tại ngân hàng </h3>
        <div>Tại mục chuyển khoản, Quý khách vui lòng điền chính xác các thông tin sau:</div>
        <div class="_mt2">
            <dl class="dl-horizontal _atm">
                    <dt>
                        Tên người hưởng
                    </dt>
                    <dd style="color: #0d81b1; font-weight: bold;">
                      Nguyễn Văn Thảo
                    </dd>
                    <dt>
                        Số tài khoản
                    </dt>
                    <dd style="color: #0d81b1; font-weight: bold;">
                        0901000033003
                    </dd>
                    <dt>
                        Chi nhánh
                    </dt>
                    <dd style="color: #0d81b1; font-weight: bold;">
                        Phủ Lý - Hà Nam
                    </dd>
             
                <dt>
                    Nội dung chuyển tiền
                </dt>
                <dd style="color: red; font-weight: bold;">
                    <?=$server?><?=strtolower($userData->username)?>
                </dd>
            </dl>
            <div class="clearfix"></div>
            <div class="_mt2">
                <em>
                    Lưu ý: Quý khách vui lòng ghi đúng nội dung chuyển tiền, Nếu sai sẽ không nhận được tiền.
                </em>
            </div>
        </div>
        <h3 class="_t2">Bước 2: Sau khi chuyển khoản 3>5 phút Các bạn điền capcha phía dưới để check giao dịch . Nếu đúng nội dung chuyển khoản hệ thống sẽ tự cộng tiền vào tài khoản
	
	</div>
    <style>
        body {
            font-family: arial;
            font-size: 12px;
            font-weight: normal;
        }

        .dl-horizontal dt {
            float: left;
            width: 160px;
            overflow: hidden;
            clear: left;
            text-align: right;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dl-horizontal._atm {
            width: 520px;
            margin-left: 30px;
            border: solid 1px gainsboro;
        }

        ._atm dt {
            text-align: left !important;
            background-color: #eeeeee;
        }

        ._atm dd, ._atm dt {
            padding: 10px;
            margin-bottom: 2px;
        }

        ._atm dd {
            margin-left: 182px !important;
            background-color: #f7f7f7;
        }

        h2 {
            color: #0099e6;
            font-size: 18px;
            font-weight: normal;
        }

        h3 {
            color: #303030;
        }

        .btn-ebanking {
            background-color: #5BB006;
            padding: 8px 10px;
            color: white;
            display: inline-block;
            font-size: 13px;
            font-weight: bold;
        }
		.alert {
			padding: 15px;
			margin-bottom: 20px;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		.alert-success {
			color: #3c763d;
			background-color: #dff0d8;
			border-color: #d6e9c6;
		}
    </style>


                          
                            
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
<center><h1>VIDEO HƯỚNG DẪN </h1>
<center><iframe width="560" height="315" src="https://www.youtube.com/embed/Se4b8ZyF0pI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>

</body>
</html>