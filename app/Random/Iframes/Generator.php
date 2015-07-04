<?php

namespace App\Random\Iframes;

class Generator
{

	protected $supportedWebsites = ['Youtube', 'Vimeo', 'Dailymotion'];

	protected $supportedWebsitesUrls = ['www.youtube.com', 'www.vimeo.com', 'www.dailymotion.com'];

	protected $website;

	protected $videoUrl;

	protected $iframeSrcUrl = '';

	public function generate($website, $videoUrl)
	{
		if ($this->isSupported($website) && $this->isValid($videoUrl))
		{
			$this->website = $website;

			$this->videoUrl = $videoUrl;
		} else {
			throw new \Exception('Not a valid url!');

		}

		switch ($this->website) {

			case 'Youtube':
				$this->generateYoutubeIframe($this->videoUrl);
			break;

			case 'Vimeo':
				$this->generateVimeoIframe($this->videoUrl);
			break;

			case 'Dailymotion':
				$this->generateDailymotionIframe($this->videoUrl);
			break;

		}

		return $this;
	}

	protected function isSupported($website)
	{
		if (in_array($website, $this->supportedWebsites))
		{
			return true;
		} else {
			throw new WebsiteNotSupportedForVideoException('The website ' . $website . ' is not supported.');

			return false;
		}
	}

	protected function isValid($videoUrl)
	{
		$urlDetails = parse_url($videoUrl);

		$host = strtolower($urlDetails['host']);

		if (empty(preg_grep('/' . preg_quote($host, '/') . '/i', $this->supportedWebsitesUrls)))
		{
			return false;
		} else {
			return true;
		}

	}

	protected function generateYoutubeIframe($videoUrl)
	{
		$urlDetails = parse_url($videoUrl);

		if (!isset($urlDetails['query']))
		{
			throw new \Exception('Cannot found the specified youtube video!');
		}

		parse_str($urlDetails['query'], $query);

		if (!isset($query['v']))
		{
			throw new \Exception('Cannot found the specified youtube video!');
		}

		$this->iframeSrcUrl = sprintf('http://www.youtube.com/embed/%s', $query['v']);
	}

	protected function generateVimeoIframe($videoUrl)
	{
		$urlDetails = parse_url($videoUrl);

		$videoId = substr($urlDetails['path'], 1);

		$this->iframeSrcUrl = sprintf('https://player.vimeo.com/video/%s', $videoId);
	}

	protected function generateDailymotionIframe($videoUrl)
	{
		$iframeSrc = str_replace('video', 'embed/video', $videoUrl);

		$this->iframeSrcUrl = $iframeSrc;
	}

	public function urlOnly()
	{
		return $this->iframeSrcUrl;
	}

	public function iframeCode()
	{
		return sprintf('<iframe src="%s" frameborder="0"></iframe>', $this->iframeSrcUrl);
	}

	public function iframeCodeForBootstrap()
	{
		$template = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="%s" allowfullscreen></iframe></div>';

		return sprintf($template, $this->iframeSrcUrl);
	}

}
