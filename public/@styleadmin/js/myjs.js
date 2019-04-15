function ToastSuccess(string = '') {
    resetToastPosition();
    $.toast({
        heading: 'Thông báo',
        text: string,
        showHideTransition: 'slide',
        icon: 'success',
        loaderBg: '#f96868',
        position: 'top-right'
    })
}

function ToastError(string = '') {
    resetToastPosition();
    $.toast({
        heading: 'Thông báo',
        text: string,
        showHideTransition: 'slide',
        icon: 'error',
        loaderBg: '#f2a654',
        position: 'top-right'
    })
}


function Pagination(tableID,trClass) {
    var table = tableID;
    $('#maxRows').on('change', function () {
        $('.pagination').html('');
        var trnum = 0;
        var maxRows = parseInt($(this).val())
        var totalRows = $(table + ' tbody '+trClass).length
        
        $(table + ' tbody '+trClass).each(function () {
            trnum++;
            if (trnum > maxRows) {
                $(this).hide();
            }
            if (trnum <= maxRows) {
                $(this).show();
            }
        });
        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows);
            for (var i = 1; i <= pagenum;) {
                $('.pagination').append('<li class="page-item" data-page="' + i + '">\<span class="page-link">' + i++ + '</span>\</li>').show();
            }
            console.log("Page num : "+pagenum);
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click', function () {
            var pageNum = $(this).attr('data-page');
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active');
            $(table + ' tbody '+trClass).each(function () {
                trIndex++;
                if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
  
    });
}


function Pagi(){
    $('#category_table').after('<div id="nav"></div>');
    var rowsShown = 4;
    var rowsTotal = $('#category_table tbody tr').length;
    console.log(rowsTotal);
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#category_table tbody tr').hide();
    $('#category_table tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#category_table tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
}




(function() {
    var client = algoliasearch('CI2EIBUHHH', 'acf91bc5e3367faf4c70e87dfc2ef866');
    var index = client.initIndex('Product');    
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'title',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function (suggestion) {
                    const markup = `
                        <div class="algolia-result">
                            <span>
                            <img src="${window.location.origin}/images/product/${suggestion.thumbnail}" alt="img" class="algolia-thumb">
                                <span class="aa-title">${suggestion.title} | ${suggestion.cost} VNĐ</span>
                            </span>
                            
                        </div>
                    `;
                    return markup;
                },
                empty: function (result) {
                    return 'Không tìm thấy kết quả nào cho "' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/san-pham/'+suggestion.id+'/'+ suggestion.slug;
            enterPressed = true;
        });
})();





var pusher = new Pusher('fbefcc8bb38866195ed2', {
  cluster: 'ap1',
  forceTLS: true
});

var channel = pusher.subscribe('Cart');
channel.bind('loadCart', function(data) {
    loadCart();
});

var channel2 = pusher.subscribe('Bill');
channel2.bind('loadBill',function(data){
    $('#order-listing').DataTable().ajax.reload();
});

var channel3 = pusher.subscribe('Notification');
channel3.bind('loadNotification',function(data){
    loadNotify();
    var x = document.getElementById("notify");
    x.play(); 
});





