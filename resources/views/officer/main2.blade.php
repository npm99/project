@extends('template.officer')

@section('report', 'active')

@section('textpage', 'รายงานการจัดทำมคอ.')

@section('content')
    <style>
        .graph {
            margin: 20px 0;
            width: 33.33%;
            /* height: 200px; */
            text-align: center;
            text-align: -webkit-center;
        }

        @media (max-width: 992px) {
            .graph {
                width: 50%;
            }
        }

        @media (max-width: 368px) {
            .graph {
                width: 100%;
            }
        }

        .dot {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            display: inline-block;
        }

        .box-graph {
            width: 100%;
            height: 100%;
            max-width: 200px;
            max-height: 200px;
            display: grid;
            align-items: center;
        }
    </style>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12 row">
                                <div class="col-md-10 mb-4">
                                    @foreach ($year as $y)
                                        @if ($y->idYear == $y_id)
                                            <h4>รายงานการจัดทำมคอ. ปีการศึกษา {{ $y->term }} / {{ $y->Year }}</h4>
                                        @endif
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (isset($date3->deadline))
                                                <h6>วันที่สิ้นสุดการส่งมคอ.3 : &nbsp;{{ formatDateThai($date3->deadline) }}
                                                </h6>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if (isset($date5->deadline))
                                                <h6>มคอ.5 : &nbsp;{{ formatDateThai($date5->deadline) }}</h6>
                                            @endif
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-2" style="text-align: end;">
                                    <form class="form-inline" id="submit" action="report" method="POST">
                                        @csrf
                                        <div class="form-group mb-2 mr-2">
                                            <label for="year" class="mr-2">ปีการศึกษา</label>
                                            <select id="year" name="year" class="form-control">
                                                {{-- <option selected>เลือกข้อมูล</option> --}}
                                                @foreach ($year as $item)
                                                    <option value="{{ $item->idYear }}"
                                                        @if ($item->idYear == $y_id) selected @endif>
                                                        {{ $item->term }} /
                                                        {{ $item->Year }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <button type="submit" hidden class="btn btn-primary mb-2 btn-sm">OK</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-12 mx-auto row">
                                <div class="col-md-12 row">
                                    <span class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="dot" style="background-color: rgba(255, 65, 59, 0.8)">
                                        </div>
                                        ยังไม่จัดทำมคอ.3 &nbsp;&nbsp;
                                    </span>
                                    <span class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="dot" style="background-color: rgba(49, 141, 255, 0.8)">
                                        </div>
                                        จัดทำมคอ.3 แล้ว &nbsp;&nbsp;
                                    </span>
                                    <span class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="dot" style="background-color: rgba(207, 95, 255, 0.8)">
                                        </div>
                                        ยังไม่จัดทำมคอ.5 &nbsp;&nbsp;
                                    </span>
                                    <span class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="dot" style="background-color: rgba(117, 255, 95, 0.8)">
                                        </div>
                                        จัดทำมคอ.5 แล้ว &nbsp;&nbsp;
                                    </span>
                                </div>
                                @foreach ($fac as $f)
                                    <h6 style="margin-top: 20px;position: inherit;bottom: -12px;">คณะ{{ $f->factoryName }}
                                    </h6>
                                    <div class="row col-md-12">
                                        @foreach ($f->branch as $item)
                                            @if ($item->branchcode != '' && $item->branchcode != '-')
                                                {{-- <div style="width: 100%; height: 100%" id="{{ $item->branchcode }}" class="col-md-4">
                                            {{ $item->branchcode }}</div> --}}
                                                {{-- <div class="graph" style="display: grid;"> --}}
                                                <div class="graph" id="show-{{ $item->branchcode }}">
                                                    <h6>{{ $item->branchName }}</h6>
                                                    <div class="box-graph">
                                                        <canvas id="{{ $item->branchcode }}"></canvas>
                                                    </div>

                                                </div>

                                                <div class="graph" id="no-data-{{ $item->branchcode }}"
                                                    style="display:none;height:200px;">
                                                    <h6>{{ $item->branchName }}</h6>
                                                    <div class="box-graph" style="border: 1px solid #49505754;">ไม่พบข้อมูล
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $("#year").change(function(e) {
            e.preventDefault();
            $("#submit").submit();
            console.log('ss')

        });
        <?php foreach ($fac as $key => $value) { ?>
        $.each({!! $value->branch !!}, function(i, v) {
            if (v.branchcode != "" && v.branchcode != "-") {
                console.log(v)
                const canvas = document.getElementById(v.branchcode);
                // var ctx = canvas.getContext('2d');
                var myChart = new Chart(document.getElementById(v.branchcode), {
                    type: 'pie',
                    data: {
                        labels: ['ยังไม่จัดทำมคอ.3', 'จัดทำมคอ.3 แล้ว', 'ยังไม่จัดทำมคอ.5',
                            'จัดทำมคอ.5 แล้ว'
                        ],
                        datasets: [{
                            label: 'การจัดทำมคอ.3',
                            data: [v.tqf3_not, v.tqf3_done], //
                            backgroundColor: [
                                'rgba(255, 65, 59, 0.8)',
                                'rgba(49, 141, 255, 0.8)',
                            ],
                            borderColor: [
                                'rgba(248, 8, 0, 1)',
                                'rgba(0, 114, 255, 1)',
                            ],
                            borderWidth: 1
                        }, {
                            label: 'การจัดทำมคอ.5',
                            data: [v.tqf5_not, v.tqf5_done], //
                            backgroundColor: [
                                'rgba(207, 95, 255, 0.8)',
                                'rgba(117, 255, 95, 0.8)',
                            ],
                            borderColor: [
                                'rgba(99, 0, 142, 1)',
                                'rgba(22, 168, 0, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                                display: false,
                                labels: {
                                    fontFamily: '"Sarabun", sans-serif',
                                    fontColor: 'red',
                                    generateLabels: function(chart) {
                                        // Get the default label list
                                        const original = Chart.overrides.pie.plugins.legend
                                            .labels
                                            .generateLabels;
                                        const labelsOriginal = original.call(this, chart);

                                        // Build an array of colors used in the datasets of the chart
                                        var datasetColors = chart.data.datasets.map(
                                            function(e) {
                                                return e.backgroundColor;
                                            });
                                        datasetColors = datasetColors.flat();

                                        // Modify the color and hide state of each label
                                        labelsOriginal.forEach(label => {
                                            // There are twice as many labels as there are datasets. This converts the label index into the corresponding dataset index
                                            label.datasetIndex = (label.index - label.index %
                                                2) / 2;

                                            // The hidden state must match the dataset's hidden state
                                            label.hidden = !chart.isDatasetVisible(label
                                                .datasetIndex);

                                            // Change the color to match the dataset
                                            label.fillStyle = datasetColors[label.index];
                                        });

                                        return labelsOriginal;
                                    }
                                },
                            },
                            datalabels: {
                                color: 'white',
                                // formatter: function(value, context) {
                                //     return Math.round(value / context.chart.getDatasetMeta(0).total *
                                //         100) + "%";
                                // }
                            },
                            title: {
                                display: false,
                                text: v.branchName,
                                fontFamily: '"Sarabun", sans-serif',

                            },
                            labels: {},
                            tooltip: {
                                // enabled: false,
                                callbacks: {
                                    label: function(context) {
                                        const labelIndex = (context.datasetIndex * 2) + context
                                            .dataIndex;
                                        const count = context.dataset.data[0] + context.dataset.data[1];
                                        return context.chart.data.labels[labelIndex] + ': ' +
                                            Math.round(context.formattedValue / count * 100)
                                            .toString() + "%";
                                        //  +context.formattedValue

                                    }
                                }

                            },
                        },
                        animation: {
                            onComplete: function(animation) {
                                var firstSet = animation.chart.config.data.datasets[0].data,
                                    dataSum1 = firstSet.reduce((accumulator, currentValue) =>
                                        accumulator + currentValue);
                                var secondSet = animation.chart.config.data.datasets[1].data,
                                    dataSum2 = secondSet.reduce((accumulator, currentValue) =>
                                        accumulator + currentValue);
                                if (dataSum1 - 0 == 0 && dataSum2 - 0 == 0) {
                                    document.getElementById('no-data-' + v.branchcode).style
                                        .display =
                                        'block';
                                    document.getElementById("show-" + v.branchcode).style
                                        .display =
                                        'none';
                                    // console.log(v.branchcode + '  ' + (dataSum - 0))
                                }
                            }
                        }
                    }
                });
            }
        });
        <?php } ?>
        // $.each({!! $branch !!}, function(indexInArray, valueOfElement) {
        //     if (valueOfElement.branchcode != "") {
        //         anychart.onDocumentReady(function() {

        //             // set the data
        //             var data = [{
        //                     x: "a",
        //                     value: 200
        //                 },
        //                 {
        //                     x: "b",
        //                     value: 30
        //                 }
        //             ];

        //             // create the chart
        //             var chart = anychart.pie();

        //             // set the chart title
        //             chart.title(valueOfElement.branchcode);

        //             // add the data
        //             chart.data(data);

        //             // display the chart in the container
        //             chart.container(valueOfElement.branchcode);
        //             chart.draw();

        //         });
        //     }
        // });
    </script>
    {{-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            $.each({!! $branch !!}, function(indexInArray, valueOfElement) {
                if (valueOfElement.branchcode != "") {
                    console.log(valueOfElement.branchcode)
                    var chart = new CanvasJS.Chart(valueOfElement.branchcode, {
                        animationEnabled: true,
                        title: {
                            text: valueOfElement.branchcode
                        },
                        subtitles: [{
                            text: "November 2017"
                        }],
                        data: [{
                            type: "pie",
                            yValueFormatString: "#,##0.00\"%\"",
                            indexLabel: "{label} ({y})",
                            dataPoints: {!! json_encode($dataPoints, JSON_NUMERIC_CHECK) !!}
                        }]
                    });
                    chart.render();
                }


            });
            
        }
    </script> --}}
@endsection
