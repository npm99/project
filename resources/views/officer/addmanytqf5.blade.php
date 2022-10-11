@extends('template.officer')
@section('m3', 'active')
@section('af5', 'active')
@section('textpage', 'ตรวจสอบมคอ.5')
@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center ">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                <h3 class="h5">เพิ่มมคอ.5 แบบรวดเร็ว</h3>
                                <span>
                                    <button class="btn btn-primary addfast-tqf5">บันทึก</button>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="year">ภาคเรียน</label>
                                        <select id="year" name="year" class="form-control">
                                            <option value="" selected>เลือกภาคเรียน...</option>
                                            @foreach ($year as $item)
                                                <option value="{{ $item->idYear }}">
                                                    {{ $item->term }}/{{ $item->Year }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">วันที่สิ้นสุดการส่งมคอ.</label>
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ isset($date->deadline) ? $date->deadline : '' }}">
                                    </div>
                                </div>

                            </form>
                            <center>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-sm-2 col-form-label">
                                        <h5>เลือกข้อมูล</h5>
                                    </label>
                                    <div class="col-sm-3">
                                        <select id="data_year" name="data_year" class="form-control">
                                            <option value="" selected disabled>เลือกปีการศึกษา</option>
                                            @foreach ($year as $item)
                                                <option value="{{ $item->idYear }}"
                                                    @if (session('data_year') == $item->idYear) selected @endif>
                                                    {{ $item->term }}/{{ $item->Year }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </center>
                            <br>
                            <div class="show_tqf">
                                @include('officer/manytqf')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        var input = [];
        var id = [];


        $(document).on('click', 'input:checkbox[name="row-all"]', function() {
            $(document).find('[name="row-addtqf"]').each(function(index, element) {
                if ($('input:checkbox[name="row-all"]').is(':checked')) {
                    var value = {
                        teacher_id: JSON.stringify($(this).data('user')),
                        arr_sub: $(this).data('subject'),
                        id_tqf5: 0
                    }
                    input.push(value);
                    id.push($(this).data('id'));
                    $(element).prop("checked", true)
                } else {
                    var value = {
                        teacher_id: JSON.stringify($(this).data('user')),
                        arr_sub: $(this).data('subject'),
                        id_tqf5: 0
                    }
                    input.splice($.inArray(value, input), 1);
                    id.splice($.inArray($(this).data('id'), id), 1);
                    $(element).prop("checked", false)
                }
            });
        });
        $(document).on('click', 'input:checkbox[name=row-addtqf]', function() {

            if ($(this).is(':checked')) {
                var value = {
                    teacher_id: JSON.stringify($(this).data('user')),
                    arr_sub: $(this).data('subject'),
                    id_tqf5: 0
                }
                input.push(value);
                id.push($(this).data('id'));
                // user.push($(this).data('user'));
            } else {
                var value = {
                    teacher_id: JSON.stringify($(this).data('user')),
                    arr_sub: $(this).data('subject'),
                    id_tqf5: 0
                }
                input.splice($.inArray(value, input), 1);
                id.splice($.inArray($(this).data('id'), id), 1);
                // user.splice($.inArray($(this).data('user'), user), 1);
            }
            // console.log(id);
        });

        $(document).on('change', '#data_year', function(e) {
            e.preventDefault();
            console.log($(this).val())

            $.ajax({
                type: "get",
                url: "/tqf/addfastqf5?year=" + $(this).val(),
                dataType: "html",
                success: function(response) {
                    $('.show_tqf').html(response);
                    $('#example').DataTable();
                    id = []
                    $(document).find('[name="row-addtqf"]').each(function(index, element) {

                        $.each(id, function(i, val) {
                            if (val == $(element).data('id')) {
                                $(element).prop("checked", true)

                            }
                        });
                        console.log(id);
                    });
                }
            });
        });

        $(document).on('click', '.addfast-tqf5', function() {
            var date = $('input[name=date]').val();
            var _token = $('input[name=_token]').val();
            var term5_id = $('select[name=year]').val();

            const check_date1 = $('#data_year option:selected').text().trim().split("/");
            const check_date2 = $('select[name=year] option:selected').text().trim().split("/");
            console.log(input.length)
            if (input.length == 0 || term5_id == '' || date == '') {
                Swal.fire({
                    title: 'กรุณาใส่ข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            } else if ((check_date1[1] - 0) > (check_date2[1] - 0)) {
                Swal.fire({
                    title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
            } else if ((check_date1[1] - 0) == (check_date2[1] - 0) && (check_date1[0] - 0) >= (check_date2[0] -
                0)) {
                Swal.fire({
                    title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
            } else {
                Swal.fire({
                    title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
            }

        } else {

            var data = {
                _token: _token,
                term_id: term5_id,
                date: date,
                id_tqf5: 1,
                data: JSON.stringify(input)
            };
            console.log(data);
            $.ajax({
                url: '/addfasttqf5',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                //JSON.stringify()
                success: function(response) {
                    if (response.success) {
                        $("input:checkbox[name=row-addtqf]").prop("checked", false);
                        Swal.fire({
                            title: 'เพิ่มข้อมูลสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 300);
                    } else {
                        Swal.fire({
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            icon: 'error',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        });
                    }
                },
                error: function(error) {
                    // console.log(error);
                    // Swal.fire({
                    //     title: 'PHP ERROR',
                    //     icon: 'error',
                    //     confirmButtonText: 'ตกลง',
                    //     showCloseButton: true
                    // });
                }
            });
        }
        });
    </script>
@endsection
