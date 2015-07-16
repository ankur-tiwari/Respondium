<?php

namespace App\HtmlGenerators;

class AnswerVideo
{
	public function generate($videoUrl)
	{
		if ( $this->isUrl($videoUrl) ) {
			$this->generateForOnlineVideo($videoUrl);
		} else {
			$this->generateForLocalVideo($videoUrl);
		}
	}

	private function isUrl($videoUrl)
	{
		return filter_var($videoUrl, FILTER_VALIDATE_URL);
	}

	private function generateForOnlineVideo()
	{

	}

	private function generateForLocalVideo()
	{

	}
}