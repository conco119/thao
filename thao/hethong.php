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
    <br/><div class="row"><div class="col-lg-12"><a href="index.php"><button class="btn btn-primary">Trang chủ</button></a></div></div><br/>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                        <div class="panel-heading">
                            Lịch sử hệ thống
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <table id="data" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" style="width:100%">
        <thead>
            <tr>
                 <th>User</th>
                <th>Nội dung</th>
                <th>Tiền</th>
               
                <th>Lúc</th>
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
    $('#data').DataTable( {
        "ajax": 'data.php?mode=log', 
        "columns": [
            { "data": "user_id" },
            { "data": "content" },
            { "data": "amount" },
            { "data": "date_log" }
        ]
    } );
} );
</script>
