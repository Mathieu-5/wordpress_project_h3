	jQuery(document).ready(function($) {
		$('.vc_ui-close-button, [data-vc-ui-element="button-close"], [data-vc-ui-element="button-save"]').click(function(){
			 tb_remove();
		});
	});

	jQuery('.load_vcmp_presets .vcmp_presets_modal').click(function(){
		setTimeout(function(){
			jQuery("#TB_ajaxWindowTitle").html(jQuery('#whoare_Title').val().replace(/_|-|\./g, ' '));
		}, 500);
	});

	function injectToPage(whatto,pathto){

		jQuery.ajax({
		  method: "POST",
		  url: ajaxurl,
		  dataType : 'json',
		  data: { action: "vcmp_presets_content", whoare: whatto, pathto: pathto }
		})
		  .done(function( msg ) {
		  	var vcmpresults = jQuery.parseJSON(msg);
			
			jQuery.each( vcmpresults.vcmpsettings, function( keys, vals ) {
				if(keys == 'content'){
					if (jQuery("#wp-wpb_tinymce_content-wrap").hasClass("tmce-active")){
				        tinyMCE.activeEditor.setContent(vals);
				    }else{
				        jQuery('#vc_ui-panel-edit-element #wpb_tinymce_content').val(vals);
				    }
				} else if(keys == 'font_container'){
					var vcmpsplitters = vals.split( '|' );
					
					for ( var vcmpsplitter in vcmpsplitters ) {
						vcmpsplitter = vcmpsplitters[ vcmpsplitter ].split( ':' );
							jQuery('.vc_font_container_form_field-' + vcmpsplitter[ 0 ] + '-container>*').val( decodeURIComponent( vcmpsplitter[ 1 ] ) );
							
					}
				} else {
					jQuery('.' + keys).val(vals);
				}
				
			   // console.log(keys);
			});
				jQuery('#vc_ui-panel-edit-element [data-vc-ui-element="button-save"]').click();
				
		  });

	}
