$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
document.onreadystatechange = function () {
    var state = document.readyState;
    if (state == 'complete') {
        document.getElementById('load').style.visibility = "hidden";
        document.getElementById('contents').style.visibility = "visible";
    }
};

$(document).ready(function () {
    let menuList = $('.sidebar-main .sidebar-list');
    for (const child of menuList) {
        if (child.getAttribute('data-id') == check) {
            child.classList.add('active_background_menu');
            $('.sidebar-main .sidebar-list[data-id="' + check + '"]>a i').addClass('active_color_menu');
            $('.sidebar-main .sidebar-list[data-id="' + check + '"]>a span').addClass('active_color_menu');
        }
    }
});
