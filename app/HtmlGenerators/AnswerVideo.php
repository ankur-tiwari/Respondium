<?php

namespace App\HtmlGenerators;

class AnswerVideo
{
	protected $supportedHosts = [
		'www.youtube.com',
		'www.dailymotion.com',
		'www.vimeo.com'
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


	protected function generateForOnlineVideo()
	{
		$urlDetails = parse_url($this->videoUrl);

		$host = strtolower($urlDetails['host']);

		if ( $this->hostIsSupported($host) ) {
			return $this->generateFor($host);
		} else {
			throw new \Exception('Website not supported!');
		}
	}

	protected function generateFor($host)
	{
		if ($host === 'www.youtube.com' || $host === 'youtube.com') {
			return $this->generateForYoutube();
		} else if ($host === 'www.dailymotion.com' || $host === 'dailymotion.com') {
			return $this->generateForDailymotion();
		} else if ($host === 'www.vimeo.com' || $host === 'vimeo.com') {
			return $this->generateforVimeo();
		}
	}

	protected function generateForYoutube()
	{
		$urlDetails = parse_url($this->videoUrl);

		parse_str($urlDetails['query'], $queryArray);

		if ( !isset($queryArray['v']) ) {
			throw new \Exception('The video id was not found in the url!');
		}

		$videoId = $queryArray['v'];

		$youtubeIframeSrc = 'http://www.youtube.com/embed/' . $videoId;

		return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $youtubeIframeSrc  . '"></iframe></div>';
	}

	public function generateForDailymotion()
	{
		$urlDetails = parse_url($this->videoUrl);

		$dailymotionIframeSrc = 'http://www.dailymotion.com/embed' . $urlDetails['path'];

		return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $dailymotionIframeSrc . '"></iframe></div>';
	}

	public function generateforVimeo()
	{
		$urlDetails = parse_url($this->videoUrl);

		$vimeoIframeSrc = 'http://player.vimeo.com/video' . $urlDetails['path'];

		return '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $vimeoIframeSrc . '"></iframe></div>';
	}

	protected function generateForLocalVideo()
	{
		$html = '<div align="center" class="embed-responsive embed-responsive-16by9"><video class="embed-responsive-item" controls=""><source src="'. $this->videoUrl .'" type="video/mp4"></video></div>';

		return $html;
	}

	protected function hostIsSupported($host)
	{
		return in_array($host, $this->supportedHosts) || in_array('www.' . $host, $this->supportedHosts);
	}

	protected function isUrl()
	{
		return filter_var($this->videoUrl, FILTER_VALIDATE_URL);
	}
}