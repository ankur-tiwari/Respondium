<?php

namespace App\Repositories;

interface TagInterface
{
	public function getAll();

	public function getForQuestion($question);
}
