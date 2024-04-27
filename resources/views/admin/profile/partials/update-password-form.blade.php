
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if(session("status")=="password-updated")
            <div class="alert alert-success">
                رمز عبور با موفقیت ویرایش شد
            </div>
        @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش رمز عبور
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form class="form-horizontal form-label-left" method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <span class="section">ویرایش رمز</span>
                    <div class="item form-group">
                        <label for="current_password" class="control-label col-md-3"> رمز عبور فعلی</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="current_password" type="password" name="current_password" data-validate-length="6,8"
                                   class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">رمز عبور</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" name="password" data-validate-length="6,8"
                                   class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                    </div>
                    <div class="item form-group">
                        <label for="password_confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">تکرار رمز
                            عبور</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   data-validate-linked="password"
                                   class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

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

