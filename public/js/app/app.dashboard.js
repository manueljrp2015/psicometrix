$(document).ready(function() {

	$("#cl").click(function(event) {
		event.preventDefault();
		 if ($('input:checkbox:checked').length < 2) {
            swal("Oiga!", "Seleccione al menos 2 intereses!", "warning");
            return false;
        } else {
        	$.ajax({
        		url: 'save-interests',
        		type: 'POST',
        		dataType: 'json',
        		data: $("#fminterest").serialize()+"&user_id="+$("#hidden-u").val(),
        		beforeSend: function(){
        			$("#loader").empty().append(loaderCustom(50, ""));
        		}
        	})
        	.done(function(response) {
        		$("#loader").empty();
        		getInterestCommon();
        	})
        	.fail(function() {
        		console.log("error");
        	})
        	.always(function() {
        		console.log("complete");
        	});
        	
        }
	});

	getInterestCommon = function(){
		$.getJSON('get-common-interests', {id_user: $("#hidden-u").val()}, function(json, textStatus) {
			var item = "";
			var itemi= "";
				$.each(json.data, function(index, val) {
					 item += '  <a class="list-group-item list-group-item-action" href="#">'+
		                  '<div class="media">'+
		                    '<div class="media-body">'+
		                      '<strong>'+val.el+'</strong> tiene <strong>'+val.nro_intereses+'</strong> intereses en comun contigo<br>';

		                      $.each(val.intereses, function(index, value) {
		                      	  item +=  '<span class="badge badge-pill badge-success">'+value._interests+'</span>';
		                      });

		             item +=  '</div>'+
		                  '</div>'+
		                '</a>'
						});

				$(".items").empty().append(item);

				$.each(json.myinterest, function(index, val) {
					 itemi +=  '<span class="badge badge-pill badge-dark">'+val._interests+'</span>';
				});

				$(".itemsi").empty().append(itemi);
			});
	};

	getInterestCommon();

	window.setInterval(function(){
		getInterestCommon();
	},20000);

});