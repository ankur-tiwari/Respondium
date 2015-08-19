<?php

namespace App\Services\Backup\Db\Savers;

use App\Services\Backup\Db\SaverInterface;
use Illuminate\Contracts\Filesystem\Filesystem;

class File implements SaverInterface
{
	/**
	 * @var Filesystem
	 */
	protected $file;

	/**
	 * Construct the File implementation of SaverInterface
	 *
	 * @param Filesystem $file
	 */
	public function __construct(Filesystem $file)
	{
		$this->file = $file;
	}

	/**
	 * Save the output to the file.
	 *
	 * @param  string $output
	 * @return void
	 */
	public function save($output)
	{
		$this->file->put('db-backups/' . $this->currentDate() . '.sql', $output);
	}

	/**
	 * Get the current time and date in a specific format.
	 *
	 * @return string
	 */
	protected function currentDate()
	{
		return date('Y-m-d---H:i:s');
	}
}