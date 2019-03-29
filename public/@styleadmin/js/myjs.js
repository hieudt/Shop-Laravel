function ToastSuccess(string = ''){
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

function ToastError(string = ''){
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

