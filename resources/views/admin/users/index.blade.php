<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav nav-pills" role="tablist">
                        {{--                        {{isActive("")}}--}}
                        @foreach($roles as $role)

                            <li role="presentation"><a href="#" class=" "
                                                       wire:click="getUserDataByRole('{{$role->name}}')">
                                    {{$role->as_name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>طراحی جدول
                        <small>طراحی شخصی شده</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <div class="table-responsive">
                        <table class="table table-striped  jambo_table bulk_action">
                            <thead>
                            <tr class="headings">

                                <th class="column-title">نام کامل</th>
                                <th class="column-title">نام کاربری</th>
                                <th class="column-title">جنسیت</th>
                                <th class="column-title">ایمیل</th>
                                <th class="column-title no-link last"><span class="nobr">عمل</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($this->users as $user)
                                <tr class="even pointer">
                                    <td class=" ">{{$user->name}}</td>
                                    <td class=" ">{{$user->username}}</td>
                                    <td class=" ">{{$user->gender}}</td>
                                    <td class=" ">{{$user->email}}</td>
                                    <td class=" last"><a href="#">مشاهده</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

