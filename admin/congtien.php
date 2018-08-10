<?php
include '../configs.php';
if(!$loginCheck || $userData->username != 'admin'){
    header('Location: http://thatim.dichvufacebook.info/');
    exit;
}
extract($_POST);

if(isset($action)){
$return = array('msg' => 'No action');
switch($action){
	case 'addgia':
	    if(isset($min, $max , $tien)){

          $return = $client->_addgia($min, $max , $tien);
			break;
	    }
	    case 'congtien':
	    if(isset($username, $balance)){

          $return = $client->_congtien($username , $balance);
			break;
	    }
    case 'removegia':
        if(isset($id)){
        $return = $client->_removegia($id);
        break;
        }
	default:
		$return = array('error' => true, 'msg' => 'No action found', 'action' => $_GET);
	break;
}
$msg = $return['msg'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<?php
if(@$msg){
    print '<script>alert("'.$msg.'");window.location = window.location;</script>';
}
?>
 <div class="container">
     <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                             <b>Cộng tiền</b>
                        </div>

             <div class="panel-body">

            <form method="POST">
                    <input type="hidden" name="action" value="congtien">

                    <div class="form-group">
                        <label>Tên nick</label>
                        <input type="text" name="username" placeholder="Username" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Số tiền</label>
                        <input type="number" name="balance" placeholder="100000" class="form-control" required="">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Cộng tiền</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
 <div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                             <b>Thêm giá</b>
                        </div>

             <div class="panel-body">

            <form method="POST">
                    <input type="hidden" name="action" value="addgia">
                    <div class="form-group">
                        <label>Tối thiểu</label>
                        <input type="number" name="min" placeholder="like thấp nhất" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Tối đa</label>
                        <input type="number" name="max" placeholder="like cao nhất" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Giá 1 ngày</label>
                        <input type="number" name="tien" placeholder="giá tiền theo từng ngày" class="form-control" required="">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Thêm Giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                             <b>Bảng giá</b>
                        </div>

             <div class="panel-body">
                 <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Gói</th>
                        <th>Loại</th>
                        <th>Giá 1 ngày</th>
<th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $i = 1;foreach($client->_getgia() as $hihi){ ?>
                            <tr>
                                <td>
                                    Gói <?=$i?>
                                </td>
                                <td>
                                    <?=$hihi->min?> - <?=$hihi->max?> LIKE / 1 post
                                </td>
                                <td>
                                    <?=$hihi->tien;?>
                                </td>
                                <td>
                        <form method="POST"><input type="hidden" name="action" value="removegia"><input type="hidden" name="id" value="<?=$hihi->id?>"><button type="submit" class="btn btn-default">Xóa</button></form>
                    </td>
                            </tr>
                            <?php ++$i;} ?>


                </tbody>
            </table>
                 </div>
                 </div>
       </div>
</div>


</div>
 </body>

    </html>
