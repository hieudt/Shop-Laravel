function ToastSuccess(string = ''){
    resetToastPosition();
    $.toast({
        heading: 'Success',
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
        heading: 'Danger',
        text: string,
        showHideTransition: 'slide',
        icon: 'error',
        loaderBg: '#f2a654',
        position: 'top-right'
    })
}