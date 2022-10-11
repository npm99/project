@extends('template.officer')

@section('m1', 'active')
@section('ben', 'active')

@section('textpage', 'เพิ่มสาขา')

@section('content')

    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center">
                                <h4 class="h5">สาขา</h4>
                                <span>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addben"><i
                                            class="fa fa-plus-circle"></i>
                                        เพิ่มสาขา</button>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>สาขา</th>
                                            <th>คณะ</th>
                                            <th>ตัวย่อ</th>
                                            <th style="width: 120px"></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->branchName }}</td>
                                                <td>{{ $item->subBranch == null ? 'ไม่ระบุ' : $item->subBranch->factoryName }}
                                                </td>
                                                <td>{{ $item->branchcode }}</td>
                                                <td style="text-align: center"><button id="editbranch"
                                                        class="btn btn-success btn-sm rounded-1 text-center" type="button"
                                                        data-toggle="modal" data-target="#addben" title="แก้ไข"
                                                        onclick="editben({{ $item }})"
                                                        {{-- data-name="{{ $item->branchName }}"
                                                data-fac="{{ $item->factory_idfactory  }}"
                                                data-code="{{ $item->branchcode }}"
                                                data-id="{{ $item->idBranch }}"<i
                                                            class="fa fa-edit"></i> --}}>แก้ไข</button>
                                                    <button class="editfac btn btn-danger btn-sm rounded-1 text-center"
                                                        onclick="delete_ban({{ $item->idBranch }})" type="button"><i
                                                            class="bi bi-trash"></i></button>
                                                </td>
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

    <div class="modal fade" id="addben" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มสาขา</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="formbranch">
                        <input name="id" value="0" type="hidden">
                        <form id="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="txtFacultyID">เลือกคณะ</label>
                                <select name="txtFacultyID" id="txtFacultyID" class="form-control">
                                    @foreach ($items as $item)
                                        <option value='{{ $item->idfactory }}'>{{ $item->factoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Branchname">ชื่อสาขา</label>
                                <input type="text" class="form-control" maxlength="100" id="Branchname"
                                    name="txtBranchname" placeholder="วิศวกรรมคอมพิวเตอร์">
                                <span id="show1" style="color: red;display:none;">กรุณากรอกชื่อสาขา</span>
                            </div>
                            <div class="form-group">
                                <label for="Branchcode">อักษรย่อสาขา</label>
                                <input type="text" class="form-control" maxlength="10" id="Branchcode"
                                    name="txtBranchcode" placeholder="ECP">
                                <span id="show2" style="color: red;display:none;">กรุณากรอกอักษรย่อสาขา</span>
                            </div>

                            <center>
                                <button class="btn btn-success ben-submit">
                                    บันทึก</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        // $('.formbranch').find('input').each(function(index, element) {
        //     // element == this
        //     $('#show' + (index + 1)).hide();
        // });
        $(":input").on("keyup change", function(e) {
            $('.formbranch').find('input').each(function(index, element) {
                // element == this
                if ($(this).val() != '') {
                    $(this).removeClass('error');
                    $('#show' + (index - 1)).hide();
                }
            });
        });

        $('input').on('input change', function() {
            $(this).val($(this).val().replace(/([-.'"*+?^=!;;,%฿:`${}()|\[\]\/\\0-9])/g, ''));
        });



        $('#addben').on('hidden.bs.modal', function(e) {
            $('.formbranch').find('input').each(function(index, element) {
                // element == this
                $(this).removeClass('error');
                $('#show' + (index - 1)).hide();

            });
        })

        function delete_ban(id) {

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
                        url: "/delete_ban/" + id,
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
