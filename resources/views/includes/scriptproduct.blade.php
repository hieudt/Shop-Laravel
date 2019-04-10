<script>
        var id = '';
        $(document).on('click','#quickviewBtn',function(){
            $('#ListSelectColor').html('');
            var count = $(this).attr('data-product');
            var product = $('#product'+count).serializeArray();
            console.log(product);
            $('.product-title').text(product[0].value);
            $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
            $('.current').text(product[4].value+"đ");
            id = product[5].value;
            fetch_size(id);
           
            
        });
    
        $('#selSize').change(function(){
            fetch_color_forsize(id,$(this).val());
        });
        
    
        function fetch_size(idproduct)
        {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: '{{route('front.fetchsize')}}',
            data:{idproduct:idproduct},
            dataType: 'json',
                success: function(data) {
                    $('#selSize').html(data.table_data);
                    $('#selSize').append('<option disabled selected value> -- Chọn kích cỡ -- </option>');
                },
                error: function(html, status) {
                   
                }
            });
        }
    
        function fetch_color_forsize(idproduct,idsize)
        {
            $.ajax({
            headers: {
                'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
            url: '{{route('front.fetchcolor')}}',
            data:{idproduct:idproduct,idsize:idsize},
            dataType: 'json',
                success: function(data) {
                    $('#ListSelectColor').html(data.table_data);
                },
                error: function(html, status) {
                      
                }
            });
        }
    </script>