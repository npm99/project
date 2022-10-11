<style>
    .selectize-input {
        min-width: 100px;
    }
</style>
<div class="col-md-12 col-sm-12 row search_bar" style="padding-bottom: 10px;margin: 0 auto;">
    {{-- ค้นหา: <input type="text" name="search" id="search" class="form-control col-md-12"> --}}
    {{-- <div class="col-6 px-0 row"> --}}
    {{-- <label for="search" class="col-sm-2 px-0 col-form-label">แสดง </label>
        <div class="col-sm-3 px-0">
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <label for="search" class="col-sm-4 col-form-label"> รายการ </label> --}}
    {{-- </div> --}}
    @if ($form == 'edit3' || $form == 'edit5')
        <div class="col-lg-7 col-md-7 px-0">
            <form class="form-inline" id="submit"
                @if ($form == 'edit3') action="edittqf3" @else action="edittqf5" @endif method="GET">
                @csrf
                <div class="form-group mb-2 mr-2">
                    <label for="year" class="mr-2">ปีการศึกษา</label>
                    <select id="year" name="year" class="form-select" style="min-width: 100px">
                        {{-- <option selected>เลือกข้อมูล</option> --}}
                        @foreach ($year as $item)
                            <option value="{{ $item->idYear }}" @if ($item->idYear == $y_id) selected @endif>
                                {{ $item->term }} /
                                {{ $item->Year }}</option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" hidden class="btn btn-primary mb-2 btn-sm">OK</button>
            </form>
        </div>
    @endif
    <div class="col-lg-4 col-md-4 px-0 row text-right" style="margin-left: auto;margin-right: 0;">
        <label for="search" class="col-3 px-0 col-form-label">ค้นหา: </label>
        <div class="col-9 pr-0">
            <input type="text" class="form-control" id="search" name="search">
        </div>
    </div>
</div>
