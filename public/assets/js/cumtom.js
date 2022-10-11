$(function() {
    $("textarea").each(function() {
        this.style.height = (this.scrollHeight + 10) + 'px';
    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $("textarea").each(function() {
            this.style.height = (this.scrollHeight + 10) + 'px';
        });
    });
});


$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $('#year').change(function(e) {
        e.preventDefault();
        $('#search').submit();
        ////  console.log('aa')
    });
    // CKEDITOR.inlineAll();
    // CKEDITOR.replace('.ckeditor');
    // $('.ckeditor').ckeditor();

    // $('.summernote').summernote();
    // $.validator.messages.required = '';

    // $('#formtqf3-1').validate();
    // $('#formtqf3-2').validate();
    // $('#formtqf3-3').validate();
    // $('#formtqf3-4').validate();
    // $('#formtqf3-51').validate();
    // $('#formtqf3-52').validate();
    // $('#formtqf3-6').validate();
    // $('#formtqf3-7').validate();

    // $('#formtqf5-1').validate();
    // $('#formtqf5-2').validate();
    // $('#formtqf5-21').validate();
    // $('#formtqf5-22').validate();
    // $('#formtqf5-3').validate();
    // $('#formtqf5-31').validate({
    //     rules: {
    //         input: { required: true }
    //     },
    //     messages: {
    //         input: { required: "required" }
    //     },
    // });
    // $('#formtqf5-4').validate();
    // $('#formtqf5-5').validate();
    // $('#formtqf5-6').validate();

    // $('.modal').on('show.bs.modal', function(event) {
    //     var idx = $('.modal:visible').length;
    //     $(this).css('z-index', 1040 + (10 * idx));
    // });
    // $('.modal').on('shown.bs.modal', function(event) {
    //     var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
    //     $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
    //     $('.modal-backdrop').not('.stacked').addClass('stacked');
    // });

    $.extend(true, $.fn.dataTable.defaults, {
        "ordering": false,
        "pageLength": 20,
        "lengthChange": false,
        "order": [],
        "language": {
            "sEmptyTable": "ไม่มีข้อมูลในตาราง",
            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
            "sInfoThousands": ",",
            "sLengthMenu": "แสดง _MENU_ รายการ",
            "sLoadingRecords": "กำลังโหลดข้อมูล...",
            "sProcessing": "กำลังดำเนินการ...",
            "sSearch": "ค้นหา: ",
            "sZeroRecords": "ไม่พบข้อมูล",
            "oPaginate": {
                "sFirst": "หน้าแรก",
                "sPrevious": "ก่อนหน้า",
                "sNext": "ถัดไป",
                "sLast": "หน้าสุดท้าย"
            },
            "oAria": {
                "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
            }
        }
    });

    $('#example').DataTable();
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
    $('#example5').DataTable();
    $('#example6').DataTable();



    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
    var trap = false;
    var option_set = {
        placeholder: 'กรอกข้อความ  ( ย่อหน้ากด Tab )',
        // tabsize: 2,
        // height: 100
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'clear']],
            // ['font', ['strikethrough', 'superscript', 'subscript']],
            // ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            // ['height', ['height']],
            ['view', ['undo', 'redo', 'help']],
        ],
        tabDisable: true,
        callbacks: {
            onPaste: function(e) {
                //  console.log('rfewf')
                if (document.queryCommandSupported("insertText")) {
                    var text = $(e.currentTarget).html();
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                    e.preventDefault();
                } else {
                    var text = window.clipboardData.getData("text")
                    if (trap) {
                        trap = false;
                    } else {
                        trap = true;
                        setTimeout(function() {
                            document.execCommand('paste', false, text);
                        }, 10);
                        e.preventDefault();
                    }
                }

            },
            onChange: function(contents, $editable) {
                ////  console.log('onChange:', contents, $editable);
                change_add();
            }
        },

    };
    $('.formtextarea').summernote(option_set);
    $('.formtextarea').summernote('removeFormat');
    // $(".formtextarea").on("summernote.paste", function(e, ne) {
    //    //  console.log('sss')
    //     var bufferText = ((ne.originalEvent || ne).clipboardData || window.clipboardData).getData('Text');
    //     ne.preventDefault();
    //     document.execCommand('insertText', false, bufferText);
    //     $(this).summernote('removeFormat');


    // });
    // $('.formtextarea').on('summernote.change', function(we, e, $editable) {
    //    //  console.log('summernote\'s content is changed.');
    //     $(this).summernote('removeFormat');
    //     var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

    //     e.preventDefault();
    //    //  console.log('sss')
    //     setTimeout(function() {
    //         document.execCommand('insertText', false, bufferText);
    //         $(this).summernote('removeFormat');
    //     }, 10);
    // });
    // .summernote({
    //     width: 755,
    //     height: 300,
    //     toolbar: [
    //       ['undo', ['undo',]],
    //       ['redo', ['redo',]],
    //       ['style', ['bold', 'italic', 'underline',]],
    //       ['font', ['strikethrough',]],
    //       ['fontsize', ['fontsize']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //     ]
    //   });
    // $('.formtextarea').summernote('fontSize', 22);

    // //If check_all checked then check all table rows
    // $("#check_all").on("click", function () {
    //     if ($("input:checkbox").prop("checked")) {
    //         $("input:checkbox[name='row-check']").prop("checked", true);
    //     } else {
    //         $("input:checkbox[name='row-check']").prop("checked", false);
    //     }
    // });

    // // Check each table row checkbox
    // $("input:checkbox[name='row-check']").on("change", function () {
    //     var total_check_boxes = $("input:checkbox[name='row-check']").length;
    //     var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

    //     // If all checked manually then check check_all checkbox
    //     if (total_check_boxes === total_checked_boxes) {
    //         $("#check_all").prop("checked", true);
    //     }
    //     else {
    //         $("#check_all").prop("checked", false);
    //     }
    // });



    // $('.editfac').on('click', function(e) {
    //     var opener = e.relatedTarget;
    //     var name = $('.editfac').data('name');
    //     var id = $('.editfac').data('id');

    //     $('.addfac').find('[name="fac"]').val(name);
    //     // $(this).find('[name="txtBranchcode"]').val(code);
    //     // $(this).find('[name="txtFacultyID"]').val(fac);
    //     $('.addfac').find('[name="id"]').val(id);
    //     $(".add-fac").text('บันทีก');
    //     // ////  console.log(id);
    // });
});

function lock_user() {
    $("#lock_user").show();
    $("#lock_user").modal({ backdrop: "static" });
}

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
     the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                     (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x)
            x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
             increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
             decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x)
                    x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x)
            return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length)
            currentFocus = 0;
        if (currentFocus < 0)
            currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
         except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function(e) {
        closeAllLists(e.target);
    });
}

var stringToHTML = function(str) {
    var dom = document.createElement('div');
    dom.innerHTML = str;
    return dom;
};
// $("textarea").each(function(textarea) {
//     $(this).height($(this)[0].scrollHeight);
// });
$('#edittqf3').on('hidden.bs.modal', function() {
    // will only come inside after the modal is shown
    teacher3_id = [];
    selectids3_arr = []
    groupids3_arr = []
    $('#data_user tr').find('td:eq(0) input[name="row-teacher3"]').prop('checked', false);
    // teacher5_id = [];
    // ////  console.log('aaa')
});

$('#edittqf5').on('hidden.bs.modal', function() {
    // will only come inside after the modal is shown
    teacher5_id = [];
    selectids5_arr = []
    groupids5_arr = []
    $('#data_user tr').find('td:eq(0) input[name="row-teacher5"]').prop('checked', false);
    // ////  console.log('aaa')
});

$('#addtqf3').on('hidden.bs.modal', function() {
    // will only come inside after the modal is shown
    teacher3_id = [];
    selectids3_arr = []
    groupids3_arr = []
    $('#data_user tr').find('td:eq(0) input[name="row-teacher3"]').prop('checked', false);
    $('#data_group tr').find('td:eq(0) input[name="row-group3"]').prop('checked', false);
    $('#data_sub tr').find('td:eq(0) input[name="row-check3"]').prop('checked', false);
    // teacher5_id = [];
    // ////  console.log('aaa')
});

$('#addtqf5').on('hidden.bs.modal', function() {
    // will only come inside after the modal is shown
    teacher5_id = [];
    selectids5_arr = []
    groupids5_arr = []
    $('#data_user tr').find('td:eq(0) input[name="row-teacher5"]').prop('checked', false);
    $('#data_group tr').find('td:eq(0) input[name="row-group5"]').prop('checked', false);
    $('#data_sub tr').find('td:eq(0) input[name="row-check5"]').prop('checked', false);
    // ////  console.log('aaa')
});

$('.modal').on('hidden.bs.modal', function() {
    $(this).find('form').trigger('reset');

    if ($('.showtqf3').is(':visible')) {
        if (!$('#edittqf3').is(':visible') && !$('#addtqf3').is(':visible')) {
            // if modal is not shown/visible then do something
            $("#tabletqf tr").remove();
        }
        if (!$('#edittqf3').is(':visible') && !$('#addtqf3').is(':visible')) {
            // if modal is not shown/visible then do something
            $("#user_list tr").remove();
        }

    }

    if ($('.showtqf5').is(':visible')) {
        if (!$('#edittqf5').is(':visible') && !$('#addtqf5').is(':visible')) {
            // if modal is not shown/visible then do something
            $("#tabletqf tr").remove();
        }
        if (!$('#edittqf5').is(':visible') && !$('#addtqf5').is(':visible')) {
            // if modal is not shown/visible then do something
            $("#user_list tr").remove();
        }

    }
});

function edit_TQF3(data) {
    var t = $('#example3').DataTable();
    $('input[type=checkbox]').each(function() {
        this.checked = false;
    });
    var open = '.formtqf3';
    // var data = '';
    // var data = $(open).data('tqf3');
    // $.ajax({
    //     url: '/get_data_tqf3',
    //     method: 'POST',
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     data: { id: id },
    //     success: function(data) {
    //         ////  console.log(data);
    var row2 = '<tr data-subject="' + data.subject_idSubject + '">' +
        '<td>' + data.subsubject.subjectCode + '</td>' +
        '<td>' + data.subsubject.THsubject + '</td>';
    // '<td>' + data.subsubject.group.groupname + '</td>'+

    $('#data_user tr').find('td:eq(4) input#checkboxt3').prop('checked', false);
    data.subuser.forEach(element => {
        // var row = '<tr data-subject="' + element.userID + '">' +
        //     '<td>' + element.Uprefix + element.UFName + '  ' + element.ULName + '</td>' +
        //     '<td>' + element.subfac + '</td>' +
        //     '<td>' + data.subsubject.group.groupname + '</td>';

        if (!teacher3_id.includes(element.userID)) {
            teacher3_id.push(element.userID.toString())
        }
        // $('#data_user tr').each(function(index, element1) {
        //     // element == this
        //     // ////  console.log(element.userID)
        //     $(this).find("td:eq(4) input#checkboxt3[value=" + element.userID + "]").prop('checked', true);
        // });

        t.rows().every(function(rowIdx) {
            $(this.node()).first().find('input[name="row-teacher3"][value=' + element.userID + ']').prop('checked', true);
            // console.log('Row ' + (rowIdx + 1) + ' first value: ' + firstVal);
        });
    });
    $.ajax({
        type: "get",
        url: "get_table_user3/" + data.tqf3ID,
        dataType: "text",
        success: function(response) {
            $('#edittqf3 #user_list').append(response);
        }
    });
    //populate the textbox 
    //    $('#year').data('selectize').setValue(data.Year_idYear);
    $(open).find('[name="year"]').val(data.Year_idYear).change();
    $(open).find('[name="idtqf3"]').val(data.tqf3ID);
    if (data.is_file == 0) {
        $(open).find('#form-deadline').show();
        $(open).find('input[name="dateline"]').val(data.deadline);
        $(open).find('input[name="is_file"]').val(data.is_file);
    } else {
        $(open).find('#form-deadline').hide();
        $(open).find('input[name="is_file"]').val(data.is_file);
        $(open).find('input[name="dateline"]').val('');
    }
    $(open).find('input[name="dateline"]').val(data.deadline);
    $(open).find('[name="teacher"]').val(data.user_userID).change();
    $(open).find('[name="tqf_group"]').val(data.group_sub);
    $(open).find('[name="sub_select"]').val(data.subject_idSubject);
    $('select[name="tqf_group"]').selectpicker('refresh');
    console.log(data.group_sub);
    $('#tabletqf').append(row2);
    console.log(teacher3_id);
    // $("input:checkbox[name=row-check3]").click(function(index, rowId) {


    // });
    // ////  console.log($('.example3 tr').find("input:checkbox[name=row-check3]checked"));.is(":checked").attr('checked', true)

    // t.row.add([
    //     data.subsubject.subjectCode,
    //     data.subsubject.THsubject,
    //     data.subsubject.group.groupname,
    // ]).node().id = 'data' + data.idsubject;
    // t.draw(false);

    //     },
    //     error: function(error) {
    //         // ////  console.log(error);

    //     }
    // });
    ////  console.log(teacher3_id);

}

function edit_TQF5(data) {
    var t = $('#example3').DataTable();

    var open = '.formtqf5';
    // var data = $(open).data('tqf5');
    // // ////  console.log(data);
    var row2 = '<tr data-subject="' + data.subsubject.idsubject + '">' +
        '<td>' + data.subsubject.subjectCode + '</td>' +
        '<td>' + data.subsubject.THsubject + '</td>';
    // '<td>' + data.subsubject.group.groupname + '</td>'+

    //populate the textbox 
    //    $('#year').data('selectize').setValue(data.Year_idYear);
    $(open).find('[name="year"]').val(data.Year_idYear).change();
    $(open).find('[name="idtqf5"]').val(data.tqf5ID);
    if (data.is_file == 0) {
        $(open).find('#form-deadline').show();
        $(open).find('input[name="dateline"]').val(data.deadline);
        $(open).find('input[name="is_file"]').val(data.is_file);
    } else {
        $(open).find('#form-deadline').hide();
        $(open).find('input[name="is_file"]').val(data.is_file);
        $(open).find('input[name="dateline"]').val('');
    }
    $(open).find('[name="teacher"]').val(data.user_userID).change();
    $(open).find('[name="tqf_group"]').val(data.group_sub);
    $(open).find('[name="sub_select"]').val(data.subject_idSubject);
    $('select[name="tqf_group"]').selectpicker('refresh');

    $('#tabletqf').append(row2);
    $('#data_user tr').find('td:eq(4) input#checkboxt5').prop('checked', false);
    data.subuser.forEach(element => {
        // var row = '<tr data-subject="' + element.userID + '">' +
        //     '<td>' + element.Uprefix + element.UFName + '  ' + element.ULName + '</td>' +
        //     '<td>' + element.subfac + '</td>' +
        //     '<td>' + data.subsubject.group.groupname + '</td>';
        if (!teacher5_id.includes(element.userID)) {
            teacher5_id.push(element.userID);
        }

        t.rows().every(function(rowIdx) {
            $(this.node()).first().find('input[name="row-teacher5"][value=' + element.userID + ']').prop('checked', true);
            // console.log('Row ' + (rowIdx + 1) + ' first value: ' + firstVal);
        });
        // console.log();t.rows().data()
        // $('#data_user tr').each(function(index, element1) {
        // element == this
        // console.log($('#data_user tr').find("td:eq(4) input[name=row-teacher5][value=" + element.userID + "]"))
        // $('#example3 #data_user tr').find("td:eq(4) input#checkboxt5[value=" + element.userID + "]").prop('checked', true);
        // });
        console.log(element.userID)
    });
    $.ajax({
        type: "get",
        url: "get_table_user5/" + data.tqf5ID,
        dataType: "text",
        success: function(response) {
            $('#edittqf5 #user_list').append(response);
        }
    });
    // t.row.add([
    //     data.subsubject.subjectCode,
    //     data.subsubject.THsubject,
    //     data.subsubject.group.groupname,
    // ]).node().id = 'data' + data.idsubject;
    // t.draw(false);

}

function formFileTqf3(data) {
    // // ////  console.log(data);
    $('.addtqf3').find('[name="data"]').val(JSON.stringify(data));
    $('.addtqf3').find('[name="term"]').val(data.subyear.term + "/" + data.subyear.Year);
    $('.addtqf3').find('[name="codesubject"]').val(data.subsubject.subjectCode);
    $('.addtqf3').find('[name="namesubject"]').val(data.subsubject.THsubject);
    $('.addtqf3').find('[name="date"]').val(data.deadline);
    // $('.addtqf3').find('[name="lname"]').val(data.ULName);
    // $('.addtqf3').find('[name="level"]').val(data.level_LevelID);
    // $('.addtqf3').find('[name="fac"]').val(data.subfac.factory_idfactory);
    // $('.addtqf3').find('[name="ben"]').val(data.subfac.idBranch);
}

function formFileTqf5(data) {
    // ////  console.log(data);
    $('.addtqf5').find('[name="data"]').val(JSON.stringify(data));
    $('.addtqf5').find('[name="term"]').val(data.subyear.term + "/" + data.subyear.Year);
    $('.addtqf5').find('[name="codesubject"]').val(data.subsubject.subjectCode);
    $('.addtqf5').find('[name="namesubject"]').val(data.subsubject.THsubject);
    $('.addtqf5').find('[name="date"]').val(data.deadline);
    // $('.addtqf3').find('[name="fname"]').val(data.UFName);
    // $('.addtqf3').find('[name="lname"]').val(data.ULName);
    // $('.addtqf3').find('[name="level"]').val(data.level_LevelID);
    // $('.addtqf3').find('[name="fac"]').val(data.subfac.factory_idfactory);
    // $('.addtqf3').find('[name="ben"]').val(data.subfac.idBranch);
}

$(".add-row351").click(function() {
    ////  console.log($('#tqf3_51 tr:last').);
    const le = $("#tqf3_51").find('tr').length;
    if (le >= 20) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var last = parseInt($('#tqf3_51 tr:last').find('input[name="week"]').val()) + 1;
    ////  console.log(last);
    var markup = '<tr>' +
        '<th><input class="form-control" value="' + last + '" name="week" type="number" min="1" max="20"></th>' +
        '<td><textarea class="form-control" type="text" name="content" maxlength="1000"></textarea></td>' +
        '<td><input class="form-control" name="hour" value="" type="number" min="1"></td>' +
        '<td><textarea class="form-control" type="text" name="intuction" maxlength="1000"></textarea></td>' +
        '<td><textarea class="form-control" type="text" name="assid" maxlength="1000"></textarea></td>' +
        '<td style="width:10px;"><a class="delete" type="button"><i class="bi bi-x-square-fill" style="color:red"></i></a></td>' +
        '</tr>';
    $("#tqf3_51").append(markup);
});

$('#tqf3_51').on('click', '.delete', function() {
    $(this).closest("tr").remove();
    //    $('#tqf3_51 tr:last').remove();
});

$(".add-row352").click(function() {

    const le = $("#tqf3_52").find('tr').length;
    if (le >= 20) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    console.log(le);
    var markup = '<tr>' +
        '<td><textarea class="form-control " type="text" id="no" name="no" maxlength="1000"></textarea></td>' +
        '<td><textarea class="form-control " type="text" id="howto" name="howto" maxlength="1000"></textarea></td>' +
        '<td><textarea class="form-control " type="text" id="week" name="week" maxlength="1000"></textarea></td>' +
        '<td><textarea class="form-control " type="text" id="percent" name="percent" maxlength="1000"></textarea></td>' +
        '<td style="width:10px;"><a class="delete" type="button"><i class="bi bi-x-square-fill" style="color:red"></i></a></td>' +
        '</tr>';
    $("#tqf3_52").append(markup);
});

$('#tqf3_52').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});


$(".add-rowtqf521").click(function() {

    var markup = '<tr>' +
        '<td><textarea class="required form-control" type="text" id="detail" name="detail"></textarea></td>' +
        '<td><input class="required form-control" type="number" id="hour1" name="hour1"></td>' +
        '<td><input class="required form-control" type="number" id="hour2" name="hour2"></td>' +
        '<td><textarea class="required form-control" type="text" id="reason" name="reason"></textarea></td>' +
        '<td class="p-2"><a class="delete" type="button"><i class="bi bi-x-square-fill" style="color:red"></i></a></td>' +
        '</tr>';
    $("#tqf521").append(markup);
});

// $(".add-rowtqf522").click(function() {

//     var markup = '<tr>' +
//         '<td><textarea class="form-control" type="text"id=""></textarea></td>' +
//         '<td><textarea class="form-control" type="text" id=""></textarea></td>' +
//         '<td><input type="radio" id="yes" name="effect" value="true">' +
//         '<label for="male">มี</label><br>' +
//         '<input type="radio" id="no" name="effect" value="false">' +
//         '<label for="female">ไม่มี</label></td>' +
//         '<td><textarea class="form-control " type="text" id=""></textarea></td>' +
//         '<td><button class="btn btn-danger" id="deleteRow" type="button">ลบ</button></td>' +
//         '</tr>';
//     $("#tqf522").append(markup);
// });

$('#tqf521').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$('#select_year').on('change', function() {
    var table = $('#example').DataTable();
    var text = $("#select_year option:selected").data('text');

    table.columns(0).search(text).draw();


    // ////  console.log(text)
});

$('#select_group').on('change', function() {
    var table = $('#example').DataTable();
    var text = $("#select_group option:selected").data('text');
    table
        .columns(3)
        .search(text)
        .draw();
    // ////  console.log(text)
});

$('#select_sub').on('change', function() {
    var table = $('#example').DataTable();
    var text = $("#select_sub option:selected").data('text');
    table
        .columns(2)
        .search(text)
        .draw();
    // ////  console.log(text)
});

$(".add-rowku_1").click(function() {

    const le = $("#ku_1").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="morality" name="morality" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_1").append(markup);
});

$('#ku_1').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_2").click(function() {
    const le = $("#ku_2").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="morality2" name="morality2" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_2").append(markup);
});
$('#ku_2').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_3").click(function() {
    const le = $("#ku_3").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="morality3" name="morality3" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_3").append(markup);
});
$('#ku_3').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_4").click(function() {
    const le = $("#ku_4").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="knowledge" name="knowledge" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_4").append(markup);
});
$('#ku_4').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_5").click(function() {
    const le = $("#ku_5").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="knowledge2" name="knowledge2" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_5").append(markup);
});
$('#ku_5').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_6").click(function() {
    const le = $("#ku_6").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="knowledge3" name="knowledge3" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_6").append(markup);
});
$('#ku_6').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_7").click(function() {
    const le = $("#ku_7").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="intel_skill" name="intel_skill" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_7").append(markup);
});
$('#ku_7').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_8").click(function() {
    const le = $("#ku_8").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="intel_skill2" name="intel_skill2" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_8").append(markup);
});
$('#ku_8').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_9").click(function() {
    const le = $("#ku_9").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="intel_skill3" name="intel_skill3" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_9").append(markup);
});
$('#ku_9').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_10").click(function() {
    const le = $("#ku_10").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="respon_skill" name="respon_skill" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_10").append(markup);
});
$('#ku_10').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_11").click(function() {
    const le = $("#ku_11").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="respon_skill2" name="respon_skill2" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_11").append(markup);
});
$('#ku_11').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_12").click(function() {
    const le = $("#ku_12").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="respon_skill3" name="respon_skill3" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_12").append(markup);
});
$('#ku_12').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_13").click(function() {
    const le = $("#ku_13").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="num_skill" name="num_skill" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_13").append(markup);
});
$('#ku_13').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_14").click(function() {
    const le = $("#ku_14").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="num_skill2" name="num_skill2" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_14").append(markup);
});
$('#ku_14').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});

$(".add-rowku_15").click(function() {
    const le = $("#ku_15").find('tr').length;
    if (le >= 10) {
        Swal.fire(
            'แถวเกินจำกัด',
            '',
            'warning'
        );
        return;
    }
    var markup = '<tr>' +
        '<td style="text-align: end;width:10px;padding-right: 5px;vertical-align: middle;"><i class="bi bi-dash-lg"></i></td>' +
        '<td style="padding-left: 0px"><textarea class="form-control " type="text" id="num_skill3" name="num_skill3" maxlength="1000"></textarea></td>' +
        '<td class="px-0" style="width: 5px;"><button class="btn delete" type="button"><i style="color:red" class="bi bi-x-square"></i></button></td>' +
        '</tr>';
    $("#ku_15").append(markup);
});
$('#ku_15').on('click', '.delete', function() {
    $(this).closest("tr").remove();
});


function export_tqf3() {

    // $year = $('.exports-tqf3').find('select[name=select_year] option:selected').val();
    // $group = $('.exports-tqf3').find('select[name=select_group] option:selected').val();
    var year, date;
    $('#exportTQF3').find('.modal-body').each(function(index, element) {
        // element == this

        year = $(this).find('select[name=select_year] option:selected').val();
        date = $(this).find('input[name=date]').val();

    });

    // ////  console.log(year + date)
    if (year == '' && date == '') {
        $('#exportTQF3').find('.modal-body').each(function(index, element) {
            // element == this
            $(this).find('select[name=select_year]').addClass('error');
            $(this).find('#export-year-empty').text('กรุณาเลือกปีการศึกษา');
            $(this).find('input[name=date]').addClass('error');
            $(this).find('#export-date-empty').text('กรุณาใส่ข้อมูลกำหนดการทำมคอ. 3');
            // date = $(this).find('input[name=date]').val();
        });
        // alert('กรุณาเลือกภาคเรียน หรือกลุ่มเรียน');
    } else {
        var url = "/export/tqf3/" + year + "/" + date;

        window.location = url;
        //     if ($year == '') {
        //         var url = "/export/tqf3/" + 0 + "/" + $group;
        //     } else {
        //         var url = "/export/tqf3/" + $year + "/" + $group;
    }



    // 
    // $data = {
    //     year: $year,
    //     group: $group
    // }
    // ////  console.log($data);
    // $.ajax({
    //     url: '/export/tqf3',
    //    method: 'POST',
    // headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     data: $data,
    //     success: function(response) {
    //         const url = window.URL.createObjectURL(new Blob([response.data]));
    //         const link = document.createElement('a');
    //         link.setAttribute('download', 'file.pdf');
    //         document.body.appendChild(link);
    //         link.click();
    //         if (response.success) {

    //         } else {

    //         }
    //     },
    //     error: function(error) {
    //         // ////  console.log(error);

    //     }
    // });
    // }


}

function export_tqf5() {

    // $year = $('.exports-tqf5').find('select[name=select_year] option:selected').val();
    // $group = $('.exports-tqf5').find('select[name=select_group] option:selected').val();
    var year, date;
    $('#exportTQF5').find('.modal-body').each(function(index, element) {
        // element == this

        year = $(this).find('select[name=select_year] option:selected').val();
        // date = $(this).find('input[name=date]').val();

    });

    // ////  console.log(year + date)
    if (year == '') {
        $('#exportTQF5').find('.modal-body').each(function(index, element) {
            // element == this
            $(this).find('select[name=select_year]').addClass('error');
            $(this).find('#export-year-empty').text('กรุณาเลือกปีการศึกษา');
            // $(this).find('input[name=date]').addClass('error');
            // $(this).find('#export-date-empty').text('กรุณาใส่ข้อมูลกำหนดการทำมคอ. 5');
        });
    } else {
        var url = "/export/tqf5/" + year;
        window.location = url;
    }

}

function add_tqf3_1() {
    $id = $('input[name="idtqf3"]').val();
    $thname = $('.tqf3-1').find('input[name="thname"]').val();
    $enname = $('.tqf3-1').find('input[name="enname"]').val();
    $credit = $('.tqf3-1').find('textarea[name="credit"]').val();
    $course = $('.tqf3-1').find('textarea[name="course"]').val();
    $teacher = $('.tqf3-1').find('textarea[name="teacher"]').val();
    $term = $('.tqf3-1').find('textarea[name="term"]').val();
    $pre = $('.tqf3-1').find('textarea[name="pre"]').val() || '-';
    $co = $('.tqf3-1').find('textarea[name="co"]').val() || '-';
    $place = $('.tqf3-1').find('textarea[name="place"]').val();
    $date_mo = $('.tqf3-1').find('textarea[name="date_mo"]').val() || '-';

    if ($id != '' && $thname != '' && $enname != '' && $credit != '' && $course != '' && $teacher != '' &&
        $term != '' && $pre != '' && $co != '' && $place != '' && $teacher != '<p><br></p>' &&
        $term != '<p><br></p>' && $place != '<p><br></p>' && $teacher != '<br>' &&
        $term != '<br>' && $place != '<br>' &&
        $date_mo != '' && !$('.tqf3-1 .formtextarea').summernote('isEmpty')) { //&&
        // $('.tqf3-1 .formtextarea').summernote('isEmpty')&& !$('.formtextarea').summernote('isEmpty')
        $data = {
            id: $id,
            thname: $thname,
            enname: $enname,
            credit: $credit,
            course: $course,
            teacher: $teacher,
            term: $term,
            pre: $pre,
            co: $co,
            place: $place,
            date_mo: $date_mo,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf3_1',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-1').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab1').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 1 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 1 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',form-empty
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf3-1");
}

function add_tqf3_2() {
    $id = $('input[name="idtqf3"]').val();
    $objective = $('.tqf3-2').find('textarea[name="objective"]').val();
    $target = $('.tqf3-2').find('textarea[name="target"]').val(); //&& !$('.formtextarea').summernote('isEmpty')

    ////  console.log($('.tqf3-2 .formtextarea').summernote('isEmpty'))
    if ($id != "" && $objective != "" && $target != '' && $objective != "<p><br></p>" && $target != '<p><br></p>' &&
        $objective != "<br>" && $target != '<br>' &&
        !$('.tqf3-2 .formtextarea').summernote('isEmpty')) {
        $data = {
            id: $id,
            objective: $objective,
            target: $target,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf3_2',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-2').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab2').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {

        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf3-2");
}

function add_tqf3_3() {
    var check = true;
    $id = $('input[name="idtqf3"]').val();
    $course_desc = $('.tqf3-3').find('textarea[name="course_desc"]').val();
    $hour_lecture = $('.tqf3-3').find('textarea[name="hour_lecture"]').val();
    $hour_tu = $('.tqf3-3').find('textarea[name="hour_tu"]').val();
    $houre_practice = $('.tqf3-3').find('textarea[name="houre_practice"]').val();
    $hour_selhflearn = $('.tqf3-3').find('textarea[name="hour_selhflearn"]').val();
    $hour_recom = $('.tqf3-3').find('textarea[name="hour_recom"]').val();
    if ($id != '' && $course_desc != '' && $hour_lecture != '' &&
        $hour_tu != '' && $houre_practice != '' && $hour_selhflearn != '' && $hour_recom != '') {
        check = true;
    } else {
        check = false;

    }
    if (check && !$('.tqf3-3 .formtextarea').summernote('isEmpty')) {

        // $('#hour_term tr').each(function(indexInArray, valueOfElement) {&& !$('.formtextarea').summernote('isEmpty')
        //     $hour_lecture = $(this).find("td:eq(0) textarea[name='hour_lecture']").val();
        //     $hour_tu = $(this).find("td:eq(1) textarea[name='hour_tu']").val();
        //     $houre_practice = $(this).find("td:eq(2) textarea[name='houre_practice']").val();
        //     $hour_selhflearn = $(this).find("td:eq(3) textarea[name='hour_selhflearn']").val();
        // });
        $data = {
            id: $id,
            course_desc: $course_desc,
            hour_lecture: $hour_lecture,
            hour_tu: $hour_tu,
            houre_practice: $houre_practice,
            hour_selhflearn: $hour_selhflearn,
            hour_recom: $hour_recom
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf3_3',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-3').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab3').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 3 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 3 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf3-3");
}

function add_tqf3_4() {
    $id = $('input[name="idtqf3"]').val();
    var morality = [],
        morality2 = [],
        morality3 = [],
        knowledge = [],
        knowledge2 = [];
    var knowledge3 = [],
        intel_skill = [],
        intel_skill2 = [],
        intel_skill3 = [];
    var intel_skill = [],
        intel_skill2 = [],
        intel_skill3 = [],
        respon_skill = [],
        respon_skill2 = [];
    var respon_skill3 = [],
        num_skill = [],
        num_skill2 = [],
        num_skill3 = [];
    // $morality = $('.tqf3-4').find('textarea[name="morality"]').val();
    // $morality2 = $('.tqf3-4').find('textarea[name="morality2"]').val();
    // $morality3 = $('.tqf3-4').find('textarea[name="morality3"]').val();
    // $knowledge = $('.tqf3-4').find('textarea[name="knowledge"]').val();
    // $knowledge2 = $('.tqf3-4').find('textarea[name="knowledge2"]').val();
    // $knowledge3 = $('.tqf3-4').find('textarea[name="knowledge3"]').val();
    // $intel_skill = $('.tqf3-4').find('textarea[name="intel_skill"]').val();
    // $intel_skill2 = $('.tqf3-4').find('textarea[name="intel_skill2"]').val();
    // $intel_skill3 = $('.tqf3-4').find('textarea[name="intel_skill3"]').val();
    // $respon_skill = $('.tqf3-4').find('textarea[name="respon_skill"]').val();
    // $respon_skill2 = $('.tqf3-4').find('textarea[name="respon_skill2"]').val();
    // $respon_skill3 = $('.tqf3-4').find('textarea[name="respon_skill3"]').val();
    // $num_skill = $('.tqf3-4').find('textarea[name="num_skill"]').val();
    // $num_skill2 = $('.tqf3-4').find('textarea[name="num_skill2"]').val();
    // $num_skill3 = $('.tqf3-4').find('textarea[name="num_skill3"]').val();
    $('#ku_1 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='morality']").val();
        morality.push(data);
    });
    $('#ku_2 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='morality2']").val();
        morality2.push(data);
    });
    $('#ku_3 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='morality3']").val();
        morality3.push(data);
    });
    $('#ku_4 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='knowledge']").val();
        knowledge.push(data);
    });
    $('#ku_5 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='knowledge2']").val();
        knowledge2.push(data);
    });
    $('#ku_6 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='knowledge3']").val();
        knowledge3.push(data);
    });
    $('#ku_7 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='intel_skill']").val();
        intel_skill.push(data);
    });
    $('#ku_8 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='intel_skill2']").val();
        intel_skill2.push(data);
    });
    $('#ku_9 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='intel_skill3']").val();
        intel_skill3.push(data);
    });
    $('#ku_10 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='respon_skill']").val();
        respon_skill.push(data);
    });
    $('#ku_11 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='respon_skill2']").val();
        respon_skill2.push(data);
    });
    $('#ku_12 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='respon_skill3']").val();
        respon_skill3.push(data);
    });
    $('#ku_13 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='num_skill']").val();
        num_skill.push(data);
    });
    $('#ku_14 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='num_skill2']").val();
        num_skill2.push(data);
    });
    $('#ku_15 tr').each(function(index, element) {
        // element == this
        var data = $(this).find("td:eq(1) textarea[name='num_skill3']").val();
        num_skill3.push(data);
    });

    $data = {
        id: $id,
        morality: JSON.stringify(morality),
        morality2: JSON.stringify(morality2),
        morality3: JSON.stringify(morality3),
        knowledge: JSON.stringify(knowledge),
        knowledge2: JSON.stringify(knowledge2),
        knowledge3: JSON.stringify(knowledge3),
        intel_skill: JSON.stringify(intel_skill),
        intel_skill2: JSON.stringify(intel_skill2),
        intel_skill3: JSON.stringify(intel_skill3),
        respon_skill: JSON.stringify(respon_skill),
        respon_skill2: JSON.stringify(respon_skill2),
        respon_skill3: JSON.stringify(respon_skill3),
        num_skill: JSON.stringify(num_skill),
        num_skill2: JSON.stringify(num_skill2),
        num_skill3: JSON.stringify(num_skill3),
    };

    ////  console.log(morality.length);
    if (!morality.includes("") && morality.length > 0 && !morality2.includes("") && morality2.length > 0 && !morality3.includes("") && morality3.length > 0 &&
        !knowledge.includes("") && knowledge.length > 0 && !knowledge2.includes("") && knowledge2.length > 0 && !knowledge3.includes("") && knowledge3.length > 0 &&
        !intel_skill.includes("") && intel_skill.length > 0 && !intel_skill2.includes("") && intel_skill2.length > 0 && !intel_skill3.includes("") && intel_skill3.length > 0 &&
        !respon_skill.includes("") && respon_skill.length > 0 && !respon_skill2.includes("") && respon_skill2.length > 0 && !respon_skill3.includes("") && respon_skill3.length > 0 &&
        !num_skill.includes("") && num_skill.length > 0 && !num_skill2.includes("") && num_skill2.length > 0 && !num_skill3.includes("") && num_skill3.length > 0) {
        $.ajax({
            url: '/addtqf3_4',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-4').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab4').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 4 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 4 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf3-4");
}

function add_tqf3_5_1() {
    var data_form1 = [];
    var index_null = [];

    $id = $('input[name="idtqf3"]').val();
    $('#tqf3_51 tr').each(function(key) {
        var week = $(this).find("th:eq(0) input[name='week']").val();
        var content = $(this).find("td:eq(0) textarea[name='content']").val();
        var hour = $(this).find("td:eq(1) input[name='hour']").val();
        var intuction = $(this).find("td:eq(2) textarea[name='intuction']").val();
        var assid = $(this).find("td:eq(3) textarea[name='assid']").val();
        if (content != '' && hour != '' && intuction != '' && assid != '') {
            data_form1.push({ week: week, content: content, hour: hour, intuction: intuction, assid: assid });
        } else {
            index_null.push(key + 1);
        }
    });
    var data = { id: $id, data1: JSON.stringify(data_form1), form: 1 };
    ////  console.log(data_form1);
    if (data_form1.length == $('#tqf3_51 tr').length) {
        $.ajax({
            url: '/addtqf3_5',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'JSON',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-51').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab5').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5.1 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5.1 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            text: 'ในแผนการสอนสัปดาห์ที่ ' + index_null,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });

        // alert('กรุณากรอกข้อมูลให้ครบ ในแผนการสอนสัปดาห์ที่ ' + index_null)
    }
    check_input_empty("#formtqf351");
    // }
}

function add_tqf3_5_2() {
    // if ($("#formtqf3-5").valid()) {
    var data_form2 = [];
    var row_null = [];

    $id = $('input[name="idtqf3"]').val();
    $('#tqf3_52 tr').each(function(key) {
        var no = $(this).find("td:eq(0) textarea[name='no']").val();
        var howto = $(this).find("td:eq(1) textarea[name='howto']").val();
        var week = $(this).find("td:eq(2) textarea[name='week']").val();
        var percent = $(this).find("td:eq(3) textarea[name='percent']").val();
        if (no != '' && howto != '' && week != '' && percent != '') {
            data_form2.push({ no: no, howto: howto, week: week, percent: percent });
        } else {
            row_null.push(key + 1);
        }
    });
    var data = { id: $id, form: 2, data2: JSON.stringify(data_form2) };
    ////  console.log($('#tqf3_52 tr').length);

    if (data_form2.length == $('#tqf3_52 tr').length) {
        $.ajax({
            url: '/addtqf3_5',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'JSON',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-52').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab6').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5.2 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5.2 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });

    } else {
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            text: 'แถวที่ ' + row_null,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        // alert('กรุณากรอกข้อมูลให้ครบ แถวที่ ' + row_null)
    }
    check_input_empty("#formtqf3-52");
}

function add_tqf3_6() {
    var check = true;
    $id = $('input[name="idtqf3"]').val();
    $detail1 = $('.tqf3-6').find('textarea[name="detail1"]').val();
    $detail2 = $('.tqf3-6').find('textarea[name="detail2"]').val();
    $detail3 = $('.tqf3-6').find('textarea[name="detail3"]').val();
    if ($id != "" && $detail1 != "" && $detail2 != "" && $detail3 != "" &&
        $detail1 != "<p><br></p>" && $detail2 != "<p><br></p>" && $detail3 != "<p><br></p>" &&
        $detail1 != "<br>" && $detail2 != "<br>" && $detail3 != "<br>") {
        check = true;
    } else {
        check = false;
    }
    if (check && !$('.tqf3-6 .formtextarea').summernote('isEmpty')) { //


        $data = {
            id: $id,
            detail1: $detail1,
            detail2: $detail2,
            detail3: $detail3,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf3_6',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-6').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab7').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 6 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 6 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty(".tqf3-6");
}

function add_tqf3_7() {
    var check = true;
    $id = $('input[name="idtqf3"]').val();
    $detail1 = $('.tqf3-7').find('textarea[name="detail1"]').val();
    $detail2 = $('.tqf3-7').find('textarea[name="detail2"]').val();
    $detail3 = $('.tqf3-7').find('textarea[name="detail3"]').val();
    $detail4 = $('.tqf3-7').find('textarea[name="detail4"]').val();
    $detail5 = $('.tqf3-7').find('textarea[name="detail5"]').val();
    if ($id != "" && $detail1 != "" && $detail2 != "" && $detail3 != "" && $detail4 != "" && $detail5 != "" &&
        $detail1 != "<p><br></p>" && $detail2 != "<p><br></p>" && $detail3 != "<p><br></p>" && $detail4 != "<p><br></p>" && $detail5 != "<p><br></p>" &&
        $detail1 != "<br>" && $detail2 != "<br>" && $detail3 != "<br>" && $detail4 != "<br>" && $detail5 != "<br>") {
        check = true;
    } else {
        check = false;
    }
    if (check && !$('.tqf3-7 .formtextarea').summernote('isEmpty')) { //


        $data = {
            id: $id,
            detail1: $detail1,
            detail2: $detail2,
            detail3: $detail3,
            detail4: $detail4,
            detail5: $detail5,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf3_7',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf3-7').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf3-tab8').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 7 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 7 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty(".tqf3-7");
}

function add_tqf5_1() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $thname = $('.tqf5-1').find('textarea[name="thname"]').val();
    $enname = $('.tqf5-1').find('textarea[name="enname"]').val();
    $pre = $('.tqf5-1').find('textarea[name="pre"]').val() || '-';
    $teacher = $('.tqf5-1').find('textarea[name="teacher"]').val();
    $term = $('.tqf5-1').find('textarea[name="term"]').val();
    $place = $('.tqf5-1').find('textarea[name="place"]').val();
    if ($id != '' && $thname != "" && $enname != "" && $pre != "" && $teacher != "" &&
        $term != "" && $place != "" && $teacher != '<br>' && $teacher != '<p><br></p>' &&
        $place != '<br>' && $place != '<p><br></p>' && $term != '<br>' && $term != '<p><br></p>') {
        check = true;
    } else {
        check = false;
    }
    if (check && !$('.tqf5-1 .formtextarea').summernote('isEmpty')) {


        $data = {
            id: $id,
            thname: $thname,
            enname: $enname,
            pre: $pre,
            teacher: $teacher,
            term: $term,
            place: $place,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf5_1',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-1').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab1').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 1 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 1 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ');
    }
    check_input_empty("#formtqf5-1");
}

function add_tqf5_2() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $data1 = $('.tqf5-2').find('textarea[name="data1"]').val();
    $data2 = $('.tqf5-2').find('textarea[name="data2"]').val();
    $data3 = $('.tqf5-2').find('textarea[name="data3"]').val();
    $data4 = $('.tqf5-2').find('textarea[name="data4"]').val();
    var ch_1 = $('.tqf5-2 .formtextarea textarea[name="teacher"]').summernote('isEmpty');
    if ($id != "" && $data1 != "" && $data2 != "" && $data3 != "" && $data4 != "" && $data4 != "<br>" &&
        $data4 != "<p><br></p>") {
        check = true;
    } else {
        check = false;
    }

    if (check && !$('.tqf5-2 .formtextarea').summernote('isEmpty')) {


        $data = {
            id: $id,
            data1: $data1,
            data2: $data2,
            data3: $data3,
            data4: $data4,
        };
        // ////  console.log($data);

        $.ajax({
            url: '/addtqf5_2',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-2').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab2').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ');
    }
    check_input_empty("#formtqf5-2");
}

function add_tqf5_2_1() {
    // if ($("#formtqf5-21").valid()) {
    var data_form = [];
    var row_null = [];

    $id = $('input[name="idtqf5"]').val();
    $('#tqf521 tr').each(function(key) {
        var detail = $(this).find("td:eq(0) textarea[name='detail']").val();
        var hour1 = $(this).find("td:eq(1) input[name='hour1']").val();
        var hour2 = $(this).find("td:eq(2) input[name='hour2']").val();
        var reason = $(this).find("td:eq(3) textarea[name='reason']").val();
        if (detail != '' && hour1 != '' && hour2 != '' && reason != '') {
            data_form.push({ detail: detail, hour1: hour1, hour2: hour2, reason: reason });
        } else {
            row_null.push(key + 1);
        }
    });
    if (data_form.length < $('#tqf521 tr').length) {
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            text: 'ในแถวที่ ' + row_null,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    } else {
        var data = { id: $id, data: JSON.stringify(data_form) };
        // ////  console.log(data);
        $.ajax({
            url: '/addtqf5_2_1',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'JSON',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-21').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab3').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2.1 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2.1 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });

    }
    check_input_empty("#formtqf5-21");
    // }
}

function add_tqf5_2_2() {
    // if ($("#formtqf5-22").valid()) {
    var data_form = [];
    var row_null = [];

    $id = $('input[name="idtqf5"]').val();
    $('#tqf522 tr').each(function(key) {
        var learn_outcome = $(this).find("td:eq(0) textarea[name='learn_outcome']").val();
        var description = $(this).find("td:eq(1) textarea[name='description']").val();
        var effect = $(this).find("td:eq(2) input[name='effect" + key + "']:checked").val();
        var problem = $(this).find("td:eq(3) textarea[name='problem']").val();
        if (learn_outcome != '' && description != '' && effect != '' && problem != '') {
            data_form.push({ learn_outcome: learn_outcome, description: description, effect: effect, problem: problem });
        } else {
            row_null.push(key + 1);
        }
    });
    // ////  console.log(data_form.length);
    if (data_form.length < 5) {
        Swal.fire({
            title: 'กรุณากรอกข้อมูลให้ครบ',
            text: 'ในแถวที่ ' + row_null,
            icon: 'error',
            confirmButtonText: 'ตกลง',
            showCloseButton: true
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ');
    } else {
        var data = { id: $id, data: JSON.stringify(data_form) };

        $.ajax({
            url: '/addtqf5_2_2',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'JSON',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-22').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab4').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2.2 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 2.2 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });

    }
    check_input_empty("#formtqf5-22");
}

function add_tqf5_3() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $num_regis = $('.tqf5-3').find('input[name="num_regis"]').val();
    $num_end = $('.tqf5-3').find('input[name="num_end"]').val();
    $num_w = $('.tqf5-3').find('input[name="num_w"]').val();
    $detail5 = $('.tqf5-3').find('textarea[name="detail5"]').val();
    $detail6_11 = $('.tqf5-3').find('textarea[name="detail6_1_1"]').val();
    $detail6_12 = $('.tqf5-3').find('textarea[name="detail6_1_2"]').val();
    $detail6_21 = $('.tqf5-3').find('textarea[name="detail6_2_1"]').val();
    $detail6_22 = $('.tqf5-3').find('textarea[name="detail6_2_2"]').val();
    $detail71 = $('.tqf5-3').find('textarea[name="detail7_1"]').val();
    $detail72 = $('.tqf5-3').find('textarea[name="detail7_2"]').val();
    if ($id != "" && $num_regis != "" && $num_end != "" && $num_w != "" && $detail5 != "" &&
        $detail6_11 != "" && $detail6_12 != "" && $detail6_21 != "" && $detail6_22 != "" && $detail71 != "" && $detail72 != "") {
        check = true;
    } else {
        check = false;
    }
    ////  console.log(Math.abs($num_end + $num_w));
    if (Math.abs(($num_end - 0) + ($num_w - 0)) < ($num_regis - 0) || Math.abs(($num_end - 0) + ($num_w - 0)) > ($num_regis - 0)) {
        Swal.fire(
            'กรุณากรอกข้อมูลจำนวนนักศึกษาให้สัมพันธ์กัน',
            '',
            'warning'
        );
        return;
    }
    if (check) {
        var detail6_1 = {};
        var detail6_2 = {};
        var detail7 = {};
        var grade_data = [];

        detail6_1['discrepancy'] = $('.tqf5-3').find('textarea[name="detail6_1_1"]').val() || '-';
        detail6_1['reason'] = $('.tqf5-3').find('textarea[name="detail6_1_2"]').val() || '-';
        detail6_2['discrepancy'] = $('.tqf5-3').find('textarea[name="detail6_2_1"]').val() || '-';
        detail6_2['reason'] = $('.tqf5-3').find('textarea[name="detail6_2_2"]').val() || '-';
        detail7['method'] = $('.tqf5-3').find('textarea[name="detail7_1"]').val() || '-';
        detail7['conclude'] = $('.tqf5-3').find('textarea[name="detail7_2"]').val() || '-';

        var data6_1 = JSON.stringify(detail6_1);
        var data6_2 = JSON.stringify(detail6_2);
        var data7 = JSON.stringify(detail7);

        // $('#grade tr').each(function() {
        //     var count = $(this).find("td:eq(2) input[name='count']").val();
        //     var percent = $(this).find("td:eq(3) input[name='percent']").val();
        //     grade_data.push({ count: count, percent: percent });
        // });

        // var data1 = $('#grade').find("td:eq(2) input[name='count']").val();
        $data = {
            id: $id,
            num_regis: $num_regis,
            num_end: $num_end,
            num_w: $num_w,
            detail5: $detail5,
            detail6_1: data6_1,
            detail6_2: data6_2,
            detail7: data7,
            // grade: JSON.stringify(grade_data),
        };
        // ////  console.log(grade_data);
        $.ajax({
            url: '/addtqf5_3',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'JSON',
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-3').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab5').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 3 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 3 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf5-3");
}

function add_tqf5_3_1() {
    // if ($("#formtqf5-31").valid()) {
    // var detail6_1 = {};
    // var detail6_2 = {};
    // var detail7 = {};
    var grade_data = [];

    $id = $('input[name="idtqf5"]').val();
    // $num_regis = $('.tqf5-3').find('input[name="num_regis"]').val();
    // $num_end = $('.tqf5-3').find('input[name="num_end"]').val();
    // $num_w = $('.tqf5-3').find('input[name="num_w"]').val();
    // $detail5 = $('.tqf5-3').find('textarea[name="detail5"]').val();
    // detail6_1['discrepancy'] = $('.tqf5-3').find('textarea[name="detail6_1_1"]').val();
    // detail6_1['reason'] = $('.tqf5-3').find('textarea[name="detail6_1_2"]').val();
    // detail6_2['discrepancy'] = $('.tqf5-3').find('textarea[name="detail6_2_1"]').val();
    // detail6_2['reason'] = $('.tqf5-3').find('textarea[name="detail6_2_2"]').val();
    // detail7['method'] = $('.tqf5-3').find('textarea[name="detail7_1"]').val();
    // detail7['conclude'] = $('.tqf5-3').find('textarea[name="detail7_2"]').val();

    // var data6_1 = JSON.stringify(detail6_1);
    // var data6_2 = JSON.stringify(detail6_2);
    // var data7 = JSON.stringify(detail7);
    var sum = 0;
    $('#grade tr').each(function() {
        var count = $(this).find("td:eq(2) input[name='count']").val();
        var percent = $(this).find("td:eq(3) input[name='percent']").val();
        grade_data.push({ count: count, percent: percent });
        sum += (count - 0);
        if ($(this).find("td:eq(2) input[name='count']").attr('id') == 'number_w') {
            sum -= (count - 0);
        }
    });
    ////  console.log(sum > ($('#num_end').val() - 0), sum < ($('#num_end').val() - 0),
    //     (sum + ($('#number_w').val() - 0)) > ($('#num_regis').val() - 0), (sum + ($('#number_w').val() - 0)) < ($('#num_regis').val() - 0));
    ////  console.log(sum, (sum + ($('#number_w').val() - 0)), ($('#num_regis').val() - 0));
    if (sum > ($('#num_end').val() - 0) || sum < ($('#num_end').val() - 0) ||
        (sum + ($('#number_w').val() - 0)) > ($('#num_regis').val() - 0) || (sum + ($('#number_w').val() - 0)) < ($('#num_regis').val() - 0)) {
        Swal.fire(
            '',
            'กรุณากรอกข้อมูลจำนวนนักศึกษาในหมวดที่ 3.1 ให้สัมพันธ์กับจำนวนนักศึกษาที่ลงทะเบียนเรียน',
            'warning'
        );
        return;
    }
    // var data1 = $('#grade').find("td:eq(2) input[name='count']").val();
    $data = {
        id: $id,
        // num_regis: $num_regis,
        // num_end: $num_end,
        // num_w: $num_w,
        // detail5: $detail5,
        // detail6_1: data6_1,
        // detail6_2: data6_2,
        // detail7: data7,
        grade: JSON.stringify(grade_data),
    };
    // ////  console.log(grade_data);
    $.ajax({
        url: '/addtqf5_3_1',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType: 'JSON',
        data: $data,
        success: function(response) {
            if (response.success) {
                $('#empty-tqf5-31').hide();
                $($('.nav-link.active')).removeClass('unsave');
                $('#tqf5-tab6').addClass('page-save');
                $.toast({
                    icon: 'success',
                    // heading: 'Positioning',
                    text: 'บันทึกหมวดที่ 3.1 สำเร็จ',
                    position: 'top-right',
                    stack: false
                });
            } else {
                $.toast({
                    icon: 'error',
                    // heading: 'Positioning',
                    text: 'บันทึกหมวดที่ 3.1 ไม่สำเร็จ',
                    position: 'top-right',
                    stack: false
                })
            }
        },
        error: function(error) {
            // ////  console.log(error);

        }
    });
    // check_input_empty("#formtqf5-31");
    // }
    // else {
    //     $('input').each(function() {

    //         if ($(this_.val().trim()) {
    //             $(this).addClass("error");
    //         } else {
    //             $(this).removeClass("error");
    //         }

    //     });
    // }
}

function add_tqf5_4() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $detail1_1 = $('.tqf5-4').find('textarea[name="detail1_1"]').val();
    $detail1_2 = $('.tqf5-4').find('textarea[name="detail1_2"]').val();
    $detail2_1 = $('.tqf5-4').find('textarea[name="detail2_1"]').val();
    $detail2_2 = $('.tqf5-4').find('textarea[name="detail2_2"]').val();
    if ($id != "" && $detail1_1 != "" && $detail1_2 != "" && $detail2_1 != "" && $detail2_2 != "") {
        check = true;
    } else {
        check = false;
    }
    if (check) {


        $data = {
            id: $id,
            detail1_1: $detail1_1,
            detail1_2: $detail1_2,
            detail2_1: $detail2_1,
            detail2_2: $detail2_2,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf5_4',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-4').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab7').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 4 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 4 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf5-4");
}

function add_tqf5_5() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $detail1_1 = $('.tqf5-5').find('textarea[name="detail1_1"]').val();
    $detail1_2 = $('.tqf5-5').find('textarea[name="detail1_2"]').val();
    $detail2_1 = $('.tqf5-5').find('textarea[name="detail2_1"]').val();
    $detail2_2 = $('.tqf5-5').find('textarea[name="detail2_2"]').val();
    if ($id != "" && $detail1_1 != "" && $detail1_2 != "" && $detail2_1 != "" && $detail2_2 != "") {
        check = true;
    } else {
        check = false;
    }
    if (check) {


        $data = {
            id: $id,
            detail1_1: $detail1_1,
            detail1_2: $detail1_2,
            detail2_1: $detail2_1,
            detail2_2: $detail2_2,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf5_5',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-5').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab8').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 5 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf5-5");
}

function add_tqf5_6() {
    var check = true;
    $id = $('input[name="idtqf5"]').val();
    $detail1_1 = $('.tqf5-6').find('textarea[name="detail1_1"]').val();
    $detail1_2 = $('.tqf5-6').find('textarea[name="detail1_2"]').val();
    $detail2 = $('.tqf5-6').find('textarea[name="detail2"]').val();
    $detail3_1 = $('.tqf5-6').find('textarea[name="detail3_1"]').val();
    $detail3_2 = $('.tqf5-6').find('textarea[name="detail3_2"]').val();
    $detail3_3 = $('.tqf5-6').find('textarea[name="detail3_3"]').val();
    $detail4 = $('.tqf5-6').find('textarea[name="detail4"]').val();
    // if (count == 0) {
    //     check = true;
    // } else {
    //     check = false;
    // }
    if ($id != "" && $detail1_1 != "" && $detail1_2 != "" && $detail2 != "" && $detail3_1 != "" &&
        $detail3_2 != "" && $detail3_3 != "" && $detail4 != "") {
        $id = $('input[name="idtqf5"]').val();
        $detail1_1 = $('.tqf5-6').find('textarea[name="detail1_1"]').val();
        $detail1_2 = $('.tqf5-6').find('textarea[name="detail1_2"]').val();
        $detail2 = $('.tqf5-6').find('textarea[name="detail2"]').val();
        $detail3_1 = $('.tqf5-6').find('textarea[name="detail3_1"]').val();
        $detail3_2 = $('.tqf5-6').find('textarea[name="detail3_2"]').val();
        $detail3_3 = $('.tqf5-6').find('textarea[name="detail3_3"]').val();
        $detail4 = $('.tqf5-6').find('textarea[name="detail4"]').val();

        $data = {
            id: $id,
            detail1_1: $detail1_1,
            detail1_2: $detail1_2,
            detail2: $detail2,
            detail3_1: $detail3_1,
            detail3_2: $detail3_2,
            detail3_3: $detail3_3,
            detail4: $detail4,
        };
        // ////  console.log($data);
        $.ajax({
            url: '/addtqf5_6',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $data,
            success: function(response) {
                if (response.success) {
                    $('#empty-tqf5-6').hide();
                    $($('.nav-link.active')).removeClass('unsave');
                    $('#tqf5-tab9').addClass('page-save');
                    $.toast({
                        icon: 'success',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 6 สำเร็จ',
                        position: 'top-right',
                        stack: false
                    });
                } else {
                    $.toast({
                        icon: 'error',
                        // heading: 'Positioning',
                        text: 'บันทึกหมวดที่ 6 ไม่สำเร็จ',
                        position: 'top-right',
                        stack: false
                    })
                }
            },
            error: function(error) {
                // ////  console.log(error);

            }
        });
    } else {
        Swal.fire({
            // position: 'top-end',
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 1500
        });
        //  alert('กรุณากรอกข้อมูลให้ครบ')
    }
    check_input_empty("#formtqf5-6");
}

function check_input_empty(id) {
    $(id).find("input[type=text],input[type=number],textarea[type=text]").each(function() {
        var _id = $(this).attr('id');
        if ($(this).attr('name')) {
            ////  console.log(_id)
            if ($(this).val() == "" || $(this).val() == "<p><br></p>" || $(this).val() == "<br>") {
                $('#empty-' + _id).show();
                $(this).addClass('form-empty');
            } else {
                $(this).removeClass('form-empty');
                $('#empty-' + _id).hide();
            }
            if ($('.formtextarea[name="' + $(this).attr('name') + '"]')[0] != undefined) {
                if (!$('.formtextarea[name="' + $(this).attr('name') + '"]').summernote('isEmpty')) {
                    $(this).removeClass('form-empty');
                    $('#empty-' + _id).hide();
                }
            }
            if (id == "#formtqf3-1" && $(this).attr('name') == "pre" || $(this).attr('name') == "co" || $(this).attr('name') == "date_mo") {
                $(this).removeClass('form-empty');
                $('#empty-' + _id).hide();
            }
            if (id == "#formtqf5-1" && $(this).attr('name') == "pre") {
                $(this).removeClass('form-empty');
                $('#empty-' + _id).hide();
            }

            //           //  console.log(id)
        }


        //       //  console.log(this)
        //       //  console.log($(this).val())
    });
}

function hide_input_empty(id) {
    $(id).find("input[type=text],input[type=number],textarea[type=text]").each(function() {
        var _id = $(this).attr('id');
        if ($(this).attr('name')) {

            $(this).removeClass('form-empty');
            $('#empty-' + _id).hide();

            if ($('.formtextarea[name="' + $(this).attr('name') + '"]')[0] != undefined) {
                if (!$('.formtextarea[name="' + $(this).attr('name') + '"]').summernote('isEmpty')) {
                    $(this).removeClass('form-empty');
                    $('#empty-' + _id).hide();
                }
            }
            if (id == "#formtqf3-1" && $(this).attr('name') == "pre" || $(this).attr('name') == "co" || $(this).attr('name') == "date_mo") {
                $(this).removeClass('form-empty');
                $('#empty-' + _id).hide();
            }
            if (id == "#formtqf5-1" && $(this).attr('name') == "pre") {
                $(this).removeClass('form-empty');
                $('#empty-' + _id).hide();
            }
        }
    });
}