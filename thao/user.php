<?php
include_once '../inc/init.php';
if(!$loginCheck || $userData->username != $config['ADMIN_USER']){
header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
exit;
}
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<div class="container">
    <br>
    <!-- <br/><div class="row"><div class="col-lg-12"><a href="index.php"><button class="btn btn-primary">Quản lý UID</button></a></div></div><br/>
    <br/><div class="row"><div class="col-lg-12"><a href="user2.php"><button class="btn btn-primary">Quản lý user2</button></a>
    <a href="atm.php"><button class="btn btn-primary">Quản lý ATM</button></a>
   <a href="hethong.php"><button class="btn btn-primary">Quản lý LOG</button></a> -->
   <div class="row">
       <div class="col-lg-12">
            <?php require_once './include/menu.php'; ?>
        </div>
   </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                        <div class="panel-heading">
                            Quản lý tài khoản
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <table id="data" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="width:100%">
        <thead>
            <tr>
                 <th>UID</th>
                <th>Username</th>
                <th>Pass</th>
                <th>Tiền</th>
                <th>IP cuối</th>
                <th>reg lúc</th>
            </tr>
        </thead>

    </table>
    </div>
    </div>
        </div>
    </div>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#data').DataTable({
        "ajax": 'data.php',
        "initComplete": function () {
            var api = this.api();
            api.$('tr').click(function() {
                var username = $(this).find('td:eq(1)').html();
                var money = prompt("Nhập số tiền cần cộng cho "+username, "0");
                if(money != "0" ){
                    $.get('data.php',{mode:"congtien",user:username,money:money},function(a){
                        alert(a.msg);
                   window.location = window.location;
                    });
                }else{
                    return false;
                }

            });
            api.$('tr').contextmenu(function(e) {
                var username = $(this).find('td:eq(1)').html();
                   var r = prompt("Nhập mật khẩu mới cho  "+username, "");
                if (r != null) {
                    $.get('data.php',{mode:"doipass",uid:$(this).find('td:eq(0)').html(),newpass:r},function(a){
                        alert(a.msg);
                        window.location = window.location;
                    });
                }
                return false;
            })
             },
        "columns": [
            { "data": "id" },
            { "data": "username" },
            { "data": "password" },

            { "data": "balance" },
            { "data": "last_ip" },
            { "data": "registered_date" }
        ]
    } );
    $(".congtien").click(function(){
        var username = $(this).parent('tr').find('td:eq(1)').html();
                var money = prompt("Nhập số tiền cần cộng cho "+username, "0");
                if(money != "0" ){
                    $.get('data.php',{mode:"congtien",user:username,money:money},function(a){
                        alert(a.msg);
                   window.location = window.location;
                    });
                }else{
                    return false;
                }
    })
     $(".doipass").click(function(){
        var username = $(this).parent('tr').find('td:eq(1)').html();
                   var r = prompt("Nhập mật khẩu mới cho  "+username, "");
                if (r != null) {
                    $.get('data.php',{mode:"doipass",uid:$(this).parent('tr').find('td:eq(0)').html(),newpass:r},function(a){
                        alert(a.msg);
                        window.location = window.location;
                    });
                }
                return false;
    })
} );
</script>
