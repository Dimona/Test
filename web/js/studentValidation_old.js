/**
 * Created by Dimona on 15.10.14.
 */

var Form = function (id) {

    var form = $('#' + id);

    function fsuccess(element, msg) {
        element.parent().parent().removeClass('has-error has-feedback');
        element.parent().parent().addClass('has-success has-feedback');
        element.parent().parent().nextAll(".error").removeClass('error');
        element.nextAll(".error").remove();
        element.parent().parent().next().addClass('success');
        element.parent().parent().next(".success").html(msg);
        element.after('<span class="success glyphicon glyphicon-ok form-control-feedback"></span>');
    };

    function ferror(element, msg) {
        element.parent().parent().removeClass('has-success has-feedback');
        element.parent().parent().addClass('has-error has-feedback');
        element.parent().parent().nextAll(".success").removeClass('success');
        element.nextAll(".success").remove();
        element.parent().parent().next().addClass('error');
        element.parent().parent().next(".error").html(msg);
        element.after('<span class="error glyphicon glyphicon-warning-sign form-control-feedback"></span>');
    };

    $.each(form.find('input', 'select', 'textarea'), function () {
        $(this).blur(function (event) {
            var eventTarget = event.relatedTarget;
            if (eventTarget !== document.getElementById('cancel')) {

                var data = {}, el = $(this);
                data[el.attr('name')] = el.val();

                /**
                 * Ajax отправка элемента
                 */
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        if (response) {
                            response = JSON.parse(response);
                        }

                        if (Object.prototype.toString.call(response.errors) !== '[object Array]') {
                            for (var field in response.errors) {
                                ferror($('#' + field), response.errors[field]);
                            }
                        } else {
                            fsuccess($('#' + el.attr('name')), 'Correct!')
                        }
                    }
                });
            };
        });
    });
//
    form.submit(function (event) {
        event.preventDefault();
        var data = {};

        form.find('input', 'select', 'textarea').each(function(){
            data[$(this).attr('name')] = $(this).val();
        });

        /**
         * Ajax отправка элемента
         */
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: data,
            success: function (response) {
                if (response) {
                    response = JSON.parse(response);
                }
                var res = true;
                for (var field in data) {
                    if (field in response.errors) {
                        res = false;
                        ferror($('#' + field), response.errors[field]);
                    } else {
                        fsuccess($('#' + field), 'Correct!');
                    }
                }
                console.log(res);
                if (res == true) {
                    form.submit();
                }
/*
                if (Object.prototype.toString.call(response.errors) !== '[object Array]') {
                    errors = response.errors
                    for (var field in errors) {
                        ferror($('#' + field), errors[field]);
                    }
                } else {
                    form.submit();
                }
*/
            }
        });
    });

};
