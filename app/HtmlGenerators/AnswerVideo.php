<?php

namespace App\HtmlGenerators;

use App\HtmlGenerators\YoutubeVideoGenerator;

class AnswerVideo
{
	use YoutubeVideoGenerator;

	private $supportedHosts = [
		'youtube.com', 'vimeo.com', 'dailymotion.com'
	];

	public function generate($videoUrl)
	{
		$this->videoUrl = $videoUrl;

		if ( $this->isUrl() ) {
			return $this->generateForOnlineVideo();
		} else {
			return $this->generateForLocalVideo();
		}
	}


	private function generateForOnlineVideo()
	{
		$urlDetails = parse_url($this->videoUrl);

		$host = strtolower($urlDetails['host']);

		if ( $this->hostIsSupported($host) ) {
			return $this->generateFor($host);
		} else {
			throw new \Exception('Website not supported!');
		}
	}

	private function generateFor($host)
	{
		switch ($host) {
			case 'youtube.com':
				return $this->generateForYoutube($this->videoUrl);
			break;
		}
	}

	private function generateForLocalVideo()
	{
		$html = '<div align="center" class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" controls=""><source src="'. $this->videoUrl .'" type="video/mp4"></video></div>';

		return $html;
	}

	private function hostIsSupported($host)
	{
		return in_array($host, $this->supportedHosts);
	}

	private function isUrl()
	{
		return filter_var($this->videoUrl, FILTER_VALIDATE_URL);
	}
}