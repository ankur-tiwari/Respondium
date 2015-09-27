<?php

namespace App\Services\Backup\Db\Savers;

use App\Mailers\BackupMailer;
use App\Services\Backup\Db\SaverInterface;

class Email implements SaverInterface
{
	/**
	 * @var BackupMailer
	 */
	protected $mailer;

	public function __construct(BackupMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Save the output to the file.
	 *
	 * @param  string $output
	 * @return void
	 */
	public function save($output)
	{
		$this->mailer->sendSqlOutput($output);
	}
}