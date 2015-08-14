@servers(['deploy' => 'root@lamp.droplet'])

@task('deploy', ['on' => 'deploy'])
	cd /var/www/html/
	php artisan down
	git pull
	composer update
	php artisan migrate
	php artisan migrate:testing
	php artisan up
@endtask