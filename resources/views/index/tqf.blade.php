@extends('template.index')

@section('content')
<section class="dashboard-header">
    <div class="container-fluid">
      <!-- Project-->
      <div class="col-lg-12 mx-auto">
        <div class="work-amount card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-body">
            <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
            <div class="chart text-center"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
              <div class="text"><strong>90</strong><br><span>Hours</span></div>
              <canvas id="pieChart" width="670" height="335" class="chartjs-render-monitor" style="display: block; width: 670px; height: 335px;"></canvas>
            </div>
          </div>
        </div>
      </div>
      </div>
  </section>
    
@endsection