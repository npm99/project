$('#import_file').click(function(e) {
    e.preventDefault();
    $("#file:hidden").trigger('click');
});

$('#file').change(function(e) {
    e.preventDefault();
    if ($(this).val() != '') {
        $("#click_import:hidden").trigger('click');
    }
});

function onImport() {

    var file = $("input[name='import_file']").val();
    console.log(file);
    data = {
        // token: _token,
        import_file: file,
    };
    // console.log(data);
    $('#loader').removeClass('hidden');
    var formData = new FormData();
    formData.append("import_file", $('input[name=import_file]')[0].files[0]);
    $.ajax({
        url: '/import',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: false, // The content type used when sending data to the server.
        // cache: false, // To unable request pages to be cached
        processData: false, //
        enctype: 'multipart/form-data',
        data: formData,
        success: function(response) {
            $('#loader').addClass('hidden');
            if (response.success) {

                Swal.fire({
                    title: 'บันทึกข้อมูลสำเร็จ',
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
                    title: 'บันทึกข้อมูลไม่สำเร็จ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        },
        error: function(error) {
            console.log(error);
            Swal.fire({
                title: 'PHP ERROR',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        }
    });
}

$(".coursetqf3-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var c_id = $("select[name=course]").val();
    var id = $('input[name="idtqf3"]').val();

    $data = {
        token: _token,
        id: id,
        c_id: c_id,
    };
    //     console.log(data);

    $.ajax({
        url: '/addcourse_tqf3',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $data,
        success: function(response) {
            if (response.success) {
                $.toast({
                    icon: 'success',
                    // heading: 'Positioning',
                    text: 'บันทึกหลักสูตรสำเร็จ',
                    position: 'top-right',
                    stack: false
                });
            } else {
                $.toast({
                    icon: 'error',
                    // heading: 'Positioning',
                    text: 'บันทึกหลักสูตรไม่สำเร็จ',
                    position: 'top-right',
                    stack: false
                })
            }
        },
        error: function(error) {
            // console.log(error);

        }
    });
});

$(".coursetqf5-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var c_id = $("select[name=course]").val();
    var id = $('input[name="idtqf5"]').val();

    $data = {
        token: _token,
        id: id,
        c_id: c_id,
    };
    //     console.log(data);

    $.ajax({
        url: '/addcourse_tqf5',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $data,
        success: function(response) {
            if (response.success) {
                $.toast({
                    icon: 'success',
                    // heading: 'Positioning',
                    text: 'บันทึกหลักสูตรสำเร็จ',
                    position: 'top-right',
                    stack: false
                });
            } else {
                $.toast({
                    icon: 'error',
                    // heading: 'Positioning',
                    text: 'บันทึกหลักสูตรไม่สำเร็จ',
                    position: 'top-right',
                    stack: false
                })
            }
        },
        error: function(error) {
            // console.log(error);

        }
    });
});

$(".ben-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var fac_id = $("select[ name=txtFacultyID]").val();
    var name = $("input[name=txtBranchname]").val();
    var code = $("input[name=txtBranchcode]").val();
    var ben_id = $("input[name=id]").val();

    var data = {
            token: _token,
            fac_id: fac_id,
            name: name,
            code: code,
            ben_id: ben_id
        }
        // console.log(data);


    if (fac_id == '' || name == '' || code == '' || ben_id == '' || !isNaN(name) || !isNaN(code)) {
        $('.formbranch').find('input').each(function(index, element) {
            // element == this

            if ($(this).val() != '') {
                $(this).removeClass('error');
                $('#show' + (index - 1)).hide();
            } else {
                $(this).addClass('error');
                $('#show' + (index - 1)).show();
            }
            if ($(this).val() != '' && !isNaN($(this).val())) {
                $('#show' + (index - 1)).show();
                $('#show' + (index - 1)).text('กรุณากรอกข้อมูลให้ถูกต้อง')
            }
        });
    } else {
        $.ajax({
            url: 'addbench',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: data,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
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
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});

$(".add-fac").click(function(e) {

    e.preventDefault();
    const _data = $(this).data('data');
    var _token = $('#editFac' + _data + ' input[name=_token]').val();
    var fac = $('#editFac' + _data + " input[name=fac]").val();
    var fac_id = $('#editFac' + _data + " input[name=id]").val();

    data = {
            token: _token,
            fac: fac,
            fac_id: fac_id
        }
        // console.log(data);isNaN(str1)
    if (fac == '') {
        $('#editFac' + _data + ' #fac_empty').text('กรุณากรอกคณะ');
    } else if (!isNaN(fac)) {
        $('#editFac' + _data + ' #fac_empty').text('กรุณากรอกคณะให้ถูกต้อง');
    } else {
        $.ajax({
            url: 'addfac',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                token: _token,
                fac: fac,
                fac_id: fac_id
            },
            success: function(response) {
                if (response.success) {
                    document.getElementById("fac").value = "";
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
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
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    })
                }
            },
            error: function(error) {
                console.log(error)
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});

$(document).on('click', ".add-group", function(e) {

    e.preventDefault();
    const _data = $(this).data('data');
    var _token = $('#editGroup' + _data + ' input[name=_token]').val();
    var group = $('#editGroup' + _data + " input[name=group]").val();
    var group_id = $('#editGroup' + _data + " input[name=id]").val();

    data = {
            token: _token,
            group: group,
            group_id: group_id
        }
        // console.log(data);isNaN(str1)
    if (group == '') {
        $('#editGroup' + _data + ' #group_empty').text('กรุณากรอกกลุ่มเรียน');
    } else {
        $.ajax({
            url: 'addgroup',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                token: _token,
                group: group,
                group_id: group_id
            },
            success: function(response) {
                if (response.success) {
                    document.getElementById("group").value = "";
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
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
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    })
                }
            },
            error: function(error) {
                console.log(error)
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});


$(".sub-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var sub_id = $("input[ name=idsub]").val();
    var thname = $("input[name=thsub]").val();
    var enname = $("input[name=ensub]").val();
    var sub_groub = $("input[name=groub]").val();
    var subnum = $("input[name=subnum]").val();
    var credit = $("input[name=credit]").val();
    var id = $("input[name=id]").val();

    // console.log(subnum)

    if (sub_id == '' || thname == '' || enname == '' || sub_groub == "" || credit == '' || id == "" || subnum == '') {
        $('.addsub').find('input').each(function(index, element) {
            // element == this
            var check = false;
            if ($(this).val() == '') {
                $(this).addClass('error');
                if (index - 1 == 1) {
                    $('#show' + (index - 1)).text('กรุณากรอกรหัสวิชา');
                }
                $('#show' + (index - 1)).show();
                // console.log('show ' + (index - 1))
            } else {
                $(this).removeClass('error');
                $('#show' + (index - 1)).hide();
            }
            if (sub_id.length < 10) {
                $('#show1').show();
                $('#show1').text('กรุณากรอกรหัสวิชาอย่างน้อย 10 ตัว');
                return;
            } else {
                $('#show1').hide();
                $('#show1').text('กรุณากรอกรหัสวิชา');
            }
        });
    } else {
        if (sub_id.length < 10) {
            $('#show1').show();
            $('#show1').text('กรุณากรอกรหัสวิชาอย่างน้อย 10 ตัว');
            return;
        } else {
            $('#show1').hide();
            $('#show1').text('กรุณากรอกรหัสวิชา');
        }
        // console.log(check)
        var data = {
            token: _token,
            sub_id: sub_id,
            thname: thname,
            enname: enname,
            sub_groub: sub_groub,
            credit: credit,
            id: id,
            subnum: subnum
        };
        console.log(data);
        $.ajax({
            url: 'addsub',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: data,
            success: function(response) {
                if (response.success) {
                    // document.getElementById("idsub").value = "";
                    // document.getElementById("thsub").value = "";
                    // document.getElementById("ensub").value = "";
                    // document.getElementById("groub").value = "";
                    // document.getElementById("credit").value = "";
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        $('#addsub').modal('toggle');
                        var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $('#search').val();
                        loadPosts(url);
                    }, 300);
                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});

$(document).on('click', '.term-submit', function(e) {

    e.preventDefault();
    const _data = $(this).data('data');
    const numbers = /^[0-9]+$/;
    var _token = $('#editYear' + _data + ' input[name=_token]').val();
    var id = $('#editYear' + _data + ' input[name=id]').val();
    var term = $('#editYear' + _data + " select[name=term]").val();
    var year = $('#editYear' + _data + " select[name=year]").val();
    var active = $('#editYear' + _data + " select[name=active]").val();

    $data = {
        token: _token,
        id: id,
        term: term,
        year: year,
        active: active
    };
    console.log($data, 'editYear' + _data);
    // if (!year.match(numbers)) {
    //     alert('sss')
    //     return;
    // }
    // console.log($data);
    if (term == '' && year == '') {
        $('#editYear' + _data + ' #term_empty').text('กรุณาเลือกเทอม');
        $('#editYear' + _data + ' #year_empty').text('กรุณากรอกปี');
    } else if (term == '') {
        $('#editYear' + _data + ' #term_empty').text('กรุณาเลือกเทอม');
    } else if (year == '') {
        $('#editYear' + _data + ' #year_empty').text('กรุณากรอกปี');
    } else if (year < 0) {
        $('#editYear' + _data + ' #year_empty').text('กรุณากรอกปีให้ถูกต้อง');
    } else {
        $.ajax({
            url: 'addterm',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    document.getElementById("textTerm").value = 1;
                    document.getElementById("textYear").value = "";
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        location.reload();
                    }, 500);

                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    })
                }
            },
            error: function(error) {
                console.log(error)
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});

$(".news-submit").click(function(e) {

    e.preventDefault();
    // var detailData = CKEDITOR.instances['detail'].getData();
    // $('#detail').html(detailData);

    // for (var detail in CKEDITOR.instances) { CKEDITOR.instances[detail].updateElement(); }

    const key_id = $(this).data('id');
    var _token = $('#addNews' + key_id + ' input[name=_token]').val();
    var id = $('#addNews' + key_id + ' input[name="id"]').val();
    var topic = $('#addNews' + key_id + ' input[name="topic"]').val();
    var status = $('#addNews' + key_id + ' select[name="status"]').val();
    // var content = $("textarea[name=content]").val();
    var content = $('#addNews' + key_id + ' #content').summernote('code');
    var file = $('#addNews' + key_id + ' #file')[0];
    if (file.value != '') {
        if (file.files[0].type.split('/')[0] !== 'image') {
            $('#addNews' + key_id + ' #empty_file').show();
        } else {
            $('#addNews' + key_id + ' #empty_file').hide();
        }
    }

    if (topic == '') {
        $('#addNews' + key_id + ' #empty_topic').show();
    } else {
        $('#addNews' + key_id + ' #empty_topic').hide();
    }
    if ($('#content').summernote('isEmpty')) {
        $('#addNews' + key_id + ' #empty_content').show();
    } else {
        $('#addNews' + key_id + ' #empty_content').hide();
    }


    // data = {
    //         token: _token,
    //         topic: topic,
    //         content: content,
    //         date: date,
    //         file: file
    //     },
    // console.log(data);
    if (topic != '' && !$('#addNews' + key_id + ' #content').summernote('isEmpty')) {

        var formData = new FormData();
        formData.append("_token", _token);
        formData.append("id", id);
        formData.append("topic", topic);
        formData.append("content", content);
        formData.append("status", status);
        // formData.append("date", date);
        formData.append("file", $('#addNews' + key_id + ' #file')[0].files[0]);

        $.ajax({
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, //
            enctype: 'multipart/form-data',
            url: 'addnews',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            success: function(response) {
                if (response.success) {
                    // document.getElementById("topic").value = "";
                    document.getElementById("content").value = "";
                    document.getElementById("file").value = "";
                    // CKEDITOR.instances[detail].updateElement();
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
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
                        title: 'บันทึกข้อมูลไม่สำเร็จ',
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });

                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }
});

$(".user-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var uid = $('input[id=uid]').val();
    var username = $('input[id=username]').val();
    var prefix = $('[name="prefix"]').val();
    var fname = $('input[name=fname]').val();
    var lname = $('input[name=lname]').val();
    var userCode = $('input[name=uCode]').val();
    var level = $('select[name=level] option[disabled]:selected').val();
    var ben = $('select[name=ben]').val();
    var title = $('select[name=title]').val();

    // console.log(level);
    // $('#formlogin').find('select').each(function(index, element) {
    //     // element == this
    //     if ($(this).val() == null || $(this).val() == '') {
    //         $('#empty' + (index + 1)).show();
    //     } else {
    //         $('#empty' + (index + 1)).hide();
    //     }

    //     console.log(uid + username + prefix + fname + lname + userCode + level + ben + title)
    // });

    if (uid == '' || username == '' || prefix == '' || fname == '' || lname == '' || userCode == '' || ben == null || title == null && $("#formtitle").is(":visible")) {
        $('#formlogin').find('select').each(function(index, element) {
            // element == this
            if ($(this).attr("name") !== 'level') {
                if ($(this).val() == null || $(this).val() == '') {
                    $('#empty' + (index + 1)).show();
                } else {
                    $('#empty' + (index + 1)).hide();
                }
            }
            // console.log($(this).val())
        });
    } else {
        var data = {
            token: _token,
            userID: uid,
            userCode: userCode,
            level_LevelID: level,
            branch_idBranch: ben,
            Uprefix: prefix,
            UFName: fname,
            ULName: lname,
            Username: username,
            Title: title,
            userCode: '',
        }
        console.log(data);
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: '/adduser',
            method: 'POST',
            type: "POST",
            dataType: "json",
            crossDomain: true,
            data: data,
            success: function(response) {
                if (response.success) {
                    // if (response.level == '1') {
                    //     window.location = '/officer'
                    // } else {
                    //     window.location = '/teacher'
                    // }
                    Swal.fire({
                        title: 'ยืนยันข้อมูลสำเร็จ',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'ยืนยันข้อมูลไม่สำเร็จ',
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    }

});

$(".edituser-submit").click(function(e) {

    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var uid = $('input[id=uid]').val();
    var username = $('input[id=username]').val();
    var prefix = $('[id="prefix"]').val();
    var fname = $('input[id=fname]').val();
    var lname = $('input[id=lname]').val();
    var ben = $('select[name="ben"]').val();
    var fac = $('select[name="fac"]').val();
    var level = $('select[name="level"]').val();

    //var  = $('input[id=uid]').val();

    data = {
        token: _token,
        userID: uid,
        level_LevelID: level,
        branch_idBranch: ben,
        Uprefix: prefix,
        UFName: fname,
        ULName: lname,
        Username: username,
    };

    if (level == 2) {
        var chairman = $('select[name="chairman"]').val();
        data.chairman = chairman;
    }
    if (level == 1) {
        var is_editor = $('select[name="is_editor"]').val();
        data.is_editor = is_editor;

    }
    console.log(data);
    $.ajax({
        url: '/adduser',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: data,
        success: function(response) {
            if (response.success) {

                Swal.fire({
                    title: 'ยืนยันข้อมูลสำเร็จ',
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
                    title: 'ยืนยันข้อมูลไม่สำเร็จ',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        },
        error: function(error) {
            console.log(error);
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        }
    });
});

$('.course-submit').click(function(e) {
    e.preventDefault();
    const key = $(this).data('key');
    var _token = $('input[name=_token]').val();
    var id = $('#editCourse' + key + ' input[name=cid]').val();
    var course = $('#editCourse' + key + ' input[name=course]').val();
    var course_num = $('#editCourse' + key + ' input[name=numcourse]').val();

    $data = {
        _token: _token,
        id: id,
        name: course,
        num: course_num
    }

    // console.log($data)

    if (course != '' && course_num != '' && isNaN(course)) {
        $('#course_empty').text('');
        $('#numcourse_empty').text('');
        $.ajax({
            type: "post",
            url: "/addcourse",
            data: $data,
            dataType: "json",
            success: function(response) {
                // console.log(response)
                if (response.success) {
                    // if (response.level == '1') {
                    //     window.location = '/officer'
                    // } else {
                    //     window.location = '/teacher'
                    // }
                    Swal.fire({
                        title: 'บันทึกข้อมูลสำเร็จ',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                    // sessionStorage.setItem('save_course', true);

                    // $('#course-tab2').addClass('active');

                    //dom not only ready, but everything is loaded

                } else {
                    Swal.fire({
                        title: response.message,
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            },
            error: function(error) {
                console.log(error);
                Swal.fire({
                    title: 'ERROR',
                    icon: 'error',
                    confirmButtonText: 'ตกลง',
                    showCloseButton: true
                });
            }
        });
    } else {
        // Swal.fire({
        //     title: 'กรุณากรอกข้อมูลให้ครบ',
        //     icon: 'error',
        //     confirmButtonText: 'ตกลง',
        //     showCloseButton: true
        // });
        $('#editCourse' + key + ' #course_empty').text('กรุณากรอกข้อมูลหลักสูตร');
        $('#editCourse' + key + ' #numcourse_empty').text('กรุณากรอกจำนวนปีหลักสูตร');

    }
    if (course != '') {
        $('#editCourse' + key + ' #course_empty').text('');
    }
    if (course_num != '') {
        $('#editCourse' + key + ' #numcourse_empty').text('');
    }
    if (!isNaN(course)) {
        $('#editCourse' + key + ' #course_empty').text('กรุณากรอกข้อมูลให้ถูกต้อง');
    }

});

$(function() {
    if (sessionStorage.getItem('save_course')) {
        $('#sub-tab1').even().removeClass("active");
        $('#tab1').even().removeClass("show active");
        $('#course-tab2').addClass('active');
        $('#tab2').addClass('show active');
        sessionStorage.removeItem('save_course');
    }

});

function confirmUser(data) {
    console.log(data);
}

function editcourse(id, c_name, c_num) {

    // var opener = e.relatedTarget;
    // var name = $(opener).data('name');
    // var fac = $(opener).data('fac');
    // var code = $(opener).data('code');
    // var id = $(".formbranch").data('id');

    // $(".addcourse").find('[name="txtBranchname"]').val(data.branchName);
    // $(".addcourse").find('[name="txtBranchcode"]').val(data.branchcode);
    $(".addcourse").find('[name="numcourse"]').val(c_num);
    $(".addcourse").find('[name="course"]').val(c_name);
    $(".addcourse").find('[name="cid"]').val(id);
    $(".course-submit").text('บันทีก');
    // console.log(data);
}

function editben(data) {

    // var opener = e.relatedTarget;
    // var name = $(opener).data('name');
    // var fac = $(opener).data('fac');
    // var code = $(opener).data('code');
    var id = $(".formbranch").data('id');

    $(".formbranch").find('[name="txtBranchname"]').val(data.branchName);
    $(".formbranch").find('[name="txtBranchcode"]').val(data.branchcode);
    $(".formbranch").find('[name="txtFacultyID"]').val(data.factory_idfactory);
    $(".formbranch").find('[name="id"]').val(data.idBranch);
    // console.log(data);
}

function editsub(data) {

    // var opener = e.relatedTarget;
    // var data = $(opener).data('sub');
    // var fac = $(opener).data('fac');
    // var code = $(opener).data('code');
    // var id = $('.addsub').data('id');
    // // console.log(id);
    $('.addsub').find('[name="idsub"]').val(data.subjectCode);
    $('.addsub').find('[name="thsub"]').val(data.THsubject);
    $('.addsub').find('[name="ensub"]').val(data.ENsubject);
    // $('.addsub').find('[name="groub"]').val(data.group.groupname);
    $('.addsub').find('[name="credit"]').val(data.cradit);
    $('.addsub').find('[name="id"]').val(data.idsubject);
    $('.addsub').find('[name="subnum"]').val(data.subNumber);

}

function edityear(data) {

    // var opener = e.relatedTarget;
    // var data = $(opener).data('sub');
    // var fac = $(opener).data('fac');
    // var code = $(opener).data('code');
    // var id = $('.addsub').data('id');
    // // console.log(id);
    $('.addyear').find('input[name="id"]').val(data.idYear);
    $('.addyear').find('select[name="term"]').val(data.term);
    $('.addyear').find('[name="year"]').val(data.Year);
    $(".term-submit").text('บันทีก');
    // $('.addsub').find('[name="ensub"]').val(data.ENsubject);
    // $('.addsub').find('[name="groub"]').val(data.group.groupname);
    // $('.addsub').find('[name="credit"]').val(data.cradit);
    // $('.addsub').find('[name="id"]').val(data.idsubject);

}

function editFac(data) {
    // var name = $('.editfac').data('name');
    // var id = $('.editfac').data('id');

    var name = data.factoryName;
    var id = data.idfactory;

    $('.addfac').find('[name="fac"]').val(name);
    // $(this).find('[name="txtBranchcode"]').val(code);
    // $(this).find('[name="txtFacultyID"]').val(fac);
    $('.addfac').find('[name="id"]').val(id);
    $(".add-fac").text('บันทีก');
    // console.log(id);
}

function selectsubject(data) {
    // // console.log(data);
    $("#tabletqf tr").remove();
    var row2 = '<tr data-subject="' + data.idsubject + '">' +
        '<td>' + data.subjectCode + '</td>' +
        '<td>' + data.THsubject + '</td>';
    // '<td>' + data.group.groupname + '</td>' +
    $('#tabletqf').append(row2);
    $('#selectsub').modal('hide');
}

function selectgroup(data) {
    // // console.log(data);
    $("#tabletqf tr").remove();
    var row2 = '<tr data-subject="' + data.idsubject + '">' +
        '<td>' + data.subjectCode + '</td>' +
        '<td>' + data.THsubject + '</td>' +
        '<td>' + data.group.groupname + '</td>';
    $('#tabletqf').append(row2);
    $('#selectsub').modal('hide');
}

function edituser(data) {

    // var opener = e.relatedTarget;
    // var data = $(opener).data('sub');
    // var fac = $(opener).data('fac');
    // var code = $(opener).data('code');
    // var id = $('.edituser').data('id');
    // // console.log(data);
    $('.edituser').find('[name="uid"]').val(data.userID);
    $('.edituser').find('[name="username"]').val(data.Username);
    $('.edituser').find('[name="prefix"]').val(data.Uprefix);
    $('.edituser').find('[name="fname"]').val(data.UFName);
    $('.edituser').find('[name="lname"]').val(data.ULName);
    $('.edituser').find('[name="level"]').val(data.level_LevelID);
    $('.edituser').find('[name="fac"]').val(data.subfac.factory_idfactory);
    $('.edituser').find('[name="ben"]').val(data.subfac.idBranch);
    $('.edituser').find('[name="is_editor"]').val(data.is_editor);


    if (data.level_LevelID == '2') {
        $('.edituser').find('#formchairman').show();
        $('.edituser').find('#formtitle').show();
        $('.edituser').find('[name="title"]').val(data.Title);
        $('.edituser').find('[name="chairman"]').val(data.chairman);
        $('.edituser').find('#form_is_editor').hide();
    } else {
        $('.edituser').find('#form_is_editor').show();
        $('.edituser').find('#formchairman').hide();
        $('.edituser').find('#formtitle').hide();
        const session = $('.edituser').find('[name="session"]').val();
        if (session == data.userID) {
            $('.edituser').find('#is_editor').attr('disabled', true);
        } else {
            $('.edituser').find('#is_editor').attr('disabled', false);
        }
    }



}