<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>کاربران</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    @can("create-user")
                        <div class="container row" style="padding:25px ">
                            <a href="{{route("panel.users.create")}}" class="btn btn-primary">ساخت کاربر جدید</a>
                            <hr class="In_solid">
                        </div>
                    @endcan
                    <div class="row">
                        <div class=" col-sm-12">
                            <x-per-page/>
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group   ">
                                <label for="role">نقش کاربر</label>
                                <select wire:model="role" id="role" class="form-control">
                                    <option value="null" disabled>لطفا انتخاب کنید</option>

                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->as_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group ">
                                <label for="search"> برای جست و جو باید نقش کاربر انتخاب شود</label>
                                <input type="text" id="search" wire:model="search" placeholder="جست و جو در کاربران..."
                                       class="form-control">
                            </div>
                            <div class="form-group  container" style="padding: 15px">
                                <button type="button" class="btn btn-success "
                                        wire:click="getDataBySearchAndRole()">اعمال
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">

                <div class="flex">
                    <h2>نمایش براساس: </h2>
                    @if($this->search!=null )
                        <div class="btn btn-round btn-info text-white">
                            جست و جو بر اساس :{{$this->search}}
                            <a class="collapse-link text-white" wire:click="removeSearchFilter()"><i
                                    class="fa fa-remove"></i></a>
                        </div>
                    @endif
                </div>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="btn-group open">
                    <button type="button" class="btn btn-default"> کارهای دسته جمعی</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#" wire:click="deleteUsers()">حذف</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="x_content">

                <div class="table-responsive">
                    <table class="table table-striped  jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">
                                {{--                                id="selectAll" onclick="selectAll()"--}}
                                <input type="checkbox" id="selectAll" onclick="selectAll()">
                                <label for="selectAll">
                                    انتخاب همه
                                </label>
                            </th>
                            <th class="column-title">نام کامل</th>
                            <th class="column-title">نام کاربری</th>
                            <th class="column-title">نقش کاربر</th>
                            <th class="column-title">ایمیل</th>
                            <th class="column-title">وضعیت</th>
                            <th class="column-title no-link last"><span class="nobr">عمل</span>
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($selectedPage)
                            <tr class="even pointer">
                                <td colspan="7" class="alert alert-dismissible">
                                    @unless($selectedAll==true)
                                        <span
                                            class="">   شما <strong>{{count($this->selected)}}</strong> کاربر از <strong>{{$users->total()}}</strong> کاربر را انتخاب کرده اید میخواهید همه کاربران را انتخاب کنید؟</span>
                                        <button class=" btn-link" wire:click="selectAll">انتخاب همه</button>
                                    @else
                                        شما <strong>تمام({{$users->total()}})</strong> کاربران را انتخاب کرده اید.
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @forelse($users as $user)

                            <tr class="even pointer ability_to_select " data-targetId="{{$user->id}}">
                                <td>
                                    <input type="checkbox" wire:model="selected"
                                           @click="Livewire.dispatch('update-selected')"
                                           id="select-{{$user->id}}"
                                           wire:key="select-{{$user->id}}"
                                           value="{{$user->id}}">
                                </td>
                                <td class=" ">{{$user->name}}</td>
                                <td class=" ">{{$user->username}}</td>
                                <td class=" ">
                                    {{$user->roles->first()->as_name}}
                                </td>
                                <td class=" ">{{$user->email}}</td>
                                <td class=" ">
                                    <label for="">
                                        {{getStatusDataModel($user->status)}}
                                        <input type="checkbox" id="status-{{$user->id}}"
                                               wire:click="changeStatus('{{$user->id}}','{{$user->status}}')"
                                               {{$user->status==1?"checked":""}}
                                               data-switchery="true">
                                    </label>
                                <td class=" last">
                                    <div class="btn-group">
                                        <a href="{{route("panel.users.edit",$user->id)}}"
                                           class="btn btn-warning btn-sm">
                                            ویرایش
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @can("delete-user")
                                            <button data-toggle="modal" data-userId="{{$user->id}}"
                                                    data-target=".target-modal-lg"
                                                    class="btn btn-danger btn-sm">
                                                حذف
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    کاربری یافت نشد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="In_solid"></div>
                <div class="">
                    @if(!empty($users))
                        {{ $users->withQueryString('search')->links()}}
                    @endif
                </div>
            </div>

        </div>
    </div>
    @include("admin.layouts.alerts",["target"=>"کاربر"])
</div>
