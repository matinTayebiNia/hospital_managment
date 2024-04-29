<div>
    <div class="col-md-3 col-sm-3 col-xs-12 form-group   ">
        <label for="perPage">صفحه بندی</label>
        <select id="perPage" class="form-control" wire:model="perPage">
            <option value="" > انتخاب کنید</option>
            @foreach(getPerPageNumber() as $page)
                <option
                         value="{{$page["number"]}}">{{$page["pageWord"]}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12 form-group   ">
        <label for="sortBy">مرتب سازی</label>
        <select id="sortBy" wire:model="sortBy" class="form-control" >
            <option value="asc" > اول به آخر</option>
            <option value="desc" >  آخر به اول </option>

        </select>
    </div>
</div>
