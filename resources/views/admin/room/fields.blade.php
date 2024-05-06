<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام اتاق: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="name" class="form-control col-md-7 col-xs-12"
               name="name" value="{{old("name",$room->name??null)}}" placeholder="نام اتاق "
               required="required" type="text">
    </div>
</div>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="capacity">ظرقیت اتاق: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="capacity" class="form-control col-md-7 col-xs-12"
               name="capacity" value="{{old("capacity",$room->capacity??null)}}" placeholder="ظرقیت اتاق "
               required="required" type="number">
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">قیمت اتاق: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="price" class="form-control col-md-7 col-xs-12"
               name="price" value="{{old("price",$room->price??null)}}" placeholder="قیمت اتاق "
               required="required" type="number">
    </div>
</div>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="room_no">کد: <span
            class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="room_no" class="form-control col-md-7 col-xs-12"
               name="room_no" value="{{old("room_no",($room->room_no??rand(00000,99999)))}}"
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
                <option value="{{$key}}" {{old("status",$room->status??null)==$key?"selected":""}}>{{$status}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="item form-group">
    <label for="room_type_id" class="control-label col-md-3 col-sm-3 col-xs-12">نوع اتاق:
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="room_type_id" class="form-control col-md-7 col-xs-12 " id="room_type_id">

            @foreach($roomTypes as $roomType)
                <option
                    value="{{$roomType->id}}" {{old("room_type_id",$room->roomType->id??null)==$roomType->id?"selected":""}} >{{$roomType->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="item form-group">
    <label for="permissions" class="control-label col-md-3 col-sm-3 col-xs-12">در بخش :
        <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="ward_id" class="form-control col-md-7 col-xs-12 " id="permissions">

            @foreach($wards as $ward)
                <option
                    value="{{$ward->id}}" {{old("ward_id",$room->ward->id??null)==$ward->id?"selected":""}} >
                    {{$ward->name}}</option>
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
