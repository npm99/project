<style>
    .new p {
        font-size: 12pt;
        color: #212529;
        ;
    }

    .title img {
        width: -webkit-fill-available !important;
    }
</style>
<!-- Dashboard Header Section    -->
<section class="header">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-lg-8 mx-auto">&nbsp;
                <i class="fa fa-bullhorn iconpage"></i> &nbsp;<span>
                    <h3 class="h3">ข่าวประกาศ</h3>
                </span>
                <div class="br"></div>
                <div class="card news">
                    <div class="card-body">
                        <div class="pull-left">
                            <h5 class="h6">{{ $news['topic'] }}</h5>
                        </div>
                        <div class="pull-right">
                            <i class="fa fa-clock-o"></i> <span>
                                <h6 class="h7 topic"> {{ formatDateThai($news['dateupdate']) }}</h6>
                            </span>
                        </div>
                    </div>
                    <div class="card-body box">
                        <pre>{{ $news['content'] }}</pre>
                    </div>
                </div>
            </div> --}}
            {{-- <div id="new1" style="display: none">{{ $news->content }}</div> --}}
            <div class="col-lg-8">
                <div class="recent-updates card">
                    <div class="card-header">
                        <h4 class="h5">ข่าวประกาศ</h4>
                    </div>
                    @foreach ($news as $item)
                        <div class="card-body no-padding">
                            <!-- Item        -->
                            <!--<div class="item d-flex justify-content-between">-->
                            <!--<div class="info d-flex">-->
                            {{-- <div class="icon"><i class="icon-rss-feed"></i></div> --}}
                            <div class="title">
                                @if ($item->pic != '')
                                    {{-- <div style="height:200px;"> --}}
                                    <img class="img-fluid mx-auto d-block"
                                        src="{{ asset('file_photo/' . $item->pic . '') }}"
                                        style="display: block;margin-left: auto;margin-right: auto;height:400px;">
                                    {{-- </div> --}}
                                    <br>
                                @endif
                                <div class="col-sm-12">
                                    <h5>{{ $item->topic }}</h5>
                                    <!--                                        <p style="font-size: 13px;margin-left:20px">
                                            {{ formatDateThai($item->dateupdate) }}</p>-->
                                </div>
                                {{-- <h6>{{ $item['topic'] }}</h6> --}}
                                {{-- <br> --}}
                                <div class="new" style="margin-left: 30px" id="new">
                                    <p style="font-size: 12pt;white-space: pre-wrap;">{!! $item->content !!}</p>
                                </div>

                                <!--</div>-->
                                <!--</div>-->
                                {{-- <div class="date text-right">
                                <strong>24</strong><span>May</span>
                            </div> --}}
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: end">
                            <span>
                                <p class="topic"><i class="fa fa-clock-o"></i> {{ formatDateThai($item->dateupdate) }}
                                </p>
                            </span>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-4 mx-auto">
                <div class="checklist card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="h5">ดาวน์โหลดไฟล์ มคอ.</h4>
                    </div>
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
                        <!--                        <div class="item d-flex">
                            <label for="input-5"><a href="{{ url('teacher') }}">ตัวอย่างมคอ.3</a></label>
                        </div>
                        <div class="item d-flex">
                            <label for="input-6"><a href="{{ url('teacher') }}">ตัวอย่างมคอ.5</a></label>
                        </div>-->
                    </div>
                </div>
            </div>


            {{-- <div class="col-lg-4 mx-auto">&nbsp;
                <i class="fa fa-download iconpage"></i> &nbsp;<span>
                    <h3 class="h3">ดาวน์โหลดไฟล์ มคอ.</h3>
                </span>
                <div class="br"></div>
                <div class="card news">
                    <!--<div class="card-header d-flex align-items-center">
                    <h5 class="h6"></h5>
                    </div>-->
                    <b>
                        <div class="card-body box"> แบบฟอร์ม มคอ.
                            <ul>
                                <li>
                                    <a href="{{ url('download/แบบฟอร์มมคอ.3.docx') }}">แบบฟอร์มมคอ.3</a>
                                </li>
                                <li>
                                    <a href="{{ url('download/แบบฟอร์มมคอ.4.docx') }}">แบบฟอร์มมคอ.4</a>
                                </li>
                                <li>
                                    <a href="{{ url('download/แบบฟอร์มมคอ.5.docx') }}">แบบฟอร์มมคอ.5</a>
                                </li>
                                <li>
                                    <a href="{{ url('download/แบบฟอร์มมคอ.6.docx') }}">แบบฟอร์มมคอ.6</a>
                                </li>
                            </ul>
                            ตัวอย่าง มคอ.
                            <ul>
                                <li>
                                    <a href="{{ url('teacher') }}">ตัวอย่างมคอ.3</a>
                                </li>
                                <li>
                                    <a href="{{ url('teacher') }}">ตัวอย่างมคอ.5</a>
                                </li>
                            </ul>

                        </div>
                    </b>
                </div>
            </div> --}}
        </div>
    </div>
</section>

{{-- <section class="projects no-padding-top">
    <div class="container-fluid">
        <!-- Project-->
        <div class="col-lg-12 mx-auto">
            <div class="work-amount card">
                <div class="card-body">
                    <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
                    <div class="chart text-center">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="text"><strong>90</strong><br><span>Hours</span></div>
                        <canvas id="pieChart" width="670" height="335" class="chartjs-render-monitor"
                            style="display: block; width: 670px; height: 335px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- @section('script')
    <script type="text/javascript">
        var s = $('#new1').text();
        var htmlObject = stringToHTML(s);
        console.log(s)
        $('#new').html(s);

    </script>
@endsection --}}
