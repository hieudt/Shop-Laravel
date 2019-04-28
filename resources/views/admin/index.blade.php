@extends('admin.master') 
@section('title','Tổng Quan Hệ Thống') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
 
@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-3 grid-margin d-flex align-items-stretch">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <!--card statistics-->
          <div class="card bg-success text-white">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="mr-auto">
                  <h1 class="mb-0">{{count(VisitLog::all())}}</h1>
                  <p>
                    Lượt Truy Cập
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-signal-variant mdi-36px"></i>
                </div>
              </div>
            </div>
          </div>
          <!--card statistics-->
        </div>
        <div class="col-12 grid-margin stretch-card">
          <!--card statistics-->
          <div class="card bg-danger text-white">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="mr-auto">
                  <h1 class="mb-0">{{count(App\User::all())}}</h1>
                  <p>
                    Khách Hàng
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-account mdi-36px"></i>
                </div>
              </div>
            </div>
          </div>
          <!--card statistics-->
        </div>
        <div class="col-12 grid-margin stretch-card">
          <!--card statistics-->
          <div class="card bg-warning text-white">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="mr-auto">
                  <h1 class="mb-0">{{count(App\Bill::where('status',2)->where('statusPay',1)->get())}}</h1>
                  <p>
                    Hóa Đơn
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-file-document mdi-36px"></i>
                </div>
              </div>
            </div>
          </div>
          <!--card statistics-->
        </div>
        <div class="col-12 stretch-card">
          <!--card statistics-->
          <div class="card bg-info text-white">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="mr-auto">
                  <h1 class="mb-0">{{formatMoney(App\Bill::where('status',2)->where('statusPay',1)->sum('TotalMoney'),true)}}</h1>
                  <p>
                    Doanh Thu (0 Bao gồm phí ship)
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-coin mdi-36px"></i>
                </div>
              </div>
            </div>
          </div>
          <!--card statistics-->
        </div>
      </div>
    </div>
    <div class="col-lg-9 grid-margin stretch-card">
      <!--business survey chart-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Biểu đồ thống kê</h4>
          @if(!empty($chart))
          {!! $chart->html() !!}
          @endif
        </div>
      </div>
      <!--business survey chart ends-->
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
      <!--purchase table-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sản phẩm được nhiều người mua</h4>
          <div class="table-responsive">
            <table class="table" id="order-listing">
              <thead>
                <tr>
                  <th>
                    Tên sản phẩm
                  </th>
                  <th>
                    Tỉ lệ doanh thu
                  </th>
                  <th>
                    Tổng doanh thu
                  </th>
                  <th>
                    Tổng SL Đã bán
                  </th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--purchase table ends-->
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <!--user list-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh mục ưa chuộng</h4>
          <div class="preview-list">
            @forelse ($categoryTop as $catTop)
            <div class="preview-item">
              <div class="preview-item-content">
                <p class="preview-subject font-weight-medium">{{$catTop->title}}</p>
                <p class="text-muted">
                  <div class="badge badge-pill badge-outline-info">Doanh thu mang lại : {!!formatMoney((int)$catTop->TongTien)!!}</div>
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <div class="badge badge-success badge-pill">Đã Bán {{$catTop->SL}} SP</div>
              </div>
            </div>
            @empty Không có dữ liệu @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <!--weather card-->
      <div class="card card-weather">
        <div class="card-body bg-warning text-white">
          <div class="weather-date-location">
            <h3>Monday</h3>
            <h4>
              <span class="weather-date">25 October, 2016</span>
              <span class="weather-location">London, UK</span>
            </h4>
          </div>
          <div class="weather-data d-flex">
            <div class="mr-auto">
              <h4 class="display-3">21<span class="symbol">&deg;</span>C</h4>
              <p>
                Mostly Cloudy
              </p>
            </div>
            <div class="ml-auto">
              <i class="mdi mdi-weather-fog"></i>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="d-flex weakly-weather">
            <div class="weakly-weather-item">
              <p class="mb-0">
                Sun
              </p>
              <i class="mdi mdi-weather-cloudy"></i>
              <p class="mb-0">
                21<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Mon
              </p>
              <i class="mdi mdi-weather-hail"></i>
              <p class="mb-0">
                23<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Tue
              </p>
              <i class="mdi mdi-weather-partlycloudy"></i>
              <p class="mb-0">
                19<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Wed
              </p>
              <i class="mdi mdi-weather-pouring"></i>
              <p class="mb-0">
                20<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Thu
              </p>
              <i class="mdi mdi-weather-pouring"></i>
              <p class="mb-0">
                20<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Fri
              </p>
              <i class="mdi mdi-weather-snowy-rainy"></i>
              <p class="mb-0">
                20<span class="symbol">&deg;</span>
              </p>
            </div>
            <div class="weakly-weather-item">
              <p class="mb-1">
                Sat
              </p>
              <i class="mdi mdi-weather-snowy"></i>
              <p class="mb-0">
                20<span class="symbol">&deg;</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--weather card ends-->
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <!--todo list starts-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">To Do Task List</h4>
          <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Meeting with Alisa
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Call John
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Create invoice
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Print Statements
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Prepare for presentation
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Pick up kids from school
                    </label>
                </div>
                <i class="remove mdi mdi-close-circle-outline"></i>
              </li>
            </ul>
          </div>
          <div class="add-items d-flex mt-2">
            <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
            <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
          </div>
        </div>
      </div>
      <!--todo list ends-->
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
      <!--datepicker-->
      <div class="card">
        <div class="card-body pt-0">
          <div class="datepicker"></div>
        </div>
      </div>
      <!--datepicker ends-->
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <!--browser stats-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Browser stats</h4>
          <div class="table-responsive">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Opera mini
                  </td>
                  <td>
                    23%
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Safari
                  </td>
                  <td>
                    07%
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Chrome
                  </td>
                  <td>
                    33%
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Firefox
                  </td>
                  <td>
                    17%
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Explorer
                  </td>
                  <td>
                    05%
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <img src="" alt="image" />
                  </td>
                  <td>
                    Netscape
                  </td>
                  <td>
                    16%
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--browser stats ends-->
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
      <!--activity-->
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Activity</h4>
          <ul class="bullet-line-list">
            <li>
              <p class="mb-0">Lorem Ipsum has been the printing </p>
              <p class="text-muted">
                7 months ago.
              </p>
            </li>
            <li>
              <p class="mb-0">Checkout! How cool is that!</p>
              <p class="text-muted">
                7 months ago.
              </p>
            </li>
            <li>
              <p class="mb-0">It's awesome when we find a solution</p>
              <p class="text-muted">
                7 months ago.
              </p>
            </li>
            <li>
              <p class="mb-0">Checkout! How cool is that!</p>
              <p class="text-muted">
                7 months ago.
              </p>
            </li>
            <li>
              <p class="mb-0">It's awesome when we find a solution</p>
              <p class="text-muted">
                7 months ago.
              </p>
            </li>
          </ul>
        </div>
      </div>
      <!--activity ends-->
    </div>
  </div>
</div>
@endsection
 
@section('javascript')
<script>
$(document).ready(function(){
  var admintoken = localStorage.getItem('admintoken');
  if(admintoken == "YES"){
  }else {
    console.log("Alert");
    $.ajax({
    headers: {
        'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
    },
    method: 'POST',
    url: '{{route('admin.safemode.alertlogin')}}',
    dataType: 'json',
    });
  }
})
</script>
<script>
  $(document).ready(function(){
      $('#order-listing').DataTable({
      "bLengthChange" : false, //thought this line could hide the LengthMenu
      "iDisplayLength": 5,
      "language": { 
          "sProcessing":   "Đang xử lý...",
          "sLengthMenu":   "Xem _MENU_ mục",
          "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
          "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
          "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
          "sInfoFiltered": "(được lọc từ _MAX_ mục)",
          "sInfoPostFix":  "",
          "sSearch":       "Tìm:",
          "sUrl":          "",
          "oPaginate": {
              "sFirst":    "Đầu",
              "sPrevious": "Trước",
              "sNext":     "Tiếp",
              "sLast":     "Cuối"
          }
      },
      "process" : true,
      "serverSide" : false,
      "ajax" : '{!!route('admin.fetchproduct')!!}',
      "columns":[
          {data:'title',name:'title'},
          {data:'progress',name:'progress'},
          {data:'TongTien',name:'TongTien'},
          {data:'SL',name:'SL'}
      ]

      });
      $('#order-listing').each(function(){
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
      });
  });

</script>
<script src="{{asset('@styleadmin/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/dashboard.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
{{--
<script type="text/javascript" src="https://cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.2/all/gauge.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})

</script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/highcharts.js"></script>
{{--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/js/modules/offline-exporting.js"></script> --}} {{--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/map.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/data.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/mapdata/custom/world.js"></script> --}} {{--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.2/justgage.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.8.0/plottable.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/echarts/3.6.2/echarts.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/amcharts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/serial.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/plugins/export/export.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/themes/light.js"></script> --}} 
@if($chart)
{!! $chart->script() !!}
@endif
@endsection