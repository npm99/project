//============================ TQF3 =================================================
var term3_id = '';

function select3_term(id, text_term) {
    term3_id = id;
    $("#year").val(text_term);
    //console.log(id);
    //console.log(text_term);
    $('#addyear').modal('hide');

}

var teacher3_id = [];

// function select3_teacher(id, text_teacher) {
//     teacher3_id = id;
//     $("#teacher").val(text_teacher);
//     //console.log(teacher3_id);
//     //console.log(text_teacher);
//     $('#addteacher').modal('hide');

// }

$("input:checkbox[name=row-teacher3]").click(function() {
    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        teacher3_id.push(checked);
        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-user="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>' +
            '<td>' + rows.cells[2].innerHTML + '</td>' +
            '<td>' + rows.cells[3].innerHTML + '</td>';
        $("#table_user").show();
        $('#edittqf3 #user_list').append(row2);
        $('#addtqf3 #user_list').append(row2);
    } else {
        var checked = ($(this).val());
        teacher3_id.splice($.inArray(checked, teacher3_id), 1);
        $("#edittqf3 #user_list").find("tr").each(function() {
            var subject = $(this).data("user");
            if (subject == checked) {
                $(this).remove();
            }
        });
        $("#addtqf3 #user_list").find("tr").each(function() {
            var subject = $(this).data("user");
            if (subject == checked) {
                $(this).remove();
            }
        });
        if (teacher3_id.length == 0) {
            $("#table_user").hide();
        }
    }
});

var selectids3_arr = [];
// var select3_arr = [];
$("input:checkbox[name=row-check3]").click(function(index, rowId) {
    var t = $('#example').DataTable();

    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        // var check_js = JSON.parse(checked);
        selectids3_arr.push(checked);
        // select3_arr.push();
        // console.log(document.getElementById("example2").rows.item().innerHTML);
        var rows = $(this).closest("tr")[0];
        // console.log(row);
        // var row2 = '<tr data-subject="' + check_js.idsubject + '">' +
        // '<td>' + rows.cells[1].innerHTML + '</td>' +
        // '<td>' + rows.cells[2].innerHTML + '</td>' +
        // '<td>' + rows.cells[3].innerHTML + '</td>';

        // $('#sub_list').append(row2);
        $("#table_sub").show();
        // t.row.add([
        //     rows.cells[1].innerHTML,
        //     rows.cells[2].innerHTML,
        //     rows.cells[3].innerHTML,
        // ]).node().id = 'data' + checked;
        // t.draw(false);
        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-subject="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>' +
            '<td>' + rows.cells[2].innerHTML + '</td>';
        // '<td>' + rows.cells[3].innerHTML + '</td>'+
        $('#sub_list').append(row2);
        //console.log(selectids3_arr);

    } else {
        selectids3_arr.splice($.inArray(checked, selectids3_arr), 1);
        // select3_arr.splice($.inArray(checked, select3_arr), 1);
        var checked = ($(this).val());
        var check_js = JSON.parse(checked);
        // $("#sub_list").find("tr").each(function() {
        //         // var subject = $(this).data("subject");
        //         // if (subject == check_js.idsubject) {
        //         //     $(this).remove();
        //         // }
        // t.row('#data' + checked).remove().draw();
        $("#sub_list").find("tr").each(function(index, element) {
            var subject = $(this).data("subject");
            if (subject == checked) {
                $(this).remove();
            }

        });

        if (selectids3_arr.length == 0) {
            $("#table_sub").hide();
        }
    }
});


$('#select_record').click(function() {

    // Read all checked checkboxes
    //console.log(selectids3_arr);
    $('#addsub').modal('hide');

    // Check checkbox checked or not
    // if(selectids_arr.length > 0){

    //    // Confirm alert
    //    var confirmdelete = confirm("Do you really want to Delete records?");
    //    if (confirmdelete == true) {
    //       $.ajax({
    //          url: 'ajaxfile.php',
    //          type: 'post',
    //          data: {request: 2,deleteids_arr: deleteids_arr},
    //          success: function(response){
    //             //dataTable.ajax.reload();
    //          }
    //       });
    //    } 
    // }
});

var groupids3_arr = [];
$("input:checkbox[name=row-group3]").click(function() {
    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        groupids3_arr.push(checked);
        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-group="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>';
        // '<td>' + rows.cells[3].innerHTML + '</td>'+
        // $("#group_list").show();
        // $('#edittqf3 #group_list').append(row2);
        $('#addtqf3 #group_list').append(row2);
    } else {
        var checked = ($(this).val());
        groupids3_arr.splice($.inArray(checked, groupids3_arr), 1);
        $("#addtqf3 #group_list").find("tr").each(function() {
            var group = $(this).data("group");
            if (group == checked) {
                $(this).remove();
            }
        });
        // $("#edittqf3 #group_list").find("tr").each(function() {
        //     var group = $(this).data("group");
        //     if (group == checked) {
        //         $(this).remove();
        //     }
        // });
        // if (groupids3_arr.length == 0) {
        //     $("#group_list").hide();
        // }
    }
    console.log(groupids3_arr);
});
// $("input:checkbox[name=row-group3]").click(function() {
//     var t = $('#example').DataTable();
//     if ($(this).is(':checked')) {
//         var checked = ($(this).val());
//         groupids3_arr.push(checked);
//         var rows = $(this).closest("tr")[0];
//         // console.log(rows.cells[1].innerHTML);
//         var row2 = '<tr data-group="' + checked + '">' +
//             '<td>' + rows.cells[1].innerHTML + '</td>';
//         // '<td>' + rows.cells[3].innerHTML + '</td>'+
//         $('#group_list').append(row2);
//         //console.log(selectids5_arr);
//     } else {
//         groupids3_arr.splice($.inArray(checked, groupids3_arr), 1);
//         // select3_arr.splice($.inArray(checked, select3_arr), 1);
//         var checked = ($(this).val());
//         var check_js = JSON.parse(checked);
//         // $("#sub_list").find("tr").each(function() {
//         //         // var subject = $(this).data("subject");
//         //         // if (subject == check_js.idsubject) {
//         //         //     $(this).remove();
//         //         // }
//         // t.row('#data' + checked).remove().draw();
//         $("#group_list").find("tr").each(function() {
//             var group = $(this).data("group");
//             if (group == checked) {
//                 $(this).remove();
//             }
//         });
//         if (groupids3_arr.length == 0) {
//             $("#group_list").hide();
//         }
//     }
// });

function savetqf3() {
    var text_check = [];

    var date = $("#addtqf3 #date").val();
    var _token = $('#addtqf3 input[name=_token]').val();
    var id_tqf3 = $('#addtqf3 input[name="idtqf3"]').val();
    var term3_id = $('#addtqf3 select[name="tqf_year"]').val()
    var group = $('#addtqf3 select[name="tqf_group"]').val();
    var teach = $('#addtqf3 select[name="tqf_teacher"]').val();

    if (!teacher3_id.includes(teach)) {
        Swal.fire({
            title: 'กรุณาเลือกอาจารย์ผู้รับผิดชอบรายวิชาที่อยู่ในกลุ่มอาจารย์',
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        return;
    }

    if (teacher3_id.length == 0 && selectids3_arr.length == 0 && term3_id == '' && date == '' && groupids3_arr.length == 0) {
        // alert('กรุณากรอกข้อมูลให้ครบ');
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
    } else if (teacher3_id.length == 0 || selectids3_arr.length == 0 || term3_id == '' || date == '' || groupids3_arr.length == 0) {
        if (teacher3_id.length == 0) {
            // alert('กรุณาเลือกอาจารย์');
            text_check.push('อาจารย์');
        }
        if (selectids3_arr.length == 0) {
            // alert('กรุณาเลือกรายวิชา');
            text_check.push('รายวิชา');
        }
        if (groupids3_arr.length == 0) {
            // alert('กรุณาเลือกรายวิชา');
            text_check.push('กลุ่มเรียน');
        }
        if (term3_id == '') {
            // alert('กรุณาเลือกปีการศึกษา');
            text_check.push('ปีการศึกษา');
            // $('#year_empty').text('กรุณาเลือกปีการศึกษา');
        }
        if (date == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('วันที่สิ้นสุดการส่งมคอ.');
            $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
        }
        if (teach == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('อาจารย์ผู้รับผิดชอบรายวิชา');
        }
        Swal.fire({
            text: 'กรุณาใส่ข้อมูล' + text_check,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        // alert('กรุณาเลือก' + text_check);
    } else {
        data = {
            _token: _token,
            term_id: term3_id,
            teacher_id: JSON.stringify(teacher3_id),
            date: date,
            arr_sub: JSON.stringify(selectids3_arr),
            id_tqf3: id_tqf3,
            group: group,
            teach: teach
        }
        console.log(data);

        $.ajax({
            url: 'tqf/addtqf3_new',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                _token: _token,
                term_id: term3_id,
                teacher_id: teacher3_id,
                date: date,
                arr_sub: selectids3_arr,
                id_tqf3: id_tqf3,
                filetqf: '',
                arr_group: JSON.stringify(groupids3_arr),
                teach: teach
            },
            //JSON.stringify()
            success: function(response) {
                if (response.success) {
                    $(".formtqf3 input").each(function() {
                        $(this).val("");
                    });
                    $("#user_list").empty();
                    $("#sub_list").empty();
                    $("input:checkbox[name=row-check3]").prop("checked", false);
                    selectids3_arr = [];
                    teacher3_id = [];
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


}

function edittqf3() {

    var _token = $('#edittqf3 input[name=_token]').val();
    var _term3_id = $('#edittqf3 select[name="year"]').val();
    // var _teacher3_id = $('#edittqf3 select[name="teacher"]').val();
    var date = $('#edittqf3 input[name="dateline"]').val();
    var id_tqf3 = $('#edittqf3 input[name="idtqf3"]').val();
    var id_sub = $('#edittqf3 #tabletqf tr').data('subject');
    var group = $('#edittqf3 select[name="tqf_group"]').val();
    var is_file = $('#edittqf3 input[name="is_file"]').val();
    var teach = $('#edittqf3 [name="tqf_teacher"]').val();


    console.log(is_file);
    var text_check = []
    if (is_file == 0) {
        if (!teacher3_id.includes(teach)) {
            Swal.fire({
                title: 'กรุณาเลือกอาจารย์ผู้รับผิดชอบรายวิชาที่อยู่ในกลุ่มอาจารย์',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
            return;
        }
        if (teacher3_id.length == 0 && _term3_id == '' && date == '' && teach == '') {
            // alert('กรุณากรอกข้อมูลให้ครบ');
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else if (teacher3_id.length == 0 || _term3_id == '' || date == '') {
            if (teacher3_id.length == 0) {
                // alert('กรุณาเลือกอาจารย์');
                text_check.push('อาจารย์');
            }
            if (_term3_id == '') {
                // alert('กรุณาเลือกปีการศึกษา');
                text_check.push('ปีการศึกษา');
                // $('#year_empty').text('กรุณาเลือกปีการศึกษา');
            }
            if (date == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('วันที่สิ้นสุดการส่งมคอ.');
                $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
            }
            if (teach == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('อาจารย์ผู้รับผิดชอบรายวิชา');
            }
            Swal.fire({
                text: 'กรุณาใส่ข้อมูล' + text_check,
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
            // alert('กรุณาเลือก' + text_check);
        } else {
            data = {
                _token: _token,
                term_id: _term3_id,
                teacher_id: teacher3_id,
                date: date,
                arr_sub: JSON.stringify(id_sub),
                id_tqf3: id_tqf3,
                group: group,
                teach: teach
            }
            console.log(data);
            $('#loader').removeClass('hidden');
            $.ajax({
                url: 'tqf/edittqf3_new',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data,
                //JSON.stringify()
                success: function(response) {
                    $('#loader').addClass('hidden');
                    if (response.success) {
                        selectids3_arr = [];
                        teacher3_id = [];
                        $("input:checkbox[name=row-check3]").prop("checked", false);
                        Swal.fire({
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            $('#edittqf3').modal('toggle');
                            var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $('#search').val();
                            loadPosts(url);
                        }, 300);
                    } else {
                        Swal.fire({
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
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
    } else if (is_file == 1) {
        if (teacher3_id.length == 0 && _term3_id == '') {
            // alert('กรุณากรอกข้อมูลให้ครบ');
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else if (teacher3_id.length == 0 || _term3_id == '') {
            if (teacher3_id.length == 0) {
                // alert('กรุณาเลือกอาจารย์');
                text_check.push('อาจารย์');
            }
            if (_term3_id == '') {
                // alert('กรุณาเลือกปีการศึกษา');
                text_check.push('ปีการศึกษา');
                // $('#year_empty').text('กรุณาเลือกปีการศึกษา');
            }
            if (date == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('วันที่สิ้นสุดการส่งมคอ.');
                $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
            }
            Swal.fire({
                text: 'กรุณาใส่ข้อมูล' + text_check,
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
            return;
            // alert('กรุณาเลือก' + text_check);
        } else {
            data = {
                    _token: _token,
                    term_id: _term3_id,
                    teacher_id: teacher3_id,
                    date: date,
                    arr_sub: JSON.stringify(id_sub),
                    id_tqf3: id_tqf3,
                    group: group
                }
                // console.log(data);

            $.ajax({
                url: 'tqf/addtqf3',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data,
                //JSON.stringify()
                success: function(response) {
                    if (response.success) {
                        selectids3_arr = [];
                        teacher3_id = [];
                        $("input:checkbox[name=row-check3]").prop("checked", false);
                        Swal.fire({
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            $('#edittqf3').modal('toggle');
                            var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $('#search').val();
                            loadPosts(url);
                        }, 100);
                    } else {
                        Swal.fire({
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
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
    }

}

function teacherFileTqf3() {

    var validExtensions = ["doc", "pdf", "docx"]
    var file = $('input[name="file[]"]')[0].files;
    var f_error = 0;
    console.log(file)
    $.each(file, function(index, val) {
        var ext = val.name.split(".");
        ext = ext[ext.length - 1].toLowerCase();
        if (validExtensions.indexOf(ext) == -1) {
            Swal.fire({
                icon: 'warning',
                title: 'ไฟล์ที่อนุญาติ ' + validExtensions.join(', '),
                showConfirmButton: false,
                timer: 1500
            });
            f_error++;
        }
        if (val.size / 1024 / 1024 > 20) {
            Swal.fire({
                icon: 'warning',
                title: 'ขนาดไฟล์ใหญ่เกินไป',
                showConfirmButton: false,
                timer: 1500
            });
            f_error++;
        }
    });

    if (f_error > 0) {
        return;
    }


    var _token = $('input[name=_token]').val();
    var fdata = JSON.parse($('input[name=data]').val());

    var formData = new FormData();
    formData.append("_token", _token);
    formData.append("id_tqf3", fdata.tqf3ID);
    for (let i = 0; i < file.length; i++) {
        formData.append("filetqf[]", $('#filetqf')[0].files[i]);
    }
    $('#loader').removeClass('hidden');
    $.ajax({
        url: '/upfile_tqf3',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: false,
        processData: false, //
        enctype: 'multipart/form-data',
        data: formData,
        success: function(response) {
            if (response.success) {
                $('#loader').addClass('hidden');
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
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        }
    });

}

function deletetqf3(data) {
    Swal.fire({
        title: 'ยืนยัน',
        text: "คุณต้องการที่จะลบใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'ยกเลิก',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deletetqf3',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { id_tqf3: data },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'ลบข้อมูลสำเร็จ',
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
                        title: 'ERROR',
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            });
        }
    })



}

function addFileTqf() {
    var _token = $('input[name=_token]').val();
    var teacher = $("select[name=teacher]").val();
    var tqf = $("select[name=tqf]").val();
    var year = $('select[name="year"]').val();
    var subject = $('select[name="subject"]').val();
    var group = $('select[name="group"]').val();
    var id_tqf = $('input[name="idtqf"]').val();
    var file = $('input[name="file"]').val();
    var text_check = [];

    if (teacher == '' || year == '' || subject == '' || group == '' || $('#filetqf')[0].files.length == 0) {
        if (teacher == '') {
            // alert('กรุณาเลือกอาจารย์');
            text_check.push('อาจารย์');
        }
        if (year == '') {
            // alert('กรุณาเลือกปีการศึกษา');
            text_check.push('ปีการศึกษา');
            // $('#year_empty').text('กรุณาเลือกปีการศึกษา');
        }
        if (subject == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('รายวิชา');
            // $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
        }
        if (group == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('กลุ่มเรียน');
            // $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
        }
        if ($('#filetqf')[0].files.length == 0) {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            if (tqf == 'tqf3') {
                text_check.push('ไฟล์รายงานมคอ. 3');
            } else {
                text_check.push('ไฟล์รายงานมคอ. 5');
            }
            // $('#date_empty').text('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ');
        }
        Swal.fire({
            text: 'กรุณาใส่ข้อมูล' + text_check,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        return;
    }

    var validExtensions = ["doc", "pdf", "docx"];
    console.log(file)
    var ext = file.split(".");
    ext = ext[ext.length - 1].toLowerCase();
    if (validExtensions.indexOf(ext) == -1) {
        Swal.fire({
            icon: 'warning',
            title: 'ไฟล์ที่อนุญาติ ' + validExtensions.join(', '),
            showConfirmButton: false,
            timer: 1500
        });
        return;
    }
    if ($('#filetqf')[0].files[0].size / 1024 / 1024 > 20) {
        Swal.fire({
            icon: 'warning',
            title: 'ขนาดไฟล์ใหญ่เกินไป',
            showConfirmButton: false,
            timer: 1500
        });
        return;
    }

    var formData = new FormData();
    formData.append("_token", _token);
    formData.append("term_id", year);
    formData.append("teacher_id[]", [teacher]);
    formData.append("arr_sub[]", [subject]);
    formData.append("arr_group", JSON.stringify([group]));
    formData.append("filetqf", $('#filetqf')[0].files[0]);

    data = {
            _token: _token,
            term_id: year,
            // teacher_id: teacher,
            // date: date,
            arr_sub: [subject],
            id_tqf3: id_tqf,
            filetqf: file
        }
        // //// console.log(data);

    if (tqf == 'tqf3') {

        formData.append("id_tqf3", id_tqf);
        console.log(3);
        $.ajax({
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, //
            enctype: 'multipart/form-data',
            url: '/tqf/addtqf3',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            //JSON.stringify()
            success: function(response) {
                if (response.success) {
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
                        title: 'ข้อมูลซ้ำ',
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
    } else {
        formData.append("id_tqf5", id_tqf);
        console.log(5);
        $.ajax({
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, //
            enctype: 'multipart/form-data',
            url: '/tqf/addtqf5',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: formData,
            //JSON.stringify()
            success: function(response) {
                if (response.success) {
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
                        title: 'ข้อมูลซ้ำ',
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


}

//============================ TQF5 =================================================
var term5_id = '';

function select5_term(id, text_term) {
    term5_id = id;
    $("#year").val(text_term);
    //console.log(id);
    //console.log(text_term);
    $('#addyear').modal('hide');

}

var teacher5_id = [];

// function select5_teacher(id, text_teacher) {
//     teacher5_id = id;
//     $("#teacher").val(text_teacher);
//     //console.log(teacher5_id);
//     //console.log(text_teacher);
//     $('#addteacher').modal('hide');

// }
$("input:checkbox[name=row-teacher5]").click(function() {

    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        teacher5_id.push(checked);
        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-user="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>' +
            '<td>' + rows.cells[2].innerHTML + '</td>' +
            '<td>' + rows.cells[3].innerHTML + '</td>';
        $("#table_user").show();
        $('#edittqf5 #user_list').append(row2);
        $('#addtqf5 #user_list').append(row2);
    } else {
        var checked = ($(this).val());
        teacher5_id.splice($.inArray(checked, teacher5_id), 1);
        $("#edittqf5 #user_list").find("tr").each(function() {
            var subject = $(this).data("user");
            if (subject == checked) {
                $(this).remove();
            }
        });
        $("#addtqf5 #user_list").find("tr").each(function() {
            var subject = $(this).data("user");
            if (subject == checked) {
                $(this).remove();
            }
        });
        if (teacher5_id.length == 0) {
            $("#table_user").hide();
        }
    }

});



var selectids5_arr = [];
$("input:checkbox[name=row-check5]").click(function() {
    var t = $('#example').DataTable();

    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        // var check_js = JSON.parse(checked);
        selectids5_arr.push(checked);
        // select3_arr.push();
        // console.log(document.getElementById("example2").rows.item().innerHTML);
        var rows = $(this).closest("tr")[0];
        // console.log(row);
        // var row2 = '<tr data-subject="' + check_js.idsubject + '">' +
        // '<td>' + rows.cells[1].innerHTML + '</td>' +
        // '<td>' + rows.cells[2].innerHTML + '</td>' +
        // '<td>' + rows.cells[3].innerHTML + '</td>';

        // $('#sub_list').append(row2);
        $("#table_sub").show();
        // t.row.add([
        //     rows.cells[1].innerHTML,
        //     rows.cells[2].innerHTML,
        //     rows.cells[3].innerHTML,
        // ]).node().id = 'data' + checked;
        // t.draw(false);
        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-subject="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>' +
            '<td>' + rows.cells[2].innerHTML + '</td>';
        // '<td>' + rows.cells[3].innerHTML + '</td>'+
        $('#sub_list').append(row2);
        //console.log(selectids5_arr);


    } else {
        selectids5_arr.splice($.inArray(checked, selectids5_arr), 1);
        // select3_arr.splice($.inArray(checked, select3_arr), 1);
        var checked = ($(this).val());
        var check_js = JSON.parse(checked);
        // $("#sub_list").find("tr").each(function() {
        //         // var subject = $(this).data("subject");
        //         // if (subject == check_js.idsubject) {
        //         //     $(this).remove();
        //         // }
        // t.row('#data' + checked).remove().draw();
        $("#sub_list").find("tr").each(function() {
            var subject = $(this).data("subject");
            if (subject == checked) {
                $(this).remove();
            }
        });
        // if (selectids5_arr.length == 0) {
        //     $("#sub_list").hide();
        // }

    }


});

var groupids5_arr = [];
$("input:checkbox[name=row-group5]").click(function() {
    var t = $('#example').DataTable();
    console.log(33);
    if ($(this).is(':checked')) {
        var checked = ($(this).val());
        groupids5_arr.push(checked);
        var rows = $(this).closest("tr")[0];

        var rows = $(this).closest("tr")[0];
        // console.log(rows.cells[1].innerHTML);
        var row2 = '<tr data-group="' + checked + '">' +
            '<td>' + rows.cells[1].innerHTML + '</td>';
        // '<td>' + rows.cells[3].innerHTML + '</td>'+
        $('#group_list').append(row2);
        //console.log(selectids5_arr);
    } else {
        groupids5_arr.splice($.inArray(checked, groupids5_arr), 1);
        // select3_arr.splice($.inArray(checked, select3_arr), 1);
        var checked = ($(this).val());
        var check_js = JSON.parse(checked);
        // $("#sub_list").find("tr").each(function() {
        //         // var subject = $(this).data("subject");
        //         // if (subject == check_js.idsubject) {
        //         //     $(this).remove();
        //         // }
        // t.row('#data' + checked).remove().draw();
        $("#group_list").find("tr").each(function() {
            var group = $(this).data("group");
            if (group == checked) {
                $(this).remove();
            }
        });
        // if (groupids5_arr.length == 0) {
        //     $("#group_list").hide();
        // }

    }


});


function savetqf5() {
    var text_check = [];

    var date = $("#addtqf5 #date").val();
    var _token = $('#addtqf5 input[name=_token]').val();
    var id_tqf5 = $('#addtqf5 input[name="idtqf5"]').val();
    var term5_id = $('#addtqf5 select[name="tqf_year"]').val()
    var teach = $('#addtqf5 select[name="tqf_teacher"]').val();

    if (!teacher5_id.includes(teach)) {
        Swal.fire({
            title: 'กรุณาเลือกอาจารย์ผู้รับผิดชอบรายวิชาที่อยู่ในกลุ่มอาจารย์',
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        return;
    }

    if (teacher5_id.length == 0 && selectids5_arr.length == 0 && term5_id == '' && date == '') {
        // alert('กรุณากรอกข้อมูลให้ครบ');
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
    } else if (teacher5_id.length == 0 || selectids5_arr.length == 0 || term5_id == '' || date == '') {
        if (teacher5_id.length == 0) {
            // alert('กรุณาเลือกอาจารย์');
            text_check.push('อาจารย์');
        }
        if (selectids5_arr.length == 0) {
            // alert('กรุณาเลือกรายวิชา');
            text_check.push('รายวิชา');
        }
        if (groupids5_arr.length == 0) {
            // alert('กรุณาเลือกรายวิชา');
            text_check.push('กลุ่มเรียน');
        }
        if (term5_id == '') {
            // alert('กรุณาเลือกปีการศึกษา');
            text_check.push('ปีการศึกษา');
        }
        if (date == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('วันที่สิ้นสุดการส่งมคอ.');
        }
        if (teach == '') {
            // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
            text_check.push('อาจารย์ผู้รับผิดชอบรายวิชา');
        }
        Swal.fire({
            text: 'กรุณาใส่ข้อมูล' + text_check,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
    } else {
        data = {
            _token: _token,
            term_id: term5_id,
            teacher_id: teacher5_id,
            date: date,
            arr_sub: JSON.stringify(selectids5_arr),
            arr_group: JSON.stringify(groupids5_arr),
            id_tqf5: id_tqf5,
        }
        console.log(data);

        $.ajax({
            url: 'tqf/addtqf5_new',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                _token: _token,
                term_id: term5_id,
                teacher_id: teacher5_id,
                date: date,
                arr_sub: selectids5_arr,
                id_tqf5: id_tqf5,
                filetqf: '',
                arr_group: JSON.stringify(groupids5_arr),
            },
            //JSON.stringify()
            success: function(response) {
                if (response.success) {
                    $(".formtqf5 input").each(function() {
                        $(this).val("");
                    });
                    selectids5_arr = [];
                    teacher5_id = [];
                    $("#user_list").empty();
                    $("#sub_list").empty();
                    $("#group_list").empty();
                    $("input:checkbox[name=row-check5]").prop("checked", false);
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
                        title: 'ข้อมูลซ้ำ',
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
}

function edittqf5() {

    var _token = $('#edittqf5 input[name=_token]').val();
    var _term5_id = $('#edittqf5 select[name="year"]').val();
    // var _teacher5_id = $('#edittqf5 select[name="teacher"]').val();
    var date = $('#edittqf5 input[name="dateline"]').val();
    var id_tqf5 = $('#edittqf5 input[name="idtqf5"]').val();
    var id_sub = $('#edittqf5 #tabletqf tr').data('subject');
    var group = $('#edittqf5 select[name="tqf_group"]').val()
    var is_file = $('#edittqf5 input[name="is_file"]').val()
    var teach = $('#edittqf5 [name="tqf_teacher"]').val();

    var text_check = [];
    if (is_file == 0) {
        console.log(teach);
        console.log(teacher5_id);
        console.log(!teacher5_id.includes(teach));
        if (!teacher5_id.includes(parseInt(teach))) {
            Swal.fire({
                title: 'กรุณาเลือกอาจารย์ผู้รับผิดชอบรายวิชาที่อยู่ในกลุ่มอาจารย์',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
            return;
        }
        if (teacher5_id.length == 0 && _term5_id == '' && date == '') {
            // alert('กรุณากรอกข้อมูลให้ครบ');
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else if (teacher5_id.length == 0 || _term5_id == '' || date == '') {
            if (teacher5_id.length == 0) {
                // alert('กรุณาเลือกอาจารย์');
                text_check.push('อาจารย์');
            }
            if (_term5_id == '') {
                // alert('กรุณาเลือกปีการศึกษา');
                text_check.push('ปีการศึกษา');
            }
            if (date == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('วันที่สิ้นสุดการส่งมคอ.');
            }
            if (teach == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('อาจารย์ผู้รับผิดชอบรายวิชา');
            }
            Swal.fire({
                text: 'กรุณาใส่ข้อมูล' + text_check,
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else {
            data = {
                    _token: _token,
                    term_id: _term5_id,
                    teacher_id: teacher5_id,
                    date: date,
                    arr_sub: JSON.stringify(id_sub),
                    id_tqf5: id_tqf5,
                    group: group,
                    teach: teach
                }
                //// console.log(data);
            $('#loader').removeClass('hidden');
            $.ajax({
                url: 'tqf/edittqf5_new',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data,
                //JSON.stringify()
                success: function(response) {
                    $('#loader').addClass('hidden');
                    if (response.success) {
                        selectids5_arr = [];
                        teacher5_id = [];
                        Swal.fire({
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            $('#edittqf5').modal('toggle');
                            var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $('#search').val();
                            loadPosts(url);
                        }, 300);
                    } else {
                        Swal.fire({
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
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
    } else if (is_file == 1) {
        if (teacher5_id.length == 0 && _term5_id == '') {
            // alert('กรุณากรอกข้อมูลให้ครบ');
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else if (teacher5_id.length == 0 || _term5_id == '') {
            if (teacher5_id.length == 0) {
                // alert('กรุณาเลือกอาจารย์');
                text_check.push('อาจารย์');
            }
            if (_term5_id == '') {
                // alert('กรุณาเลือกปีการศึกษา');
                text_check.push('ปีการศึกษา');
            }
            if (date == '') {
                // alert('กรุณาเลือกวันที่สิ้นสุดการส่งมคอ.');
                text_check.push('วันที่สิ้นสุดการส่งมคอ.');
            }
            Swal.fire({
                text: 'กรุณาใส่ข้อมูล' + text_check,
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        } else {
            data = {
                    _token: _token,
                    term_id: _term5_id,
                    teacher_id: teacher5_id,
                    date: date,
                    arr_sub: JSON.stringify(id_sub),
                    id_tqf5: id_tqf5,
                    group: group
                }
                //// console.log(data);

            $.ajax({
                url: 'tqf/addtqf5',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: data,
                //JSON.stringify()
                success: function(response) {
                    if (response.success) {
                        selectids5_arr = [];
                        teacher5_id = [];
                        Swal.fire({
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: '',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            $('#edittqf5').modal('toggle');
                            var url = window.location.href + '?year=' + $('#year').val() + '&&search=' + $('#search').val();
                            loadPosts(url);
                        }, 100);
                    } else {
                        Swal.fire({
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
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
    }

}

function deletetqf5(data) {
    // //// console.log(data);
    Swal.fire({
        title: 'ยืนยัน',
        text: "คุณต้องการที่จะลบใช่หรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'ยกเลิก',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'deletetqf5',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { id_tqf5: data },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'ลบข้อมูลสำเร็จ',
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
                        title: 'ERROR',
                        icon: 'error',
                        confirmButtonText: 'ตกลง',
                        showCloseButton: true
                    });
                }
            });
        }
    })



}

function teacherFileTqf5() {

    var validExtensions = ["doc", "pdf", "docx"]
    var file = $('input[name="file[]"]')[0].files;
    var f_error = 0;
    // var numb = $('input[name="file[]"]')[0].files[0].size / 1024 / 1024;
    console.log(file)
    $.each(file, function(index, val) {
        var ext = val.name.split(".");
        ext = ext[ext.length - 1].toLowerCase();
        if (validExtensions.indexOf(ext) == -1) {
            // alert("Only formats are allowed : "+validExtensions.join(', '));.split('.').pop()
            Swal.fire({
                // position: 'top-end',
                icon: 'warning',
                title: 'ไฟล์ที่อนุญาติ ' + validExtensions.join(', '),
                showConfirmButton: false,
                timer: 1500
            });
            f_error++;
        }
        console.log(val.size);
        if (val.size / 1024 / 1024 > 20) {
            Swal.fire({
                // position: 'top-end',
                icon: 'warning',
                title: 'ขนาดไฟล์ใหญ่เกินไป',
                showConfirmButton: false,
                timer: 1500
            });
            f_error++;
            // $(file).val(''); //for clearing with Jquery
        }
    });

    if (f_error > 0) {
        return;
    }


    var _token = $('input[name=_token]').val();
    var fdata = JSON.parse($('input[name=data]').val());
    var formData = new FormData();
    formData.append("_token", _token);
    formData.append("id_tqf5", fdata.tqf5ID);
    for (let i = 0; i < file.length; i++) {
        formData.append("filetqf[]", $('#filetqf')[0].files[i]);
    }

    $('#loader').removeClass('hidden');
    $.ajax({
        url: '/upfile_tqf5',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        contentType: false,
        processData: false, //
        enctype: 'multipart/form-data',
        data: formData,
        success: function(response) {
            $('#loader').addClass('hidden');
            if (response.success) {

                // console.log('aaa');
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
            Swal.fire({
                title: 'กรุณากรอกข้อมูลให้ครบ',
                icon: 'error',
                confirmButtonText: 'ตกลง',
                showCloseButton: true
            });
        }
    });

}