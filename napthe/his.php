<?php
include '../configs.php';

if(!$loginCheck){
    header('Location: http://viplike.dichvufacebook.info');
    exit;
    
}

$con = mysqli_connect($config['host'],$config['user'], $config['pass'], $config['dbname']);


?>
<!DOCTYPE html>
<html>
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

</head>

<body>
<div id="wrapper">
<div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                <a href="../"><button class="btn btn-info">Trang chủ</button>   </a>
                              <a href="../v1/his.php"><button class="btn btn-info">Lịch Sử Nạp Thẻ</button>   </a>
         
                      <a href="../v1"><button class="btn btn-info">Nạp Thẻ Máy Chủ 1</button>   </a>
                      
                          <a href="../v2"><button class="btn btn-info">Nạp Thẻ Máy Chủ 2</button>   </a>
                          
                          
                              <a href="../v3"><button class="btn btn-info">Nạp Thẻ Máy Chủ 3</button>   </a>
                              
                               
            </div>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lịch sử nạp tiền</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
 <div class="container">
    <div class="row">
    <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Lịch sử nạp tiền</h5>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                       
                        <th>Số tiền</th>
                        <th>Seri</th>
                        <th>Ma the</th>
                        <th>Tinh trang</th>

                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $abc = mysqli_query($con,"SELECT * FROM `log_the` WHERE `username` = '".$userData->username."' ORDER BY `id` DESC");

                    ?>
                    
                    
                     <?php $i = 1;
                     
                     while ($hihi = mysqli_fetch_assoc($abc)) {
 ?>
                            <tr>
                                <td>
                                    <?=$hihi['id']?>
                                </td>
                                <td>
                                    <?=$hihi['username']?>
                                </td>
                                
                                  <td>
                                   <?=number_format($hihi['menhgia'])?> đ
                                </td>
                                
                                  <td>
                                    <?=$hihi['seri']?>
                                </td>
                                 <td>
                                    <?=$hihi['mathe']?>
                                </td>
                                <td>
                                    <?=($hihi['status'] == 0 ? 'Thành công' : ($hihi['status'] == 1 ? 'Đang xử lý' : 'Thẻ bị từ chối'))?>
                                </td>
                                 <td>
                                    <?=$hihi['thoigian']?>
                                </td>
                            </tr>
                            <?php ++$i;} ?>
                    
                    
                </tbody>
            </table>

        </div>
       

    </div>
</div>

</body>

</html>