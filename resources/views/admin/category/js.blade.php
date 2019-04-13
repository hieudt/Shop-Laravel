<script>

        //Load SubCategory
        function fetch_Subcategory(query = '')
        {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'GET',
                    url: '{{route('subcategory.search')}}',
                    data:{query:query},
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory_table_body').html(data.table_data);
                    },
                    error: function(html, status) {
                        console.log(html.responseText);
                    }
                });
        }
        // Load Category
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
                        $('#SelCat').html(data.select_data);
              

                    },
                    error: function(html, status) {
                        console.log(html.responseText);
                    }
                });
        }
    
        //Func EditSubCategory
        function editSubCategory(id)
        {
            var name = $('#nameSubCategory').val();
            var id_cat = $('#SelCat').val();
            var slug = $('#slugSub').val(); 
            var dataString = "name_sub="+name+"&id_cat="+id_cat+"&slug="+slug+"&id="+id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '{{route('subcategory.update')}}',
                data:dataString,
                success: function(data) {
                        ToastSuccess(data.success);
                        fetch_Subcategory();
                    },
                    error: function(request, status) {
                        $.each(request.responseJSON.errors,function(key,val){
                        ToastError(val);
                    });
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

        //Func Add SubCategory
        function addSubcategory()
        {
            var id_cat = $('#SelCat').val();
            var name_sub = $('#nameSubCategory').val();
            var slug = $('#slugSub').val();
            var dataString = "name_sub="+name_sub+"&id_cat="+id_cat+"&slug="+slug;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'POST',
                    url: '{{route('subcategory.store')}}',
                    data:dataString,
                    success: function(data) {
                        ToastSuccess(data.success);
                        fetch_Subcategory();
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
            fetch_Subcategory(); // Làm mới table
            
            $('#OpenSubModal').click(function(){
                $('#SubCategoryLabel').html('Thêm danh mục con');
                $('#submodalFooter').html('<button type="button" id="addSubCategory" class="btn btn-success">Lưu</button><button type="button" id="addSubCategory2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
                $('#nameSubCategory').val('');
                $('#slugSub').val('');

                $('#addSubCategory').click(function(){
                    addSubcategory();
                });

                $('#addSubCategory2').click(function(){
                    addSubcategory();
                    $('#nameSubCategory').val('');
                    $('#slugSub').val('');
                    $('#SubcategoryModal').modal('hide');
                });
            });

            $('#OpenModal').click(function(){
                $('#exampleModalLabel').html('Thêm danh mục');
                $('#modalFooter').html('<button type="button" id="addCategory" class="btn btn-success">Lưu</button><button type="button" id="addCategory2" class="btn btn-success">Lưu & Đóng</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
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
            //Nút edit subcategory
            $(document).on('click','.editedSub',function(){
                $('#SubcategoryModal').modal('show');
                $('#SubCategoryLabel').html('Sửa danh mục con');
                $('#submodalFooter').html('<button type="button" id="editSubCategory" class="btn btn-success">Lưu</button><button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>');
                var id = $(this).attr("id");
                var name_sub = $(this).attr("title");
                var slug = $(this).attr("slug");
                var id_cat = $(this).attr("id-cat");
                var name_cat = $(this).attr("name-cat");
                $('#nameSubCategory').val(name_sub);
                $('#slugSub').val(slug);
                $('#SelCat').val(id_cat);
                $('#select2-SelCat-container').html(name_cat);

                $('#editSubCategory').click(function(){
                    editSubCategory(id);
                });
            });
            // Nút edit category
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
            
            //Nút delete subcategory
            $(document).on('click','.deleteSub',function(){
                var id = $(this).attr("id");
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
                },
                    method: 'GET',
                    url: '{{url('admin/subcategory/delete')}}/'+id,
                    success: function(data) {
                        ToastSuccess(data.success);
                        fetch_Subcategory();
                    },
                    error: function(request, status) {
                        ToastError(request.responseText);
                    }
                })
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

            Pagination('#category_table');
        });
        // Tìm kiếm
        $(document).on('keyup', '#SearchCategory', function(){
            var query = $(this).val();
            fetch_category(query);
        });

        $(document).on('keyup','#SearchSubCategory',function(){
            var query = $(this).val();
            fetch_Subcategory(query);
        });

        
    
    </script>