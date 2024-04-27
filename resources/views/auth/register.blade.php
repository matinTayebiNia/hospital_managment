<x-guest-layout classes="login">
    <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
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
