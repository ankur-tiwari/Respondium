<?php

namespace App\Repositories;

interface TagInterface
{
	public function getAll();

	public function getAllNames();

	public function getForQuestion($question);

	public function create($name);
}
