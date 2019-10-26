function katt() {
    var sendData = new Array();
    sendData = {
        dateFrom: $('#dateFrom').val(),
        dateTo: $('#dateTo').val(),
    };
    $.ajax({
        type: 'POST',
        url: 'http://adampapp.ddns.net/projektmunka/szabadsagleker',
        data: {
            data: sendData
        },
        success: function (response) {
            $('#valasz').val(response);
        }
    });
}
