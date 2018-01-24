$(document).ready(function() {
    $("#dataTable").DataTable();
    $("#dataTable2").DataTable();

    var fminte = $("#fminte");

    fminte.validate({
        rules: {
            _inter: {
                required: true
            }
        },
        messages: {
            _inter: {
                required: "<span class='badge badge-danger'>Requerido</span>"
            }
        },
        submitHandler: function() {
            saveInter();
        }
    });

    saveInter = function() {
        $.ajax({
                url: 'save-inter',
                type: 'POST',
                dataType: 'json',
                data: fminte.serialize(),
                beforeSend: function() {
                    $("#loader").empty().append(loaderCustom(50, "Guardado"));
                }
            })
            .done(function(response) {
                console.log("success");
                $("#loader").empty();
                window.location.href = window.location.href;
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    };

    deleteInterest = function(id) {

        swal({
            title: "Estas seguro?",
            text: "Luego de ejecutada la acción no podra desaserla.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "si",
            closeOnConfirm: true
        }, function() {
        	$.ajax({
        		url: 'delete-inter',
        		type: 'POST',
        		dataType: 'json',
        		data: {id: id},
        	})
        	.done(function(json) {
       
            		window.location.href = window.location.href;
            	
        	})
        	.fail(function() {
        		console.log("error");
        	})
        	.always(function() {
        		console.log("complete");
        	});
        	
           
        });

    };
});