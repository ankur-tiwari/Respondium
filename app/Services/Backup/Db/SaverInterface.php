<?php

namespace App\Services\Backup\Db;

interface SaverInterface
{
	/**
	 * Save the sql output to a backup.
	 *
	 * @param  string $output
	 * @return void
	 */
	public function save($output);
}