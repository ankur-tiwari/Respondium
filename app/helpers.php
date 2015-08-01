<?php

function nav_item($text, $href, $current)
{
	if ($current == $text) {
		return '<li class="active"><a href="' . $href . '">' . $text . '</a></li>';
	}

	return '<li><a href="' . $href . '">' . $text . '</a></li>';
}
