jQuery(document).ready(function($){

	var devices = ["vcmp_device_phone", "vcmp_device_tablet", "vcmp_device_desktop"];
	var device = 0;
	var interval = 2000;
	var ticker = setInterval(animate, interval);

	$('.vcmp_device_device').click(function() {
	  animate();
	  clearInterval(ticker);
	  ticker = setInterval(animate, interval);
	});

	function animate() { $('.vcmp_device_device').children().toggleClass(devices[device]).toggleClass(devices[(device+1)%devices.length]);
	  device = (device+1)%devices.length;
	}
})