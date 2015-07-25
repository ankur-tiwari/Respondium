<?php

namespace App\Validators;

class AllowedWebsites
{
	public function validate($attribute, $value, $parameters)
	{
		$urlDetails = parse_url($value);

		if (!isset($urlDetails['host'])) {
			return false;
		}

		$host = strtolower(parse_url($value)['host']);

		if ( ! (in_array($host, $parameters) || in_array('www.' . $host, $parameters)) ) {
			return false;
		}

		return true;
	}
}