<x-layouts-panel>
    <div class="right_col" role="">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>اطلاعات کاربر</h3>
                </div>
            </div>
            <div class="clearfix"></div>

         @include("admin.profile.partials.update-profile-information-form")
            @include("admin.profile.partials.update-password-form")
        </div>

    </div>

</x-layouts-panel>
