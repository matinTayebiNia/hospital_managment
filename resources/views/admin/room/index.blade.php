<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>اتاق ها</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">
                <div class="x_title">
                    @can("create-room")
                        <div class="container row" style="padding:25px ">
                            <a href="{{route("panel.rooms.create")}}" class="btn btn-primary">افزودن اتاق جدید</a>
                            <hr class="In_solid">
                        </div>
                    @endcan
                    <div class="row">
                        <div class=" col-sm-12">
                            <x-per-page/>
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group   ">
                                <label for="status">نمایش بر اساس فعال بودن یا نبودن </label>
                                <select wire:model="status" id="status" class="form-control">
                                    <option value="null" disabled>لطفا انتخاب کنید</option>
                                    <option value="0">غیر فعال</option>
                                    <option value="1"> فعال</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group ">
                                <label for="search"> جست و جو</label>
                                <input type="text" id="search" wire:model="search"
                                       placeholder="جست و جو بر اساس تمام مشخصات اتاق..."
                                       class="form-control">
                            </div>
                            <div class="form-group  container" style="padding: 15px">
                                <button type="button" class="btn btn-success "
                                        wire:click="getFilterAndPaginateData()">اعمال
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
                            <a href="#" wire:click="deleteSelected()">حذف</a>
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
                                <input type="checkbox" id="selectAll" onclick="selectAll()">
                                <label for="selectAll">
                                    انتخاب همه
                                </label>
                            </th>
                            <th class="column-title">شماره اتاق</th>
                            <th class="column-title">نام اتاق</th>
                            <th class="column-title">وضعیت</th>
                            <th class="column-title">نوع اتاق</th>
                            <th class="column-title">در بخش</th>
                            <th class="column-title">قیمت</th>
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
                                            class="">   شما <strong>{{count($this->selected)}}</strong> تخت از <strong>{{$rooms->total()}}</strong>  را انتخاب کرده اید میخواهید همه تخت ها را انتخاب کنید؟</span>
                                        <button class=" btn-link" wire:click="selectAll">انتخاب همه</button>
                                    @else
                                        شما <strong>تمام({{$rooms->total()}})</strong> تخت ها را انتخاب کرده اید.
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @forelse($rooms as $room)

                            <tr class="even pointer ability_to_select " data-targetId="{{$room->id}}">
                                <td>
                                    <input type="checkbox" id="select-{{$room->id}}"
                                           value="{{$room->id}}" wire:model="selected"
                                           @click="Livewire.dispatch('update-selected')"
                                           wire:key="select-{{$room->id}}">
                                </td>
                                <td class=" ">{{$room->room_no}}</td>
                                <td class=" ">{{$room->name}}</td>
                                <td class=" ">
                                    {{getStatusDataModel($room->status)}}
                                </td>
                                <td class=" ">
                                    {{$room->roomType->name}}
                                </td>
                                <td class=" ">
                                    {{$room->ward->name}}
                                </td>
                                <td class=" ">
                                    {{$room->price}}
                                </td>
                                <td class=" last">
                                    <div class="btn-group">
                                        <a href="{{route("panel.rooms.edit",$room->id)}}"
                                           class="btn btn-warning btn-sm">
                                            ویرایش
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @can("delete-room")
                                            <button data-toggle="modal" data-userId="{{$room->id}}"
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
                                   موردی یافت نشد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="In_solid"></div>

                <div class="">

                    @if(!empty($rooms))
                        {{ $rooms->withQueryString('search')->links()}}
                    @endif
                </div>
            </div>

        </div>
    </div>
    @include("admin.layouts.alerts",["target"=>"اتاق"])
</div>
