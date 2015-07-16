<?php

namespace App\HtmlGenerators;

trait YoutubeVideoGenerator
{
	public function generateForYoutube($videoUrl)
	{
		$html = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k"></iframe></div>';

		return $html;
	}
}