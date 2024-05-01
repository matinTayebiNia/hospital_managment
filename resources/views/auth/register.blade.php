<x-guest-layout classes="login">
    <div class="login_wrapper ">
        <div class=" form login_form">
            <section class="login_content">

                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <h1>فرم ثبت نام</h1>
                    <div>
                        <label for="username">نام کاربری:</label>
                        <input id="username" type="text" name="username" value="{{old('username')}}"
                               class="form-control" placeholder="نام کاربری" required="">
                        <x-input-error :messages="$errors->get('username')" class=""/>
                    </div>
                    <div>
                        <label for="name">نام کامل:</label>
                        <input id="name" type="text" name="name" value="{{old('name')}}"
                               class="form-control" placeholder="نام کامل" required="">
                        <x-input-error :messages="$errors->get('name')" class=""/>
                    </div>
                    <div>
                        <label for="email">ایمیل:</label>
                        <input id="email" type="email" name="email" value="{{old('email')}}"
                               class="form-control" placeholder="ایمیل" required="">
                        <x-input-error :messages="$errors->get('email')" class=""/>
                    </div>
                    <div>
                        <label for="gender">جنسیت:</label>
                        <select name="gender" required="" class="form-control" id="gender">
                            <option value="none"></option>
                            <option value="Male">مذکر</option>
                            <option value="Female">مونث</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class=""/>
                    </div>
                    <div class="  " style="margin-top: 20px">
                        <label for="dob">تاریخ تولد:</label>
                        <input type="text" id="dob" name="dob" class="form-control">
                        <x-input-error :messages="$errors->get('dob')" class=""/>
                    </div>
                    <div>
                        <label for="password">رمز عبور:</label>
                        <input id="password" type="password" name="password" value="{{old('password')}}"
                               class="form-control" placeholder="رمز عبور" required="">
                        <x-input-error :messages="$errors->get('password')" class=""/>
                    </div>
                    <div>
                        <label for="password_confirmation"> تکرار رمز عبور:</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               value="{{old('password_confirmation')}}"
                               class="form-control" placeholder="رمز عبور" required="">
                        <x-input-error :messages="$errors->get('password_confirmation')" class=""/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">ثبت نام</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <a href="{{route("login")}}" class="to_register"> داخل سیستم اکانت دارید ؟ وارد شوید</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
@section("scripts")
    <!-- bootstrap-daterangepicker -->
        <script src="{{asset("/vendor/panel/js/moment.min.js")}}"></script>

        <script src="{{asset("/vendor/panel/js/daterangepicker.js")}}"></script>

    @endsection

</x-guest-layout>
