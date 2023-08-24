@extends('layouts.header')
@section('css')

<link href="{{ asset('login_css/css/plugins/c3/c3.min.css') }}" rel="stylesheet">
<link href="{{ asset('login_css/css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
  <div class="col-lg-3">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <span class="label label-success pull-right">as of Today</span>
              <h5>Open Engagements</h5>
          </div>
          <div class="ibox-content">
              <h1 class="no-margins">0</h1>
              {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
              <small>&nbsp;</small>
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <span class="label label-success pull-right">as of Today</span>
              <h5>Open Findings</h5>
          </div>
          <div class="ibox-content">
              <h1 class="no-margins">0</h1>
              {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
              <small>&nbsp;</small>
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <span class="label label-success pull-right">as of Today</span>
              <h5>Action Plans not Due</h5>
          </div>
          <div class="ibox-content">
              <h1 class="no-margins">0</h1>
              {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
              <small>&nbsp;</small>
          </div>
      </div>
  </div>
  <div class="col-lg-3">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <span class="label label-success pull-right">as of this Month ({{date('M. Y')}})</span>
              <h5>Action Plans Due</h5>
          </div>
          <div class="ibox-content">
              <h1 class="no-margins">0</h1>
              {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
              <small>&nbsp;</small>
          </div>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Bar Chart Example</h5>
            </div>
            <div class="ibox-content">
                <div>
                    <div id="slineChart" ></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Action Plans Report </h5>
      </div>
      <div class="ibox-content">
          <div id="morris-bar-chart"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Latest Update</h5>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover tables">
                <thead>
                  <tr>
                      <th>Department</th>
                      <th>Findings</th>
                      <th>Action Plans</th>
                      <th>Closed Action Plans</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('login_css/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{ asset('login_css/js/plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('login_css/js/plugins/chartJs/Chart.min.js') }}"></script>
<script>
    var audit_plans = [];
</script>  

<script src="{{ asset('login_css/js/plugins/morris/raphael-2.1.0.min.js') }}"></script>
<script src="{{ asset('login_css/js/plugins/morris/morris.js') }}"></script>

<script src="{{ asset('login_css/js/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('login_css/js/plugins/c3/c3.min.js') }}"></script>
<script >
      $(document).ready(function () {
      c3.generate({
                bindto: '#slineChart',
                data: {
        columns: [
            ['Findings', 30, 20, 50, 40, 60, 50],
            ['Avg. Risk', 12, 1, 3, 5, 7, 10],
        ],
        type: 'bar',
        types: {
            "Avg. Risk": 'spline',
        },
        // groups: [
        //     ['data1','data2']
        // ]
    }
            });
        });
   Morris.Bar({
        element: 'morris-bar-chart',
        data: [{ y: 'ITD', a: 60, b: 50 },
            { y: 'HRD', a: 75, b: 65 },
            { y: 'BPD', a: 50, b: 40 },
            { y: 'ATM', a: 75, b: 65 },
            { y: 'WGI', a: 50, b: 40 }, ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Action Plans', 'Closed Action Plan'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#1ab394', '#cacaca'],
    });

    $(document).ready(function(){
      $('.tables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
            ]

        });

    });
</script>
@endsection