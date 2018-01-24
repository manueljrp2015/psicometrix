$(document).ready(function() {

	var fmrecovery = $("#fmrecovery");

	fmrecovery.validate({
		rules:{
			_email:{
				required: true,
				email: true
			}
		},
		messages:{
			_email:{
				required: "<span class='badge badge-danger'>Requerido</span>",
                email: "<span class='badge badge-danger'>Email Incorrecto</span>",
			}
		},
		submitHandler: function(){
			recovery();
		}
	});

	recovery = function(){
		$.ajax({
			url: 'recovery-pass',
			type: 'POST',
			dataType: 'json',
			data: fmrecovery.serialize(),
			beforeSend: function(){
				$("#loader").empty().append(loaderCustom(50, ""));
			}
		})
		.done(function(response) {
			$("#loader").empty();
			if (response.data.msg == true) {
				 swal({
                    title: "enhorabuena!",
                    text: "Por estar deshabilitado el servicio de mensajeria electronica, tu nueva clave de acceso es "+ response.data.newp,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "ok",
                    closeOnConfirm: true
                }, function() {
                    window.location.href = "welcome";
                });
			}
			else if(response.data.msg == false){
				swal("Error!", "Este email no se encuantra registrado.", "error");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	};
});