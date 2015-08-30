<?php

namespace App\Repositories;

interface AnswerInterface
{
	public function deleteById($id);

	public function deleteByIdIfAuthored($id, $authenticatedUserId);
}