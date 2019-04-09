@extends('admin.master') 
@section('title','Quản lý khách hàng') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
 
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh mục</h4>
        <div class="row">
            <table id="order-listing" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Tổng Hóa Đơn</th>
                            <th>Tổng Tiền</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
 
@section('javascript')


<script>
(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
      "iDisplayLength": 10,
      "language": { search: "" }
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
})(jQuery);
</script>
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection