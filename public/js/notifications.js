$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
    $.get(BASE_URL + '/notifications/ajax/get', function (data) {
        $.each(data, function (idx, obj) {
            $.notify({
                // options
                message: obj.data.message,
            }, {
                // settings
                type: obj.data.type,
                delay: 15000,
                onClosed: function () {
                    $.ajax({
                        type: 'POST',
                        url: BASE_URL + '/notifications/ajax/read/' + obj.id,
                    });
                }
            });
        });
    });
});