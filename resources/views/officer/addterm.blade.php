@extends('template.officer')

@section('m1', 'active')
@section('term', 'active')

@section('textpage', 'เพิ่มปีการศึกษา')

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="row"> -->
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header card-header d-flex align-items-center">

                            <h3 class="h5">เพิ่มปีการศึกษา</h3>
                            <button class="btn btn-success" data-toggle="modal" data-target="#editYear"
                                style="position: absolute;right: 25px;">เพิ่ม</button>
                        </div>
                        <div class="card-body">
                            {{--  --}}
                            <div class="card-body">
                                @include('index.search')
                                <div class="posts">
                                    @include('officer.edittqf')
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editYear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มปีการศึกษา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="addyear">
                        <form class="form-horizontal">
                            @csrf
                            <input name="id" value="0" hidden>
                            <br>
                            <div class="form-group row">
                                <label style="text-align: end" class="col-sm-2 form-control-label">ปีการศึกษา:</label>
                                <div class="col-sm-3">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <select class="form-control" name="term" id="textTerm">
                                            <option value="1">1 </option>
                                            <option value="2">2 </option>
                                            <option value="3">3 </option>
                                        </select>
                                    </div>
                                    <span style="color: red" id="term_empty"></span>
                                </div>
                                <label style="text-align: end" class="form-control-label">/</label>
                                <div class="col-sm-6">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        {{-- <input class="form-control " type="number" name="year" id="textYear"
                                            placeholder="2563"> --}}
                                        <select class="form-control" name="year" id="textYear">
                                            {{ $date = date('Y', strtotime(date('y-m-d') . '-3 year')) + 543 }}
                                            @for ($i = 1; $i < 6; $i++)
                                                <option value="{{ $date + $i }}">
                                                    {{ $date + $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <span style="color: red" id="year_empty"></span>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">สถานะ</label>
                                <div class="col-sm-10">
                                    <select id="active" name="active" class="form-control">
                                        <option value="1">active</option>
                                        <option value="0">not active</option>
                                    </select>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success term-submit" data-data="">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var table = $('#example1').DataTable({
            "ordering": false,
            "pageLength": 20,
            "lengthChange": false
        });
        $(document).on('keyup change clear', 'input', function() {
            // console.log(table.columns([0]).search());
            console.log(this.value);
            if (table.columns([0, 1]).search() !== this.value) {
                table.search('');
                table.columns([0, 1]).search(this.value).draw();
            }
            // if (table.columns([1]).search() !== $(this).val()) {
            //     table.search('');
            //     table.columns([1]).search($(this).val()).draw();
            // }

            // table.search(this.value).draw();
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'ยืนยันการลบ',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "get",
                        url: "delete_year/" + id,
                        // data: "data",
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'ลบข้อมูลสำเร็จ',
                                    '',
                                    'success'
                                )
                                setTimeout(() => {
                                    location.reload();
                                }, 500);

                            } else {
                                Swal.fire({
                                    title: response.message,
                                    icon: 'error',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                            }
                        }
                    });

                }
            })
        });
    </script>
@endsection
