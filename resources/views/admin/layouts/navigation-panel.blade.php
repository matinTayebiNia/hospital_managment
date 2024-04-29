<div class="top_nav hidden-print">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{asset("/vendor/panel/images/img.jpg")}}" alt="">
                        {{auth()->user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="/profile">
                                <span>ویرایش اطلاعات</span>
                            </a>
                        </li>
                        <li><a href="#"
                               onclick="event.preventDefault();document.getElementById('form-logout').submit()"><i
                                    class="fa fa-sign-out pull-right"></i> خروج</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<form id="form-logout" action="{{route("logout")}}" method="POST">
    @csrf
</form>
