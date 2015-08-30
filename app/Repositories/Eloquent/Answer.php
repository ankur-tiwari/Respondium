<?php

namespace App\Repositories\Eloquent;

use App\Answer as AnswerModel;
use App\Repositories\AnswerInterface;

class Answer implements AnswerInterface
{
	public function deleteById($id)
	{
		return AnswerModel::findOrFail($id)->delete();
	}

	public function deleteByIdIfAuthored($id, $authenticatedUserId)
	{
		$answer = AnswerModel::findOrFail($id);

		if ($answer->user_id === $authenticatedUserId) {
			return $answer->delete();
		}
	}
}