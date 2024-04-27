<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>صفحه اصلی</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset("/vendor/panel/images/img.jpg")}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{auth()->user()->name}}</h2>
                <span>خوش آمدید</span>

            </div>
        </div>
        <!-- /menu profile quick info -->
        +
        <br>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>داشبورد</h3>
                <ul class="nav side-menu" style="">
                    <li class="active"><a><i class="fa fa-user-plus"></i> منابع انسانی <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: block;">
                            <li><a href="index.html">داشبورد</a></li>
                            <li class="current-page"><a href="index2.html">داشبورد ۲</a></li>
                            <li><a href="index3.html">داشبورد ۳</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="تنظیمات">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" onclick="toggleFullScreen();"
               data-original-title="تمام صفحه">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" class="lock_btn" data-original-title="قفل">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" href="login.html" data-original-title="خروج">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
