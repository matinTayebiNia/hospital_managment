<x-guest-layout classes="login">
    <!-- Session Status -->
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
                            <x-input-error :messages="$errors->get('email')" class="" />
                        </div>
                        <div>
                            <label for="password">رمز عبور:</label>

                            <input id="password" type="password" name="password"
                                   class="form-control" placeholder="رمز ورود" required="">
                            <x-input-error :messages="$errors->get('password')" class="" />
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
                                <a href="{{route("register")}}" class="to_register">  ایجاد حساب جدید در سایت؟ </a>
                            </p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-guest-layout>
