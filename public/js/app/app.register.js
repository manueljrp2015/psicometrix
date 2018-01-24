$(document).ready(function() {

    var fmregister = $("#fmregister");

    fmregister.validate({
        rules: {
            _fname: {
                required: true
            },
            _lname: {
                required: true
            },
            _email: {
                required: true,
                email: true,
                remote: {
                    param: {
                        url: 'validate-mail',
                        type: 'POST',
                        data: {
                            email: function() {
                                return $("#_email").val();
                            }
                        },
                        beforeSend: function() {
                            $("#loader").empty().append(loaderCustom(50, "Verificando"));
                        },
                        complete: function() {
                            $("#loader").empty();
                        }
                    }
                }
            },
            _k1: {
                required: true,
                minlength: 8
            },
            _k2: {
                required: true,
                equalTo: "#_k1"
            }
        },
        messages: {
            _fname: {
                required: "<span class='badge badge-danger'>Requerido</span>"
            },
            _lname: {
                required: "<span class='badge badge-danger'>Requerido</span>"
            },
            _email: {
                required: "<span class='badge badge-danger'>Requerido</span>",
                email: "<span class='badge badge-danger'>Email Incorrecto</span>",
                remote: "<span class='badge badge-warning'>Este Email ya esta registrado</span>"
            },
            _k1: {
                required: "<span class='badge badge-danger'>Requerido</span>",
                minlength: "<span class='badge badge-danger'>Minimo 8 caracteres</span>"
            },
            _k2: {
                required: "<span class='badge badge-danger'>Requerido</span>",
                equalTo: "<span class='badge badge-danger'>Las claves no coinciden</span>"
            }
        },
        submitHandler: function() {

            swal({
                title: "Hola estas seguro?",
                text: $("#_fname").val() + " estas a punto de registrarte, quieres continuar?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "si, acepto",
                closeOnConfirm: true
            }, function() {
                register();
            });
        }
    });


    register = function() {
        $.ajax({
                url: 'put-register',
                type: 'POST',
                dataType: 'json',
                data: fmregister.serialize(),
                beforeSend: function() {
                    $("#loader").empty().append(loaderCustom(50, "Guardando"));
                }
            })
            .done(function(response) {
                $("#loader").empty();

                swal({
                    title: "enhorabuena!",
                    text: "te has registrado",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ok",
                    closeOnConfirm: true
                }, function() {
                    window.location.href = "welcome";
                });
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    };
});