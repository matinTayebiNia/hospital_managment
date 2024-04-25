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
