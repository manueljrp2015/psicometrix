$(document).ready(function() {

    localStorage.removeItem("id");
    localStorage.removeItem("firtsname");
    localStorage.removeItem("lastname");
    localStorage.removeItem("email");


    var fmoauth = $("#oauth");

    fmoauth.validate({
        rules: {
            _email: {
                required: true
            },
            _key: {
                required: true
            }
        },
        messages: {
            _email: {
                required: "<span class='badge badge-danger'>Requerido</span>"
            },
            _key: {
                required: "<span class='badge badge-danger'>Requerido</span>"
            }
        },
        submitHandler: function() {
            oauth();
        }
    });

    oauth = function() {
        $.ajax({
                url: 'oauth-autorized',
                type: 'POST',
                dataType: 'json',
                data: {
                    _email: base64_encode($("#_email").val()),
                    _key: base64_encode($("#_key").val())
                },
                beforeSend: function() {
                    $("#loader").empty().append(loaderCustom(50, ""));
                }
            })
            .done(function(response) {
                $("#loader").empty();
                if (response.data == false) {
                    swal("Acceso Restringido!", "Los datos suministrados no son validos", "error");
                } else if (response.data == "badpass") {
                    swal("Acceso Restringido!", "tiene un error en la contraseña, por favor revise!", "warning");
                } else if (response.data.msg == true) {
                    if ($("#check").is(":checked")) {
                        if (typeof(Storage) !== "undefined") {
                            localStorage.setItem("id", response.data.session.id);
                            localStorage.setItem("firtsname", response.data.session.fname);
                            localStorage.setItem("lastname", response.data.session.lname);
                            localStorage.setItem("email", response.data.session.email);
                            window.location.href = "juguemos";
                        } else {}
                    } else {
                        window.location.href = "juguemos";
                    }
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    };

    $("#panel").click(function(event) {
        event.preventDefault();
        swal({
            title: "Acceso a Panel!",
            text: "Ingrese la llave para ingresar al panel",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Llave de acceso"
        }, function(inputValue) {
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("necesita ingresar una llave");
                return false
            }

            $.ajax({
                    url: 'access-panel-key',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _key: base64_encode(inputValue)
                    },
                })
                .done(function(data) {
                    console.log(data)
                    if (data.data == "badpass") {
                        swal("error!", "Llave incorrecta", "error");
                    }
                    else if (data.data.msg == true) {
                        window.location.href = "access-panel";
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });




        });
    });
});