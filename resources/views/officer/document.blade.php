@extends('template.officer')
@section('document', 'active')
@section('textpage', 'เอกสารดาวน์โหลด')
@section('content')
<section class="forms">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="h5">เอกสารดาวน์โหลด</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-document" action="" method="post">
                        @csrf
                        <div style="margin-bottom: 20px">หากต้องการให้เอกสารส่วนไหนไม่แสดง
                            ให้ผู้ใช้งานเว้นว่างในส่วนนั้น</div>
                        <div class="form-group row">
                            <label id="text1" for="file" class="col-sm-3">แบบฟอร์มมคอ.3</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file1" name="file1">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text2" for="file" class="col-sm-3">แบบฟอร์มมคอ.4</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file2" name="file2">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text3" for="file" class="col-sm-3">แบบฟอร์มมคอ.5</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file3" name="file3">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text4" for="file" class="col-sm-3">แบบฟอร์มมคอ.6</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file4" name="file4">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text5" for="file" class="col-sm-3">ตัวอย่างมคอ.3</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file5" name="file5">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text6" for="file" class="col-sm-3">ตัวอย่างมคอ.4</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file6" name="file6">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text7" for="file" class="col-sm-3">ตัวอย่างมคอ.5</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file7" name="file7">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>

                        <div class="form-group row">
                            <label id="text8" for="file" class="col-sm-3">ตัวอย่างมคอ.6</label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file8" name="file8">
                                </button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-success document-submit">บันทึก</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
<script>
    $('.document-submit').click(function(e) {
        e.preventDefault();
        var form_data = new FormData();

        for (let i = 0; i < 8; i++) {
            // const element = array[i];
            var name = $('.form-document').find('#text' + (i+1)).text();
            var file = $('.form-document').find('#file' + (i+1))[0].files[0];
            form_data.append("name[" + i + "]", name);
            form_data.append("file[" + i + "]", file);

        }

        // console.log(form_data.getAll("name[]"))
        console.log(form_data.getAll("file"))
        $.ajax({
            type: "post",
            url: "/add_document",
            // data: {data: form_data},
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        text: 'กรุณากด ตกลง เพื่อดำเนินการต่อ', 
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                } else {
                    Swal.fire({
                        title: 'บันทึกข้อมูลไม่สำเร็จ',
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            },
            error: function(error) {
                // console.log(error);
                Swal.fire({
                    title: 'PHP ERROR',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });

    });
</script>
@endsection
