@servers(['deploy' => 'root@lamp.droplet'])

@task('deploy', ['on' => 'deploy'])
	cd /var/www/html/
	php artisan down
	git pull
	composer update
	php artisan up
@endtask