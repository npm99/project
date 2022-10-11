@extends('template.officer')
@section('m2', 'active')
@section('af3', 'active')
@section('textpage', 'เพิ่มมคอ.3 ข้อมูลเดิม')
@section('content')
    <section class="tables">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-header align-items-center">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                <h3 class="h5">เพิ่มมคอ.3 แบบรวดเร็ว</h3>
                                <span>
                                    <button class="btn btn-primary addfast-tqf3" type="button">
                                        บันทึก</button>
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
                            <br>
                            <center>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-sm-2 col-form-label">
                                        <h5>เลือกข้อมูล</h5>
                                    </label>
                                    <div class="col-sm-3">
                                        <select id="data_year" name="data_year" class="form-control">
                                            <option selected disabled>เลือกปีการศึกษา</option>
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
                            {{-- <div class="table-responsive">

                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead class="headtable">
                                        <tr>
                                            <th></th>
                                            <th style="width: 10px;">ภาคเรียนที่</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>หน่วยกิต</th>
                                            <th>กลุ่มเรียน</th>
                                            <th>ชื่ออาจารย์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td style="text-align: center;vertical-align: middle;">
                                                    <input data-user="{{ $item->iduser }}"
                                                        data-subject="{{ $item->subsubject->idsubject }}"
                                                        style="width: 15px;height: 15px;" id="row-addtqf3" type="checkbox"
                                                        name="row-addtqf3" value="{{ $item->tqf3ID }}">
                                                </td>
                                                <td>{{ $item->subyear->term }}/{{ $item->subyear->Year }}</td>
                                                <td>{{ $item->subsubject->subjectCode }}</td>
                                                <td>{{ $item->subsubject->THsubject }}</td>
                                                <td>{{ $item->subsubject->cradit }}</td>
                                                <td>{{ $item->subsubject->group->groupname }}</td>

                                                <td style="width: fit-content">
                                                    @foreach ($item->subuser as $user)
                                                        <p>{{ $user->Uprefix }}{{ $user->UFName }}
                                                            {{ $user->ULName }}</p>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                            </div> --}}
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
                    id_tqf3: 0
                }
                input.push(value);
                // user.push($(this).data('user')); 
            } else {
                var value = {
                    teacher_id: JSON.stringify($(this).data('user')),
                    arr_sub: $(this).data('subject'),
                    id_tqf3: 0
                }
                input.splice($.inArray(value, input), 1);
                // user.splice($.inArray($(this).data('user'), user), 1);
            }
        });

        $('#data_year').change(function(e) {
            e.preventDefault();
            console.log($(this).val())

            $.ajax({
                type: "get",
                url: "/tqf/addfastqf3?year=" + $(this).val(),
                dataType: "html",
                success: function(response) {
                    $('.show_tqf').html(response);
                    $('#example').DataTable();
                    id = []
                    $(document).find('[name="row-addtqf"]').each(function(index, element) {
                        $.each(id, function(i, val) {

                            if (val == $(element).data('id')) {
                                $(element).prop("checked", true)
                                // console.log(element);
                            }
                        });

                    });
                }
            });
        });


        $('.addfast-tqf3').on('click', function() {

            var _token = $('input[name=_token]').val();
            var term3_id = $('select[name=year]').val();
            var date = $('input[id=date]').val();
            // console.log(date)
            const check_date1 = $('#data_year option:selected').text().trim().split("/");
            const check_date2 = $('select[name=year] option:selected').text().trim().split("/");

            if (input.length == 0 || term3_id == '' || date == '') {
                Swal.fire({
                    title: 'กรุณาใส่ข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
                return;
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
                // }
                // console.log(check_date1[0] - 0);
                // else{
                //     Swal.fire({
                //         title: 'กรุณาเลือกภาคเรียนที่สูงกว่า',
                //         icon: 'error',
                //         confirmButtonText: 'ตกลง',
                //         showCloseButton: true
                //     });
                //     return;
                // }

            } else {
                var data = {
                    _token: _token,
                    term_id: term3_id,
                    date: date,
                    id_tqf3: 1,
                    data: JSON.stringify(input)
                };
                // console.log(data);
                $.ajax({
                    url: '/addfasttqf3',
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
