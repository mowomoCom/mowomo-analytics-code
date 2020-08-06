jQuery(document).ready(function() {
	
	jQuery("#generar-link").on("click", function() {
		
		jQuery.ajax({
			url: mwm_ana_admin_data.ajax_url,
			type: "post",
			data: {
				action: "mwm_get_token"
			},

			beforeSend: function() {},
			
			success: function(response) {
				// Get data
				let data = JSON.parse(response);
				console.log(data);
				jQuery("#cooler_intruder_url").html(data);
			}

	  });

	});

	jQuery("#guardar_cambios").on("click", function() {

		let mwm_ac_ID_propiedad = jQuery("#mwm_ac_ID_propiedad").val();
		
		jQuery.ajax({
			url: mwm_ana_admin_data.ajax_url,
			type: "post",
			data: {
				action: "mwm_ana_save_data",
				mwm_ac_ID_propiedad: mwm_ac_ID_propiedad
			},

			beforeSend: function() {},
			
			success: function(response) {
				// Get data
				let data = JSON.parse(response);
				jQuery("#alertas").html(data);
			}

		});

	});

});
  