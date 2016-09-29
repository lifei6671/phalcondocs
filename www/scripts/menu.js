$(function () {
    var current_list = $(".primary-box");
    $.get('/menu.html',function (res) {
        current_list.html(res);
    });
});