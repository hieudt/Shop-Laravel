@extends('admin.master') 
@section('title','Danh mục') 
@section('css')
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('@styleadmin/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
@endsection
 
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh mục</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">

                    <div class="col-md-6">
                        <input type="text" name="SearchCategory" id="SearchCategory" placeholder="Tìm kiếm danh mục" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="button" id="OpenModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#CategoryModal" data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <select name="state" id="maxRows" class="form-control">
                                        <option value="5000">Show All</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                    </select>
                            </div>
                        </div>
                </div><br/>
                <table id="category_table" class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Tên không dấu</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="category_table_body">
                    </tbody>
                </table>
                <div class="pagination-container">
                    <nav>
                        <ul class="pagination flat pagination-success">
                            <li class="page-item">1</li>
                            <li class="page-item">2</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="nameCategory">
                    </div>
                    <div class="form-group">

                        <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>

                        <textarea class="form-control" id="slug"></textarea><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="modalFooter">
            </div>
        </div>
    </div>
</div>

{{-- END MODAL--}}
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Danh mục con</h4>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="SearchSubCategory" id="SearchSubCategory" placeholder="Tìm kiếm danh mục con" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="button" id="OpenSubModal" class="btn btn-success btn-fw" data-toggle="modal" data-target="#SubcategoryModal"
                            data-whatever="@getbootstrap"><i class="mdi mdi-check"></i>Thêm mới</button>
                    </div>
                </div><br/>
                <table id="subcategory_table" class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Tên không dấu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="subcategory_table_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="SubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="SubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubCategoryLabel">Thêm mới danh mục con</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên : </label>
                        <input type="text" class="form-control" id="nameSubCategory">
                    </div>
                    <div class="form-group">
                        <label>Danh mục cha</label>
                        <select class="js-example-basic-single" id="SelCat" style="width:100%">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Đường dẫn : </label><br/>
                        <textarea class="form-control" id="slugSub"></textarea><br/> Nếu để trống sẽ tự động tạo ra.
                    </div>

                </form>
            </div>
            <div class="modal-footer" id="submodalFooter">
            </div>
        </div>
    </div>
</div>
{{--End modal--}}
@endsection
 
@section('javascript')
    @include('admin.category.js')
<script src="{{asset('@styleadmin/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('@styleadmin/js/select2.js')}}"></script>
<script src="{{asset('@styleadmin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>

@endsection