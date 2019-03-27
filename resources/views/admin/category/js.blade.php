<script>
    
        function fetch_category(query = '')
        {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'GET',
                    url: '{{route('category.search')}}',
                    data:{query:query},
                    dataType: 'json',
                    success: function(data) {
                        $('#category_table_body').html(data.table_data);
                    },
                    error: function(html, status) {
                        console.log(html.responseText);
                    }
                });
        }
    
        //Func Editcategory
        function editCategory(id)
        {
            var category = $('#nameCategory').val();
            var slug = $('#slug').val();
    
            var dataString = "title="+category+"&slug="+slug+"&id="+id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{route('category.update')}}',
                data:dataString,
                success: function(data) {
                        ToastSuccess(data.success);
                        fetch_category();
                    },
                    error: function(request, status) {
                        $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
                }
            });
        }
        //Func Addcategory
        function addCategory()
        {
            var category = $('#nameCategory').val();
            var slug = $('#slug').val();
            var dataString = "title="+category+"&slug="+slug;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'POST',
                    url: '{{route('category.store')}}',
                    data:dataString,
                    success: function(data) {
                        ToastSuccess(data.success);
                        fetch_category();
                    },
                    error: function(request, status) {
                        $.each(request.responseJSON.errors,function(key,val){
                            ToastError(val);
                        });
                    }
            });
        }
        $(document).ready(function(){
            
            fetch_category(); // Làm mới table dữ liệu
    
            $('#OpenModal').click(function(){
                $('#exampleModalLabel').html('Thêm danh mục');
                $('#modalFooter').html('<button type="button" id="addCategory" class="btn btn-success">Lưu</button><button type="button" id="addCategory2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Close</button>');
                $('#nameCategory').val('');
                $('#slug').val('');
                // Lưu
                $('#addCategory').click(function(){
                    addCategory();
                });
    
                // Lưu và đóng
                $('#addCategory2').click(function(){
                    addCategory();
                    $('#nameCategory').val('');
                    $('#slug').val('');
                    $('#CategoryModal').modal('hide');
                });
            
            });
            
            $(document).on('click','.edited',function(){
                $('#CategoryModal').modal('show');
                $('#exampleModalLabel').html('Sửa danh mục');
                $('#modalFooter').html('<button type="button" id="editCategory" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
                var id = $(this).attr("id");
                var title = $(this).attr("title");
                var slug = $(this).attr("slug");
                $('#nameCategory').val(title);
                $('#slug').val(slug);
    
                $('#editCategory').click(function(){
                    editCategory(id);
                });
            });
    
            // Nút Delete
            $(document).on('click','.delete',function(){
                var id = $(this).attr("id");
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'GET',
                    url: '{{url('admin/category/delete')}}/'+id,
                    success: function(data) {
                        ToastSuccess(data.success);
                        fetch_category();
                    },
                    error: function(request, status) {
                        ToastError(request.responseText);
                    }
                })
            });
        });
        // Tìm kiếm
        $(document).on('keyup', '#SearchCategory', function(){
            var query = $(this).val();
            fetch_category(query);
        });
    
    </script>