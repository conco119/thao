<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="common/assets/img/new-logo.png" alt="" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" >
                        <!-- <i class="lnr lnr-question-circle"></i> -->
                        <span>Số dư: <b style="color:red">{$arg.user.balance|number_format} <span style='color:black' >Xu</span>{$arg.user.lstream_balance|number_format} <span style='color:black' >Rik</span></b></p></span>
                        <!-- <i class="icon-submenu lnr lnr-chevron-down"></i> -->
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="assets/img/user.png" class="img-circle" alt="Avatar">  -->
                        <span>{$arg.user.username}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="../"><i class="lnr lnr-user"></i> <span>Trang người dùng</span></a></li>
                        <li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin tài khoản</span></a></li>
                        <li><a href="./?mc=pub&site=logout"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
