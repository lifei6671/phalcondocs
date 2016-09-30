$(function () {
    var current_list = $(".primary-box");
    $.get('/menu.html',function (res) {
        current_list.html(res);
        $(".section .toctree-l2").find('a').bind('click',function (event) {

            var url = $(this).attr('href');
            var a = document.createElement('a');
            a.href = url;

            if(window.location.pathname != a.pathname){
                event.preventDefault();
                NProgress.start();
                $.get(url,function (res) {
                    var html = $(res).find('.body').html();
                    var title = $(res).find('title').text();

                    history.pushState(null,title,url);
                    $('.body').html(html);
                    $('html, body').animate({scrollTop: $(".related").offset().top + 50}, 10);
                    NProgress.done();
                    NProgress.remove();
                });
                return false;
            }
            if(window.location.pathname == a.pathname && url.indexOf('#') == -1){
                $('html, body').animate({scrollTop:$(".related").offset().top + 50}, 10);
                event.preventDefault();
                return false;
            }

        });
    });
});