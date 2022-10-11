@extends('template.homepage')
@section('textpage', 'TEST LOGIN')
@section('content')
    <section class="form" style="min-height: calc(100vh - 225px);">
        @csrf
        <div class="container-fluid">
            {{-- <div class="card inform" style="padding: 20px"> --}}

            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="h5">ยืนยันตัวตน</h4>
                    </div>
                    <div class="card-body">
                        <form id="formlogin" method="POST">
                            @csrf
                            <input hidden type="text" id="uid" value="0">
                            <input hidden type="text" id="username" value="{{ $user->uid }}">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="prefix">คำนำหน้า</label>
                                    <input value="{{ $user->prename }}" type="text" class="form-control" id="prefix"
                                        name="prefix" disabled>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="fname">ชื่อ</label>
                                    <input value="{{ $user->firstNameThai }}" type="text" class="form-control"
                                        id="fname" name="fname" disabled>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="lname">นามสกุล</label>
                                    <input value="{{ $user->lastNameThai }}" type="text" class="form-control"
                                        id="lname" name="lname" disabled>
                                </div>
                            </div>
                            <div id="formtitle" class="form-group" style="display: none">
                                <label for="title">ตำแหน่งทางวิชาการ</label>
                                <select class="form-control" id="title" name="title">
                                    <option selected disabled value="">เลือก...</option>
                                    {{-- @foreach ($level as $item) --}}
                                    <option value="{{ json_encode(['อ.', 'อาจารย์']) }}">อาจารย์</option>
                                    <option value="{{ json_encode(['ผศ.', 'ผู้ช่วยศาสตราจารย์']) }}">ผู้ช่วยศาสตราจารย์
                                    </option>
                                    <option value="{{ json_encode(['รศ.', 'รองศาสตราจารย์']) }}">รองศาสตราจารย์</option>
                                    <option value="{{ json_encode(['ศ.', 'ศาสตราจารย์']) }}">ศาสตราจารย์</option>
                                    {{-- @endforeach --}}
                                </select>
                                <span id="empty1" style="color: red;display:none;">กรุณาเลือกตำแหน่งทางวิชาการ</span>
                            </div>
                            <div class="form-group">
                                <label for="fac">คณะ</label>
                                <select class="form-control" id="fac" name="fac">
                                    <option selected disabled value="">เลือกคณะ...</option>
                                    @foreach ($fac as $item)
                                        <option value="{{ $item->idfactory }}">{{ $item->factoryName }}</option>
                                    @endforeach
                                </select>
                                <span id="empty2" style="color: red;display:none;">กรุณาเลือกคณะ</span>
                            </div>
                            <div class="form-group">
                                <label for="ben">สาขา</label>
                                <select class="form-control branch" id="ben" name="ben">
                                    <option selected disabled value="">เลือกสาขา...</option>
                                </select>
                                <span id="empty3" style="color: red;display:none;">กรุณาเลือกสาขา</span>
                            </div>
                            <div class="form-group">
                                <label for="level">ประเภทผู้ใช้งาน</label>
                                <select class="form-control" id="level" name="level" disabled>
                                    <option selected disabled value="">เลือก...</option>
                                    @foreach ($level as $item)
                                        <option value="{{ $item->levelID }}" disabled>{{ $item->levelName }}</option>
                                    @endforeach
                                </select>
                                <span id="empty4" style="color: red;display:none;">กรุณาเลือกประเภทผู้ใช้งาน</span>
                            </div>
                            <br />
                            <center>
                                <button type="button" class="btn btn-primary user-submit">ยืนยัน</button>
                                <a href="/logout" class="btn btn-secondary ">ย้อนกลับ</a>
                            </center>

                        </form>
                    </div>
                    {{-- </div> --}}
                </div>



                {{-- <pre>{{ print_r($data) }}</pre> --}}
                {{-- <h5 id="id">id: {{ $data['id'] }}</h5>
                <h5 id="msg">msg: {{ $data['msg'] }}</h5>
                <h5 id="name">name_id: {{ $data['name_id'] }}</h5>
                <h5 id="session">session_index: {{ $data['session_index'] }}</h5>
                {{-- <h5>attribs</h5> --}}
                {{-- <br> --}}
                {{-- <pre>{{ print_r($user) }}</pre> --}}
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        var level = "{{ $user->title }}";
        var campus = "{{ $user->campus }}";
        if (level == 'Students' || campus != 'Khonkaen') {
            //alert('ท่านไม่มีสิทธิ์ในการเข้าถึงระบบ');
            alert('ข้อมูลไม่ถูกต้อง');
            document.location.href = '/logout';
        }
        if (level == 'Officers') {
            var level_value = $('#level option:contains(เจ้าหน้าที่)').val();
            $('#level').val(level_value).change();
        } else {
            $('#formtitle').show();
            var level_value = $('#level option:contains(อาจารย์)').val();
            $('#level').val(level_value).change();
            $('#prefix').val('อาจารย์');

        }
        $("select").on("change", function(e) {
            $('#formlogin').find('select').each(function(index, element) {
                // element == this
                if ($(this).val() != null && $(this).val() != '') {
                    $('#empty' + (index + 1)).hide();
                    // console.log(index + 1)
                }


            });
        });
        $('#fac').change(function() {
            if ($(this).val() != '') {
                var select = $(this).val();
                var _token = $('input[name=_token]').val();
                console.log(select);
                $.ajax({
                    url: "/fetch_branch",
                    method: "post",
                    data: {
                        _token: _token,
                        select: select
                    },
                    success: function(res) {
                        $('.branch').html(res);
                    }
                });
            }

        });
    </script>
@endsection
