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

</head>

<body>
<div id="wrapper">
<div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                <a href="../"><button class="btn btn-info">Trang chủ</button>   </a>
            </div>
                            <div class="panel-body">
                            <center>   <p>   <h3>Nạp tiền vào tài khoản</h3></p></center>
               <p> <h4 style="color:red">Nạp thẻ cào Sẽ được 0% . Ví dụ 100k VND = 100k VNĐ trong tài khoản . </h4></p>
   <p> <h4 style="color:red">Chuyển Khoản sẽ được 60% . Ví dụ 100k Được 160k . </h4></p>
            <form action="api.php" method="post" id="fnapthe" name="fnapthe">
            	<input  type="hidden" name="action" value="napthe"/>
                <table class="table table-striped table-bordered">
                    <tbody>                        
                        <tr>
                            <td>Loại thẻ</td>
                            <td>
                                <select name="card_type_id" class="form-control border-select" style="border: 1px solid #ccc;">
                                                   <option value="viettel1">Viettel</option>
                                    <option value="vcoin">Vcoin</option>
                                    <option value="zing">Zing</option>

                     

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Mã thẻ</td>
                            <td><input type="text" class="form-control border-input" value="" name="pin" style="border: 1px solid #ccc;"/></td>
                        </tr>
                        <tr>
                            <td>Seri</td>
                            <td><input type="text" class="form-control border-input" value="" name="seri" style="border: 1px solid #ccc;"/></td>
                        </tr>

                    </tbody>
                </table><br/>
				<center>
				<button id="buttton" class="btn btn-success" type="submit">Nạp thẻ</button>   
				</center>
            </form>
       
                            </div>
                        </div>
                    </div>
                </div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script>
$(document).ready(function(){
    $("form").submit(function(e){
        e.preventDefault();
$("#buttton").attr("disabled","").html('Vui lòng chờ chút.....');
        $.post('api.php',$(this).serializeArray()).done(function(a){ 
              
             var ss = confirm(a.msg+"\n" + "- Về trang chủ click OK"+"\n" + "- Nạp lại click Cancel");
            if(ss){
window.location = './';
}else{
//window.location = window.location.href;
}
   
        }).fail(function(){
             //window.location = window.location.href;
        });
      
        
    });
});
                </script>
</body>
</html>