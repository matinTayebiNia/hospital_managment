@csrf


<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام کامل: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
               data-validate-words="2" name="name" value="{{old("name",$user->name??null)}}" placeholder="متین طیبی "
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ایمیل <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" id="email" name="email" value="{{old("email",$user->email??null)}}" required="required"
               class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">نام کاربری<span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="username" value="{{old("username",$user->username??null)}}" name="username"
               required="required" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">جنسیت <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="gender" name="gender" required="required"
                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
            <option value="none"></option>
            <option value="Male" {{old("gender",$user->gender??null)=="Male"?"selected":""}}>مذکر</option>
            <option value="Female" {{old("gender",$user->gender??null)=="Female"?"selected":""}}>مونث</option>
        </select>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">وضعیت اکانت
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="status" name="status" required="required"
                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
            @foreach(getStatus() as $key=> $status)
                <option value="{{$key}}" {{old("status",$user->status??null)==$key?"selected":""}}>{{$status}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="single_cal2">تاریخ تولد
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="input-group">
            <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click"
                 data-targetselector="#exampleInput3" data-mdpersiandatetimepicker=""
                 data-enabletimepicker="false" data-mdformat="yyyy/MM/dd" data-isline="false"
                 data-mdpersiandatetimepickerselecteddatetime="{&quot;Year&quot;:1403,&quot;Month&quot;:2,&quot;Day&quot;:12,&quot;Hour&quot;:0,&quot;Minute&quot;:0,&quot;Second&quot;:0}"
                 style="cursor: pointer;" data-original-title="" title=""
                 data-mdpersiandatetimepickershowing="true" aria-describedby="popover758172">
                <span class="glyphicon glyphicon-calendar"></span>
            </div>
            <input type="text" class="form-control" name="dob" value="{{old("dob",$user->dob??null)}}"
                   id="exampleInput3" placeholder="تاریخ" data-targetselector="#exampleInput3"
                   data-mddatetimepicker="true" data-placement="right" data-englishnumber="true"
                   data-mdpersiandatetimepicker="" data-trigger="click"
                   data-enabletimepicker="false" data-mdformat="yyyy/MM/dd" data-isline="false"
                   data-mdpersiandatetimepickerselecteddatetime="{&quot;Year&quot;:1403,&quot;Month&quot;:2,&quot;Day&quot;:11,&quot;Hour&quot;:11,&quot;Minute&quot;:29,&quot;Second&quot;:16}"
                   data-original-title="" title="" data-mdpersiandatetimepickershowing="false">
        </div>
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="age">سن:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="age" class="form-control col-md-7 col-xs-12"
               name="age" value="{{old("age",$user->age??null)}}" placeholder="سن "
               type="number">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address_1">ادرس</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="address_1" name="address_1"
                                      class="form-control col-md-7 col-xs-12">{{old("address_1",$user->address_1??null)}}</textarea>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address_2"> 2 ادرس</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="address_2" name="address_2"
                                      class="form-control col-md-7 col-xs-12">{{old("address_2",$user->address_2??null)}}</textarea>
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="religion">دین:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="religion" class="form-control col-md-7 col-xs-12"
               name="religion" value="{{old("religion",$user->religion??null)}}" placeholder="دین"
               type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">عکس:
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="image" class="form-control col-md-7 col-xs-12"
               name="image" value="{{old("image",)}}"
               type="file">
    </div>
</div>
<div class="item form-group">
    <label for="permissions" class="control-label col-md-3 col-sm-3 col-xs-12">اعمال دسترسی</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="permissions[]" class="form-control col-md-7 col-xs-12 " multiple id="permissions">

            @foreach($permissions as $permission)
                <option
                    value="{{$permission->name}}" {{isset($user)?$user->permissions->contains("name",$permission->name)?"selected":"":null}} >{{$permission->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="item form-group">
    <label for="role_id" class="control-label col-md-3 col-sm-3 col-xs-12">اعمال نقش</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="role_id" class="form-control col-md-7 col-xs-12" id="role_id">
            <option value="none" disabled>انتخاب کنید</option>
            @foreach(getRoles() as $role)
                <option
                    value="{{$role->name}}" {{old("role",isset($user)?$user->roles->first()->name??null:"")==$role->name?"selected":""}}>
                    {{$role->as_name}}</option>
            @endforeach
        </select>
    </div>
</div>



@section("styles")
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/datetimepicker.style.css")}}">
    <link rel="stylesheet" href="{{asset("/vendor/panel/css/select2.min.css")}}">
@endsection

@section('scripts')
    <script src="{{asset("/vendor/panel/js/datetimepicker.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/jquery.Bootstrap-PersianDateTimePicker.js")}}"></script>
    <script src="{{asset("/vendor/panel/js/select2.min.js")}}"></script>
    <script>
        $("#permissions").select2();
    </script>
@endsection
