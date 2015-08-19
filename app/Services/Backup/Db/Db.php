<?php

namespace App\Services\Backup\Db;

use Illuminate\Config\Repository as Config;
use Repository;

class Db
{
	/**
	 * @var SaverInterface
	 */
	protected $saver;

	/**
	 * Construct the Db object.
	 *
	 * @param SaverInterface $saver
	 * @param Config         $config
	 */
	public function __construct(SaverInterface $saver, Config $config)
	{
		$this->saver = $saver;

		$this->config = $config;
	}

	/**
	 * Backup the database.
	 *
	 * @return void
	 */
	public function backup()
	{
		extract($this->getDbConfiguration());

		$output = $this->getOutput(
			"mysqldump --opt --user={$username} --password={$password} {$database}"
		);

		$this->saver->save($output);
	}

	/**
	 * Get the database configuration.
	 *
	 * @return array
	 */
	protected function getDbConfiguration()
	{
		$defaultConnection = $this->config->get('database.default');
		$connectionConfiguration = $this->config->get('database.connections')[$defaultConnection];

		return [
			'username' => $connectionConfiguration['username'],
			'password' => $connectionConfiguration['password'],
			'database' => $connectionConfiguration['database'],
		];
	}

	/**
	 * Get complete output for a shell command.
	 *
	 * @param  string $command
	 * @return string
	 */
	protected function getOutput($command)
	{
		exec($command, $output);

		return implode(PHP_EOL, $output);
	}
}