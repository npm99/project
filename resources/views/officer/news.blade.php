@extends('template.officer')
@section('news', 'active')
@section('textpage', 'ข่าวประชาสัมพันธ์มคอ.')
@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex align-items-center d-flex justify-content-between">
                            <h4 class="h5">ข่าวประชาสัมพันธ์มคอ.</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNews">
                                เพิ่ม
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>หัวข้อ</th>
                                        <th>วันที่สร้าง</th>
                                        <th>สถานะ</th>
                                        <th style="width: 90px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $item->topic }}</td>
                                            <td class="text-center">{{ $item->create_date }}</td>
                                            <td class="text-center">{{ $item->status == 1 ? 'แสดง' : 'ซ่อน' }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#addNews{{ $key }}">
                                                    <i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger delect-news"
                                                    data-id="{{ $item->idnews }}">
                                                    <i class="fa fa-trash"></i></button>

                                            </td>
                                            <div class="modal fade bd-example-modal-lg" id="addNews{{ $key }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog  modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข่าว
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" action="" method="post">
                                                                @csrf
                                                                <input type="text" name="id" id="id"
                                                                    value="{{ $item->idnews }}" class="form-control" hidden>
                                                                <div class="form-group">
                                                                    <label for="topic">หัวข้อข่าวประชาสัมพันธ์ <span
                                                                            style="color: red">*</span></label>
                                                                    <input type="text" name="topic" id="topic"
                                                                        placeholder="" class="form-control"
                                                                        value="{{ $item->topic }}">
                                                                    <span style="color: red;display:none"
                                                                        id="empty_topic">กรุณากรอกหัวข้อข่าวประชาสัมพันธ์</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="content">เนื้อหาข่าวประชาสัมพันธ์ <span
                                                                            style="color: red">*</span></label>
                                                                    <textarea type="text" id="content" name="content" placeholder="" class="form-control summernote" required>{{ $item->content }}</textarea>
                                                                    <span id="empty_content"
                                                                        style="color: red;display:none">กรุณากรอกเนื้อหาข่าวประชาสัมพันธ์</span>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="file" class="col-sm-3">รูปประกอบ
                                                                        &nbsp;(ตัวเลือก)</label>
                                                                    <div class="col-sm-9">
                                                                        <button class="btn btn-primary btn-sm"
                                                                            type="button">
                                                                            <input type="file" id="file"
                                                                                name="file" accept="image/*"
                                                                                data-type='image'>
                                                                        </button>
                                                                        &nbsp;&nbsp;<span id="empty_file"
                                                                            style="color: red;display:none">กรุณาเลือกไฟล์รูปภาพ</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">สถานะ </label>
                                                                    <select class="form-control" id="status"
                                                                        name="status">
                                                                        <option value="1"
                                                                            {{ $item->status == 1 ? 'selected' : '' }}>แสดง
                                                                        </option>
                                                                        <option value="0"
                                                                            {{ $item->status == 0 ? 'selected' : '' }}>ซ่อน
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success news-submit"
                                                                data-id="{{ $key }}">บันทึก</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ปิดออก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" id="addNews" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข่าว</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" method="post">
                        @csrf
                        <input type="text" name="id" id="id" value="0" class="form-control" hidden>
                        <div class="form-group">
                            <label for="topic">หัวข้อข่าวประชาสัมพันธ์ <span style="color: red">*</span></label>
                            <input type="text" name="topic" id="topic" placeholder="" class="form-control"
                                required>
                            <span style="color: red;display:none" id="empty_topic">กรุณากรอกหัวข้อข่าวประชาสัมพันธ์</span>
                        </div>
                        <div class="form-group">
                            <label for="content">เนื้อหาข่าวประชาสัมพันธ์ <span style="color: red">*</span></label>
                            <textarea type="text" id="content" name="content" placeholder="" class="form-control summernote2" required></textarea>
                            <span id="empty_content"
                                style="color: red;display:none">กรุณากรอกเนื้อหาข่าวประชาสัมพันธ์</span>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="date" class="col-sm-3">วันที่อัพเดต</label>
                            <div class="col-sm-9">
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="file" class="col-sm-3">รูปประกอบ &nbsp;(ตัวเลือก)</label>
                            <div class="col-sm-9">
                                <button class="btn btn-primary btn-sm" type="button">
                                    <input type="file" id="file" name="file" accept="image/*"
                                        data-type='image'>
                                </button>
                                &nbsp;&nbsp;<span id="empty_file"
                                    style="color: red;display:none">กรุณาเลือกไฟล์รูปภาพ</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">สถานะ </label>
                            <select class="form-control" id="status" name="status">
                                <option selected value="1">แสดง</option>
                                <option value="0">ซ่อน</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success news-submit" data-id="">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิดออก</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // CKEDITOR.replace('content');
        $('#addNews').on('shown.bs.modal', function() {
            $('.summernote2').summernote({
                dialogsInBody: true,
                maximumImageFileSize: 1024 * 1024, // 500 KB
                callbacks: {
                    onImageUpload: function(files) {
                        console.log(files);
                        if (files.length == 0) return;
                        if (files[0].size / 1024 / 1024 > 1) {
                            Swal.fire({
                                title: 'ไฟล์มีขนาดใหญ่เกินไป',
                                icon: 'warning',
                                confirmButtonText: 'ตกลง',
                                showCloseButton: true
                            });
                            return;
                        }
                        if (files.length > 0) {
                            console.log(files);
                            var formData = new FormData();
                            formData.append("_token", "{{ csrf_token() }}");
                            formData.append("file", files[0]);

                            $.ajax({
                                contentType: false, // The content type used when sending data to the server.
                                cache: false, // To unable request pages to be cached
                                processData: false, //
                                enctype: 'multipart/form-data',
                                url: 'upload_photo',
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: formData,
                                success: function(response) {
                                    if (response != '') {
                                        var image = $('<img>').attr('src', response);
                                        console.log(image);
                                        $('.summernote2').summernote("insertNode", image[0]);
                                    }

                                },
                                error: function(error) {

                                }
                            });
                        }
                    }
                    // onImageUploadError: function(msg) {
                    //     Swal.fire({
                    //         title: 'ไฟล์มีขนาดใหญ่เกินไป',
                    //         icon: 'warning',
                    //         confirmButtonText: 'ตกลง',
                    //         showCloseButton: true
                    //     });
                    // },
                }
            });
        })

        $('.summernote').summernote({
            placeholder: 'เนื้อหาข่าวประชาสัมพันธ์',
            tabsize: 2,
            height: 200,
            fontSizes: ['12', '14', '16', '18', '24', '36', '48', '60', '72'],
            toolbar: [
                ['fontname', ['fontname']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture', 'link', 'table', 'hr']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['view', ['undo', 'redo', 'help']],
            ],
            maximumImageFileSize: 1024 * 1024, // 500 KB
            callbacks: {
                onImageUpload: function(files) {
                    // upload image to server and create imgNode...
                    if (files.length == 0) return;
                    if (files[0].size / 1024 / 1024 > 1) {
                        Swal.fire({
                            title: 'ไฟล์มีขนาดใหญ่เกินไป',
                            icon: 'warning',
                            confirmButtonText: 'ตกลง',
                            showCloseButton: true
                        });
                        return;
                    }
                    if (files.length > 0) {
                        console.log(files);
                        var formData = new FormData();
                        formData.append("_token", "{{ csrf_token() }}");
                        formData.append("file", files[0]);

                        $.ajax({
                            contentType: false, // The content type used when sending data to the server.
                            cache: false, // To unable request pages to be cached
                            processData: false, //
                            enctype: 'multipart/form-data',
                            url: 'upload_photo',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: formData,
                            success: function(response) {
                                if (response != '') {
                                        var image = $('<img>').attr('src', response);
                                        console.log(image);
                                        $('.summernote2').summernote("insertNode", image[0]);
                                    }
                            },
                            error: function(error) {

                            }
                        });
                    }
                },

            }
        });

        $('.delect-news').click(function(e) {
            e.preventDefault();
            const id = $(this).data('id');

            Swal.fire({
                title: 'ยืนยันการลบ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ปิดออก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "Get",
                        url: "/delete_news/" + id,
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

        });
    </script>
@endsection
