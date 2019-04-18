@extends('admin.master') 
@section('title','Tổng Quan Hệ Thống') 
@section('css')
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
                  <i class="mdi mdi-account-switch mdi-36px"></i>
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
                  <h1 class="mb-0">4200</h1>
                  <p>
                    Sales
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-clipboard-text mdi-36px"></i>
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
                  <h1 class="mb-0">7874</h1>
                  <p>
                    Orders
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-cube-outline mdi-36px"></i>
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
                  <h1 class="mb-0">1500</h1>
                  <p>
                    Revenue
                  </p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-scale-balance mdi-36px"></i>
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
          {!! $chart->html() !!}
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
          <h4 class="card-title">Purchase History</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    User
                  </th>
                  <th>
                    First name
                  </th>
                  <th>
                    Progress
                  </th>
                  <th>
                    Amount
                  </th>
                  <th>
                    Deadline
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    Herman Beck
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 77.99
                  </td>
                  <td>
                    May 15, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    Messsy Adam
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $245.30
                  </td>
                  <td>
                    July 1, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    John Richards
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $138.00
                  </td>
                  <td>
                    Apr 12, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    Peter Meggik
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 77.99
                  </td>
                  <td>
                    May 15, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    Edward
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 160.25
                  </td>
                  <td>
                    May 03, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    John Doe
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 123.21
                  </td>
                  <td>
                    April 05, 2015
                  </td>
                </tr>
                <tr>
                  <td class="py-1">
                    <img src="" />
                  </td>
                  <td>
                    Henry Tom
                  </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td>
                    $ 150.00
                  </td>
                  <td>
                    June 16, 2015
                  </td>
                </tr>
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
          <h4 class="card-title">User List</h4>
          <div class="preview-list">
            <div class="preview-item">
              <div class="preview-thumbnail">
                <img src="" class="profile-pic" />
                <span class="badge badge-online"></span>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject font-weight-medium">Fabish David</p>
                <p class="text-muted">
                  Web-designer
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <button class="btn btn-light btn-sm">Follow</button>
              </div>
            </div>
            <div class="preview-item">
              <div class="preview-thumbnail">
                <img src="" class="profile-pic" />
                <span class="badge badge-offline"></span>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject">Praveen Kumar</h6>
                <p class="text-muted">
                  Project Manager
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <button class="btn btn-light btn-sm">Follow</button>
              </div>
            </div>
            <div class="preview-item">
              <div class="preview-thumbnail">
                <img src="" class="profile-pic" />
                <span class="badge badge-busy"></span>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject font-weight-medium">Mexwell Peter</p>
                <p class="text-muted">
                  Frontend Eng
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <button class="btn btn-primary btn-sm">Follow</button>
              </div>
            </div>
            <div class="preview-item">
              <div class="preview-thumbnail">
                <img src="" class="profile-pic" />
                <span class="badge badge-offline"></span>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject font-weight-medium">David R. Jones</p>
                <p class="text-muted">
                  Content Writer
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <button class="btn btn-light btn-sm">Follow</button>
              </div>
            </div>
            <div class="preview-item">
              <div class="preview-thumbnail">
                <img src="" class="profile-pic" />
                <span class="badge badge-busy"></span>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject font-weight-medium">Danny Mell</p>
                <p class="text-muted">
                  Graphic designer
                </p>
              </div>
              <div class="preview-actions ml-auto">
                <button class="btn btn-light btn-sm">Follow</button>
              </div>
            </div>
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

<script src="{{asset('@styleadmin/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/dashboard.js')}}"></script>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/themes/light.js"></script> --}} {!! $chart->script() !!}
@endsection