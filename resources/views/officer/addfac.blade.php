@extends('template.officer')
@section('m1', 'active')
@section('fac', 'active')
@section('textpage', 'เพิ่มคณะ')
@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header card-header d-flex align-items-center">
                            {{-- <div class="card-title"> --}}
                            <h3 class="h5">เพิ่มคณะ</h3>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editFac"
                                style="position: absolute;right: 20px;">
                                เพิ่ม
                            </button>
                            {{-- </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>คณะ</th>
                                            <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($fac as $key => $item)
                                            <tr>
                                                <td>{{ $item->factoryName }}</td>
                                                <td style="text-align: center;width: 90px"><button
                                                        class="editfac btn btn-success btn-sm rounded-1 text-center"
                                                        type="button" data-toggle="modal"
                                                        data-target="#editFac{{ $key }}">แก้ไข
                                                    </button> {{-- <i class="fa fa-edit"></i> --}}
                                                    <div class="modal fade" id="editFac{{ $key }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="modalFac" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalFac">เพิ่มคณะ</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="addfac">
                                                                        <input name="id" value="{{ $item->idfactory }}"
                                                                            type="hidden">
                                                                        <form class="form-horizontal" method="POST">
                                                                            <!-- if there are creation errors, they will show here -->
                                                                            @csrf
                                                                            <div class="form-group row">
                                                                                <label style="text-align: end"
                                                                                    class="col-sm-3 form-control-label">คณะ</label>
                                                                                <div class="col-sm-9">
                                                                                    <div class="form-group"
                                                                                        style="margin-bottom: 0px">
                                                                                        <input id="fac" type="text"
                                                                                            class="form-control"
                                                                                            name="fac" maxlength="150"
                                                                                            placeholder="วิศวกรรมศาสตร์"
                                                                                            value="{{ $item->factoryName }}">
                                                                                    </div>
                                                                                    <span style="color: red"
                                                                                        id="fac_empty"></span>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-sm-2">
                                                                        <button class="btn btn-success add-fac"
                                                                            data-data="{{ $key }}">
                                                                            บันทึก</button>
                                                                    </div> <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">ปิดออก</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="editfac btn btn-danger btn-sm rounded-1 text-center"
                                                        onclick="delete_fac({{ $item->idfactory }})" type="button"><i
                                                            class="bi bi-trash"></i></button>
                                                </td>
                                            </tr>
                                            </tr>
                                        @endforeach



                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editFac" tabindex="-1" role="dialog" aria-labelledby="modalFac" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFac">เพิ่มคณะ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="addfac">
                        <input name="id" value="0" type="hidden">
                        <form class="form-horizontal" method="POST">
                            <!-- if there are creation errors, they will show here -->
                            @csrf
                            <div class="form-group row">
                                <label style="text-align: end" class="col-sm-3 form-control-label">คณะ</label>
                                <div class="col-sm-9">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <input id="fac" type="text" class="form-control" name="fac"
                                            maxlength="150" placeholder="วิศวกรรมศาสตร์" value="{{ old('fac') }}">
                                    </div>
                                    <span style="color: red" id="fac_empty"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-2">
                        <button class="btn btn-success add-fac" data-data=""> บันทึก</button>
                    </div> <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("input[name='fac']").on('input change', function() { //[0-9]
            $(this).val($(this).val().replace(/([-.'"*+?^=!;;,%฿:`${}()|\[\]\/\\0-9])/g, ''));
        });

        function delete_fac(id) {
            Swal.fire({
                title: 'ยืนยันการลบ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ลบ',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "/delete_fac/" + id,
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'ลบข้อมูลสำเร็จ',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                    showCloseButton: true
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 300);
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

            console.log(id);

        }
    </script>
@endsection
