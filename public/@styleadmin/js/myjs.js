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


function Pagination(tableID) {
    var table = tableID;
    $('#maxRows').on('change', function () {
        $('.pagination').html('');
        var trnum = 0;
        var maxRows = parseInt($(this).val())
        var totalRows = $(table + ' tbody tr').length
        $(table + ' tr:gt(0)').each(function () {
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
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click', function () {
            var pageNum = $(this).attr('data-page');
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active');
            $(table + ' tr:gt(0)').each(function () {
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



