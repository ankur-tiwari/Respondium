@servers(['deploy' => 'root@lamp.droplet'])

@task('deploy', ['on' => 'deploy'])
	cd /var/www/html/
	php artisan backup:db
	php artisan down
	git pull
	composer install
	php artisan up
@endtask