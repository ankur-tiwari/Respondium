<?php

namespace App\Mailers;

class BackupMailer extends Mailer
{
	public function sendSqlOutput($output)
	{
		$subject = 'SQL Backup For Respondium.';

		$this->sendMePlainMessage($output, $subject);
	}
}