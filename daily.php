<?php
require 'inc/head.php';
 if(!$loginCheck){
     header("Location: " . $config["SITE_LOCATION"]);
     exit;
 }
extract($_REQUEST);
if(isset($action)){
     switch($action){
    
            case '_exBalance':
                if(isset($receiver, $amount)){
                    @$return = $client->_exBalance($userData, $receiver,$amount);
                  
                    break;
                }
                case '_exBalanceltream':
                if(isset($receiver, $amount)){
                    @$return = $client->_exBalanceltream($userData, $receiver,$amount);
                  
                    break;
                }
        
            default:
                $return = array('error' => true, 'msg' => 'No action found','url'=>'./', 'action' => $_POST);
                break;
        }
}
?>
<?php
if(@$return){
    print '<script>alert("'.$return["msg"].'");window.location=window.location;</script>';
}
?>
<div class="container" style="margin-top: 70px;">
     <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                   <div class="panel-head">CHUYỂN KHOẢN VIPLIKE</div>
                    <div class="panel-body">
                                    <form role="form" method="post">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Người nhận</span>
                                            <input type="text" class="form-control" name="receiver" placeholder="Usernam nhận tiền">
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Số tiền</span>
                                            <input type="number" class="form-control" name="amount" placeholder="0">
                                        </div>
                                        
                                        <div class="form-group text-center">
                                            <input type="hidden" name="action" value="_exBalance">
                                            <button type="submit" class="btn btn-success">Chuyển tiền</button>
                                        </div>
                                    </form>
                            </div>
                     </div>
                 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                   <div class="panel-head">CHUYỂN KHOẢN LIVESTREAM</div>
                    <div class="panel-body">
                                    <form role="form" method="post">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Người nhận</span>
                                            <input type="text" class="form-control" name="receiver" placeholder="Usernam nhận tiền">
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Số tiền</span>
                                            <input type="number" class="form-control" name="amount" placeholder="0">
                                        </div>
                                        
                                        <div class="form-group text-center">
                                            <input type="hidden" name="action" value="_exBalanceltream">
                                            <button type="submit" class="btn btn-success">Chuyển tiền</button>
                                        </div>
                                    </form>
                            </div>
                     </div>
                 
            </div>
     </div>
</div>
<?php
require 'inc/foot.php';
?>