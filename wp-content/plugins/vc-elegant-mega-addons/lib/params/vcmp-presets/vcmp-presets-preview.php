<?php
if ( defined( 'WPB_VC_VERSION' ) ) {

	if( ! function_exists("vcmg_presets_ajax_content") ){
		add_action( 'wp_ajax_nopriv_vcmp_presets_content', 'vcmp_presets_ajax_content' );
		add_action( 'wp_ajax_vcmp_presets_content', 'vcmp_presets_ajax_content' );
		
		function vcmp_presets_ajax_content() {
		
			if($_POST['whoare'] && $_POST['pathto']){
				$directory = 'lib/presets/'.$_POST['pathto'].'/';
				$injectsrc = file_get_contents(VCMP_PATH.$directory.$_POST['whoare'].'.php');
				echo json_encode($injectsrc);
			}
			die();
		}
	}

	if( function_exists("vc_add_shortcode_param") ){
		vc_add_shortcode_param( 'vcmp_presets', 'vcmp_presets_settings_field' );
	}
	
	if( ! function_exists("vcmp_presets_settings_field") ){
		function vcmp_presets_settings_field( $vcmpsettings, $value, $previews ) {
			add_thickbox();
			$output = '<input id="whoare" type="hidden" value="'.$vcmpsettings['value'].'">';
			$output .= '<input id="whoare_Title" type="hidden" value="'.$vcmpsettings['param_name'].'">';
			$output .= '<div id="vcmp_presets_modal" style="display:none;">';
			
				$directory = '/lib/presets/'.$vcmpsettings['value'].'/';
				$filelist = array_diff(scandir(VCMP_PATH.$directory.'previews/'), array('..', '.'));
				
				if($filelist){
					foreach($filelist as $filesto){
						 $filename = pathinfo($filesto);
						 $prettyfilename = str_replace(array('-', '_'), ' ', $filename['filename']);
						 
						 $output .= '<div align="center" class="vcmp_presets_img">
										<a href="#" onclick="injectToPage(\''.$filename['filename'].'\',\''.$vcmpsettings['value'].'\');" class="thickbox" title="'.$prettyfilename.'">
											<img src="'.VCMP_URL.$directory.'previews/'.$filesto.'" border="0" alt="'.$vcmpsettings['param_name'].'">
										</a>
										<span class="vcmp_preset_caption">'.$prettyfilename.'</span>
									</div><br>';
					}
				} else {
					$output .=  '<div align="center">'.__( "No presets found.", VCMP_SLUG ).'</div>';
				}
				
			$output .= '</div>';
			$output .= '<style>
							
						</style>';
			$output .= '<div class="load_vcmp_presets">
							<a href="#TB_inline?width=783&inlineId=vcmp_presets_modal" class="thickbox vcmp_presets_modal vc_general vc_ui-button faa-parent animated-hover"><i class="fa fa-download faa-burst animated" aria-hidden="true"></i> '.__( "Click to use Predefined Presets", VCMP_SLUG ).'</a>
							<span class="vc_description vc_clearfix">'.__( "Click to explore premade presets then select it, use your content favorite one and save your time. ", VCMP_SLUG ).'</span>
						</div>';
			return $output;
		}
		vc_add_shortcode_param('vcmp_presets', 'vcmp_presets_settings_field', VCMP_URL.'lib/params/vcmp-presets/vcmp_presets.js');
	}
}