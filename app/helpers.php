<?php

function nav_item($text, $href, $current)
{
	if ($current == $text) {
		return '<li class="active"><a href="' . $href . '">' . $text . '</a></li>';
	}

	return '<li><a href="' . $href . '">' . $text . '</a></li>';
}

function gravatar($email, $size=20)
{
	return 'http://www.gravatar.com/avatar/' . md5($email) . '?s=' . $size;
}