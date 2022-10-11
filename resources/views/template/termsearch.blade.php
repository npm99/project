<div class="card col-md-4 mx-auto" style="border-radius: 25px">
    <form class="form-inline" action="{{ url("#") }}">
    <div class="form-row mx-auto">
        <div class="form-group">
        <label class="col-form-label" for="term">ภาคเรียนที่&nbsp;&nbsp; </label>
        <select name="term" id="term" class="form-control-sm">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        </div>
        <div class="form-group">
        <label class="col-form-label" for="year">&nbsp;/&nbsp;</label>
        <select name="year" id="year" class="form-control-sm">
            {{ $date = formatYearThai(date("Y")) }}
            @for ($i = 0; $i < 10; $i++)  
            <option value="{{ $date-$i }}">{{ $date-$i }}</option>
            @endfor
        </select>
        </div>
        <div class="form-group">
            &nbsp;&nbsp;&nbsp;&nbsp;<button class="col-form-label btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i> ค้นหา</button> 
        </div>
    </div>
    </form>
</div>

@section('script')
<script type="text/javascript">

</script>
@endsection