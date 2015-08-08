<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Default driver for the alerter package.
	|--------------------------------------------------------------------------
	|
	| Specify the driver you want to use for the alerter package here.
	|
	*/
	'driver' => 'bs3',

	/*
	|--------------------------------------------------------------------------
	| List of all drivers.
	|--------------------------------------------------------------------------
	|
	| All drivers with their classes.
	|
	*/
	'all' => [
		'bs3' => 'Alerter\Drivers\Bs3\Bs3',
		'toastr' => 'Alerter\Drivers\Toastr\Toastr'
	]
];