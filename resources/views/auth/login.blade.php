<x-guest-layout classes="login">
    <!-- Session Status -->
    {{--   <x-auth-session-status class="mb-4" :status="session('status')" />

       <form method="POST" action="{{ route('login') }}">
           @csrf

           <!-- Email Address -->
           <div>
               <x-input-label for="email" :value="__('Email')" />
               <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
               required autofocus autocomplete="username" />
               <x-input-error :messages="$errors->get('email')" class="mt-2" />
           </div>

           <!-- Password -->
           <div class="mt-4">
               <x-input-label for="password" :value="__('Password')" />

               <x-text-input id="password" class="block mt-1 w-full"
                               type="password"
                               name="password"
                               required autocomplete="current-password" />

               <x-input-error :messages="$errors->get('password')" class="mt-2" />
           </div>

           <!-- Remember Me -->
           <div class="block mt-4">
               <label for="remember_me" class="inline-flex items-center">
                   <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                   <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
               </label>
           </div>

           <div class="flex items-center justify-end mt-4">
               @if (Route::has('password.request'))
                   <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                       {{ __('Forgot your password?') }}
                   </a>
               @endif

               <x-primary-button class="ms-3">
                   {{ __('Log in') }}
               </x-primary-button>
           </div>
       </form>--}}

    <div class="">

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>فرم ورود</h1>
                        <div>
                            <label for="email">ایمیل:</label>
                            <input id="email" type="email" name="email" value="{{old('email')}}"
                                   class="form-control" placeholder="ایمیل" required="">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password">رمز عبور:</label>

                            <input id="password" type="password" name="password"
                                   class="form-control" placeholder="رمز ورود" required="">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary submit">ورود</button>
                            @if (Route::has('password.request'))
                                <a class="reset_pass" href="{{ route('password.request') }}">رمز ورود را از دست دادید؟
                            @endif
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                <a href="#signup" class="to_register">  ایجاد حساب جدید در سایت؟ </a>
                            </p>
                        </div>
                    </form>
                </section>
            </div>
            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>ایجاد حساب</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="نام کاربری" required="">
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="ایمیل" required="">
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="رمز ورود" required="">
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">ارسال</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">در حال حاضر عضو هستید؟
                                <a href="#signin" class="to_register"> ورود </a>
                            </p>

                            <div class="clearfix"></div>
                            <br>

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©1397 تمامی حقوق محفوظ. Gentelella Alela! یک قالب بوت استرپ 3. حریم خصوصی و شرایط</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div id="rest_pass" class="animate form rest_pass_form">
                <section class="login_content">
                    <!-- /password recovery -->
                    <form action="index.html">
                        <h1>بازیابی رمز عبور</h1>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="ایمیل">
                            <div class="form-control-feedback">
                                <i class="fa fa-envelope-o text-muted"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-block">بازیابی رمز عبور</button>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">جدید در سایت؟
                                <a href="#signup" class="to_register"> ایجاد حساب </a>
                            </p>

                            <div class="clearfix"></div>
                            <br>
                        </div>
                    </form>
                    <!-- Password recovery -->
                </section>
            </div>
        </div>
    </div>
</x-guest-layout>
