$(document).on('click', '#btn_login', function () {
    localStorage.setItem('session_admin', true);
    let getSession = localStorage.getItem('session_admin');

    $.ajax({
        url: '../handler.php', // скрипт который получит отправление
        type: 'GET', // метод
        // dataType: 'json',
        data: {
            Session_admin: getSession,
        }, success: function (data) {
            console.error(data);
            $('#out').text(data.Session_admin);
        }, error: function (data){
            console.error(data);
        }
    });
});