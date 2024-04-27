<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(session("status")=="profile-updated")
            <div class="alert alert-success">
                اطلاعات با موفقیت ویرایش شد
            </div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش اطلاعات
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form class="form-horizontal form-label-left" method="post"
                      action="{{route("profile.update")}}"
                      novalidate="">
                    @method("PATCH")
                    @csrf
                    <span class="section">اطلاعات شخصی</span>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> نام کامل <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12"
                                   value="{{old("name",$user->name)}}" data-validate-words="2" name="name"
                                   placeholder="نام" required="required" type="text">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ایمیل <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" value="{{old("email",$user->email)}}"
                                   name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">نام کاربری
                            <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="username" name="username"
                                   value=" {{old("username",$user->username)}}" required="required"
                                   class="form-control col-md-7 col-xs-12">
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-2"/>

                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
