<script>
        var id = '';
        $(document).ready(function(){
            $.ajax({
            method:'GET',
            url:'{{url('/api/v1/slide')}}',
            success: function(data){
            var output = "";
            var count = 0;
            data.forEach(element => {
                count++;
                if(count == 1) output += "<div class='item active'>";
                else output += "<div class='item'>";
                output += "<img src='{{url('/images/sliders/')}}/"+element.thumbnail+"' alt='Bootstrap Touch Slider' class='slide-image'>";
                output += "<div class='bs-slider-overlay'></div>";
                output += "<div class='slide-text slide_style_center'>";
                    output += "<h1 data-animation='animated wobble'>"+element.title+"</h1>";
                    output += "<p data-animation='animated zoomInUp'>"+element.content+"</p>";
                    output += "<a href='"+element.url+"'><button data-animation='animated zoomInUp' type='button' class='button style-10'>XEM NGAY</button></a>"
                output += "</div>";
                output += "</div>";
            });
                $('.carousel-inner').html(output);
                
                },
                error: function(request,status){
                console.log(request.responseJSON);
                }
            });
        });
        $(document).on('click','.add-to-cart , .add-to-wish',function(){
            $('#ListSelectColor').html('');
            var count = $(this).attr('data-product');
            var product = $('#product'+count).serializeArray();
            $('.product-title').text(product[0].value);
            $('.image-product').attr("src","{{url('/images/product')}}/"+product[1].value);
            $('.current').text(product[4].value+"đ");
            id = product[5].value;
            $('#modalSoLuong').text(1);
            $('#modalIdProduct').val(id);
            fetch_size(id);

            setTimeout(function() {
                $('#quickViewProduct').modal();
            }, 200);
           
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
    <script>
        $(document).ready(function(){
            $('.project_list').mixItUp({
                animation: {
                    effects: 'fade translateZ(-100px)'
                }
            });
        });
    </script>
    <script src="{{ URL::asset('assets/js/jquery.mixitup.min.js')}}"></script>