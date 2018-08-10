<?php

extract($_GET);

require 'inc/init.php';

 ?>
 
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dichvufacebook.info</title>
      <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
                <a class="navbar-brand" href="/">DVFB</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    
                   <?php if($loginCheck){ ?>
                   
                         <li>
                       
                       <a href="../">Cài VIPLIKE</a>
                    </li>
                 <li>
                  
              
                     
                              <li>
                       
                       <a href="../vip-live.php">CÀI VIP MẮT</a>
                    </li>
                 <li>
                       
                       
                       
                                <li>
                       
                       <a href="../tang-views.php">TĂNG VIEW VIDEO</a>
                    </li>
                    
                   
             
                        <li>
                       
                       <a href="/naptien2">Nạp Rik = VCB ( + 5% )</a>
                    </li>
                    
                    
                        <li>
                       
                       <a href="https://goo.gl/KBj4wL">Báo Giá</a>
                    </li>
                    
                   <li>
                       
                       <a href="https://fb.com/mrpems">Liên hệ</a>
                    </li>
                     <li>
                       
                       <a href="../?action=logout">Thoát</a>
                    </li>
                    <?php }else{?>
                    
                    <? }?>
                </ul>
            </div>
             
            <!-- /.navbar-collapse -->
        </div>
        
        
    
    </nav>
    <!-- /.container -->