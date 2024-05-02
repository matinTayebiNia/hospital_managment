<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام بخش: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12"
               name="name" value="{{old("name",$ward->name??null)}}" placeholder="نام بخش "
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">کد: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12"
               name="code" value="{{old("code",($ward->code??rand(00000,99999)))}}"
               placeholder="کد"
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">وضعیت بخش
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="status" name="status" required="required"
                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
            @foreach(getStatus() as $key=> $status)
                <option value="{{$key}}" {{old("status",$ward->status??null)==$key?"selected":""}}>{{$status}}</option>
            @endforeach
        </select>
    </div>
</div>
