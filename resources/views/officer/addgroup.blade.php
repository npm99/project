@extends('template.officer')

@section('m1', 'active')
@section('group', 'active')

@section('textpage', 'เพิ่มกลุ่มเรียน')

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header card-header d-flex align-items-center">
                            {{-- <div class="card-title"> --}}
                            <h3 class="h5">เพิ่มกลุ่มเรียน</h3>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editGroup"
                                style="position: absolute;right: 20px;">
                                เพิ่ม
                            </button>
                            {{-- </div> --}}
                        </div>
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
    </section>

    <div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="modalgroup" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgroup">เพิ่มกลุ่มเรียน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="addgroup">
                        <input name="id" value="0" type="hidden">
                        <form class="form-horizontal" method="POST">
                            <!-- if there are creation errors, they will show here -->
                            @csrf
                            <div class="form-group row">
                                <label style="text-align: end" class="col-sm-3 form-control-label">กลุ่มเรียน</label>
                                <div class="col-sm-9">
                                    <div class="form-group" style="margin-bottom: 0px">
                                        <input id="group" type="text" class="form-control" maxlength="8" name="group"
                                            placeholder="ECP4N" value="">
                                    </div>
                                    <span style="color: red" id="group_empty"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-2">
                        <button class="btn btn-success add-group" data-data=""> บันทึก</button>
                    </div> <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function delete_group_sub(id) {

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
                        url: "/delete_group_sub/" + id,
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
