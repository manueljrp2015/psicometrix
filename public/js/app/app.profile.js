$("document").ready(function () {

    $('.select2').select2();
    var fmprofiles = $("#fmprofiles");
    var fmrenewpass = $("#fmrenewpass");

    fmprofiles.validate({
        ignore: [],
        rules: {
            _lname: {
                required: true
            },
            _fname: {
                required: true
            },
            _email: {
                required: true,
                email: true
            }
        },
        messages: {
            _lname: {
                required: '<p class="text-red">Campo Requerido</p>'
            },
            _fname: {
                required: '<p class="text-red">Campo Requerido</p>'
            },
            _email: {
                required: '<p class="text-red">Campo Requerido</p>',
                email: '<p class="text-red">Error en email</p>'
            }
        },
        submitHandler: function () {

        }
    });

    fmrenewpass.validate({
        ignore: [],
        rules: {
            _key: {
                required: true
            },
            _nkey: {
                required: true,
                minlength: 8
            },
            _rkey: {
                required: true,
                equalTo: "#_nkey"
            }
        },
        messages: {
            _key: {
                required: '<p class="text-red">Clave Requerida</p>'
            },
            _nkey: {
                required: '<p class="text-red">Clave Requerida</p>',
                minlength: '<p class="text-red">La clave de tener al menos 8 caracteres</p>'
            },
            _rkey: {
                required: '<p class="text-red">Clave Requerida</p>',
                equalTo: '<p class="text-red">Clave no coinciden</p>',
            }
        },
        submitHandler: function () {

        },
        highlight: function (element, errorClass) {
            $(element).css('border', '2px solid #FDADAF');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).css('border', '1px solid #CCC');
        }
    });
});
