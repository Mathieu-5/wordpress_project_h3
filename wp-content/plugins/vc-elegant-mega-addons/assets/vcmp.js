jQuery(document).ready(function($){
	$("#vcmp-select-all, #vcmp-select-all-bottom").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});
});