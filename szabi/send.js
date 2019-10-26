function katt() {
    var sendData = new Array();
    var szabad = new Array();
    szabad[0] = {
        date: $('#date').val(),
        optionValue: $('#tipus').val(),
        isTravel: document.getElementById('utazas').checked,
        approved: 0
    };
    sendData = {
        szabadsag: szabad
    };
    $.ajax({
        type: 'POST',
        url: 'http://adampapp.ddns.net/projektmunka/szabadsag',
        data: {
            data: sendData
        },
        success: function (response) {
            $('#valasz').val(response);
        }
    });
}
