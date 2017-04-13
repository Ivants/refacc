	<?php

return array(
	# Account credentials from developer portal
	# Agregamos los id de donde se van a cobrar los pagos
	'Account' => array(
		'ClientId' => env('AYrrYnKnEA3KWKZR9O-UyamrEN2LPqnU97nxXtydFtc28pcpvOlonYzQVSMv8rAjM3r-l2Jj_lV_vmu4', ''),
		'ClientSecret' => env('EDxMZIwd5ARUlrno1GZB2YMWQXaWXjg8zFDRuGgf9w0EoH9ILzFnZr2yVaLlLXTENP203DO2-N1orB9S', ''),
	),

	# Connection Information
	'Http' => array(
		// 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		//'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);
