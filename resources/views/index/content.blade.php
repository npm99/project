@extends('template.homepage')
@section('home', 'active')
@section('content')

    <div><img width="100%" height="200px" class="buttom-pic" src="{{ asset('assets/img/logo/image.jpg') }}" alt="">
    </div>
    <div class="main-body">
        <div class="row" style="flex-wrap: nowrap;">
            <div class="col-sm-12 col-md-5  col-lg-4 px-0">
                <div class="header-letf">ดาวน์โหลดไฟล์แบบฟอร์ม มคอ.</div>
                <div class="boxtext">
                    <div class="box-text">
                        <ul class="mylink">
                            <li><a href="{{ url('download/แบบฟอร์มมคอ.3.docx') }}">แบบฟอร์มมคอ.3</a></li>
                            <li><a href="{{ url('download/แบบฟอร์มมคอ.4.docx') }}">แบบฟอร์มมคอ.4</a></li>
                            <li><a href="{{ url('download/แบบฟอร์มมคอ.5.docx') }}">แบบฟอร์มมคอ.5</a></li>
                            <li><a href="{{ url('download/แบบฟอร์มมคอ.6.docx') }}">แบบฟอร์มมคอ.6</a></li>
                            {{-- <li><a href="{{ url('teacher') }}">ตัวอย่างมคอ.3</a></li> --}}
                            {{-- <li><a href="{{ url('teacher') }}">ตัวอย่างมคอ.5</a></li> --}}
                        </ul>
                        {{-- <ul class="mylink">
                        @foreach ($document as $item)
                            @if ($item->file != '')
                                <li><a href="{{ url('download/' . $item->file) }}">{{ $item->name }}</a></li>
                            @endif

                        @endforeach
                    </ul> --}}
                    </div>

                    {{-- <div class="checklist card">
                    <div class="card-body no-padding">
                        <div class="item d-flex">
                            <label for="input-1">
                                <a class="external"
                                    href="{{ url('download/แบบฟอร์มมคอ.3.docx') }}">แบบฟอร์มมคอ.3</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-2">
                                <a href="{{ url('download/แบบฟอร์มมคอ.4.docx') }}">แบบฟอร์มมคอ.4</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-3">
                                <a href="{{ url('download/แบบฟอร์มมคอ.5.docx') }}">แบบฟอร์มมคอ.5</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-4"><a
                                    href="{{ url('download/แบบฟอร์มมคอ.6.docx') }}">แบบฟอร์มมคอ.6</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-5"><a href="{{ url('teacher') }}">ตัวอย่างมคอ.3</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-6"><a href="{{ url('teacher') }}">ตัวอย่างมคอ.5</a></label>
                        </div>
                    </div>
                </div> --}}
                </div>
                {{-- <div class="boxtext">
                    <h5>ต่อ</h5>
                </div> --}}
            </div>
            <div class="col-sm-12 col-md-7 col-lg-8 px-0">
                <div class="header-news">ข่าวประชาสัมพันธ์มคอ.</div>
                {{-- <div class="main"> --}}
                {{-- <h2>ข่าวประชาสัมพันธ์</h2> --}}
                <div class="boxtext">
                    @foreach ($news as $item)
                        <div class="box-text">

                            <div class="row-between">
                                <div class="col-sm-12">
                                    <h5>{{ $item->topic }}</h5>
                                    <p style="font-size: 13px;margin-left:20px">{{ formatDateThai($item->dateupdate) }}</p>
                                </div>
                                {{-- <div class="col-sm-6 text-right"> --}}
                                {{-- <p style="text-align: right"> --}}
                                {{-- <span style="font-weight: 700">อัพเดตวันที่</span>date('d/m/Y', strtotime($item['dateupdate'])) --}}
                                {{-- </p> --}}
                                {{-- </div> --}}

                            </div>
                            @if ($item->pic != '')
                                {{-- <div style="height:200px;"> --}}
                                <img class="img-fluid mx-auto d-block" src="{{ asset('file_photo/' . $item->pic . '') }}"
                                    height="300" style="display: block;margin-left: auto;margin-right: auto;">
                                {{-- </div> --}}
                                <br>
                            @endif
                            <div style="font-size: 10pt!important;" id="new">
                                <p style="white-space: pre-wrap;">{!! $item->content !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- <div class="header-use">การใช้งาน</div>
    <div class="boxtext">
        <div class="box-text">
            <p>Some text..</p>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco.</p>
            <br>
            <h2>TITLE HEADING</h2>
            <h5>Title description, Sep 2, 2017</h5>
            <div class="fakeimg" style="height:200px;">Image</div>
            <p>Some text..</p>
            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco.</p>
        </div>
    </div>
    </div> --}}

        {{-- </div> --}}
    </div>


@endsection
{{-- @section('script')
    <script type="text/javascript">
        var s = $('#new').text();
        var htmlObject = stringToHTML(s);
        console.log(s)
        $('#new').html(s);

        
    </script>
@endsection --}}
