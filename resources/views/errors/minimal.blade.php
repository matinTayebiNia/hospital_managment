<x-layouts-panel>
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="col-middle">
                    <div class="text-center text-center">
                        <h1 class="error-number"> @yield('code')</h1>
                        <h2>  @yield('message')</h2>
                        <p><a href="{{route("dashboard")}}">بازگشت به پنل</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
</x-layouts-panel>
