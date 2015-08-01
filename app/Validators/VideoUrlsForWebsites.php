<?php

namespace App\Validators;

class VideoUrlsForWebsites
{
	public function validate($attribute, $value, $parameters)
	{
		foreach($parameters as $website) {
			if ( $this->isNotSupported($website) ) {
				return false;
			}

			$website = $this->getWebsiteForValue($value);

			if ( isset($this->getRegexes()[$website]) ) {
				$regex = $this->getRegexes()[$website];
			} else {
				return false;
			}

			if (preg_match($regex, $value)) {
				return true;
			} else {
				return false;
			}
		}
	}


	protected function getWebsiteForValue($url)
	{
		if ( ! filter_var($url, FILTER_VALIDATE_URL) ) {
			return false;
		}

		$urlDetails = parse_url($url);


		if (isset($urlDetails['host'])) {
			// remove www. from the beginning of the url.
			$website = preg_replace('#^www\.(.+\.)#i', '$1', $urlDetails['host']);

			return strtolower($website);
		}
	}

	protected function getRegexes()
	{
		return [
			'youtube.com' => '/^http(s)?:\/\/(www\.)?youtube\.com\/watch\?v=[A-Za-z0-9-_]{11}$/',
			'dailymotion.com' => '/^http(s)?:\/\/(www\.)?dailymotion\.com\/video\/(.)+$/',
			// https://vimeo.com/64703617
			'vimeo.com' => '/^http(s)?:\/\/(www\.)?vimeo\.com\/[0-9]+$/'
		];
	}

	protected function isNotSupported($website)
	{
 		return ! isset ($this->getRegexes()[$website]);
	}
}