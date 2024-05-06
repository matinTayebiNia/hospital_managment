<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام تخت: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12"
               name="name" value="{{old("name",$bed->name??null)}}" placeholder="نام تخت "
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">کد: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12"
               name="bed_no" value="{{old("bed_no",($bed->bed_no??rand(00000,99999)))}}"
               placeholder="کد"
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">وضعیت تخت
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="status" name="status" required="required"
                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
            @foreach(getStatus() as $key=> $status)
                <option value="{{$key}}" {{old("status",$bed->status??null)==$key?"selected":""}}>{{$status}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="in_use">در حال استفاده
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="in_use" name="in_use" required="required"
                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
            <option value="0" {{old("in_use",$bed->in_use??null)=="0"?"selected":""}}>خیر</option>
            <option value="1" {{old("in_use",$bed->in_use??null)=="1"?"selected":""}}>بله</option>
        </select>
    </div>
</div>

<div class="item form-group">
    <label for="bed_type_id" class="control-label col-md-3 col-sm-3 col-xs-12">نوع تخت:
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="bed_type_id" class="form-control col-md-7 col-xs-12 " id="bed_type_id">

            @foreach($bedTypes as $bedType)
                <option
                    value="{{$bedType->id}}" {{old("bed_type_id",$bed->bedType->id??null)==$bedType->id?"selected":""}} >{{$bedType->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="item form-group">
    <label for="permissions" class="control-label col-md-3 col-sm-3 col-xs-12">در اتاق :
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="room_id" class="form-control col-md-7 col-xs-12 " id="permissions">

            @foreach($rooms as $room)
                <option
                    value="{{$room->id}}" {{old("room_id",$bed->room->id??null)==$room->id?"selected":""}} >
                    {{$room->name}}</option>
            @endforeach
        </select>
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
