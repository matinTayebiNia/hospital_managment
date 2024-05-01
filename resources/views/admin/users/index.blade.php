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
            </div>


            <div class="x_content">

                <div class="table-responsive">
                    <table class="table table-striped  jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">

                                <input type="checkbox" id="selectAll" wire:click.prevent="selectAll">
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
                        @forelse($this->users as $user)
                            <tr class="even pointer">
                                <td>
                                    <input type="checkbox" id="select" wire:click.prevent="select">
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
                                        <a href="#" class="btn btn-sm btn-info">
                                            مشاهده
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm">
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
                    @if(!empty($this->users))
                        {{ $this->users->withQueryString('search')->links()}}
                    @endif
                </div>
            </div>

        </div>
    </div>
    @can("delete-user")
        <div class="modal fade target-modal-lg" tabindex="-1" id="delete-modal" role="dialog" aria-hidden="true"
             style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">حذف کاربر</h4>
                    </div>
                    <div class="modal-body">
                        <h4>ایا از حذف کاربر مورد نظر مطمعن هستید.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                        <button type="button"  data-dismiss="modal" id="button-delete" class="btn btn-danger">بله حذف کن</button>
                    </div>

                </div>
            </div>
        </div>
    @endcan
</div>


@section("styles")
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.css")}}">
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.buttons.css")}}">
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/pnotify.nonblock.css")}}">
@endsection

@section("scripts")
    <script src="{{asset("/vendor/panel/js/pnotify.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/pnotify.buttons.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/pnotify.nonblock.js")}}"></script>
    <script>
        $('#delete-modal').on('show.bs.modal', function (event) {
            let userId = event.relatedTarget.getAttribute("data-userId");
            let target = document.getElementById("button-delete");
            target.setAttribute("wire:click", `destroy(${userId})`)
        });
        document.addEventListener('livewire:init', () => {
           Livewire.on('delete-user', (event) => {
                new PNotify({
                    title: event.title,
                    text: event.message,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            });
        });
    </script>
    @if(session("success"))
        <script>
            window.onload = function notifyAlert() {
                new PNotify({
                    title: 'انجام شد',
                    text: '{{session("success")}}',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }
        </script>
    @endif
@endsection
