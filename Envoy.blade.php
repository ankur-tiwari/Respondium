@servers(['deploy' => 'root@lamp.droplet'])

@task('deploy', ['on' => 'deploy'])
	cd /var/www/html/
	git pull
	composer update
	php artisan migrate
	php artisan migrate:testing
@endtask