test:
	php artisan test
install:
	composer install
migrate:
	php artisan migrate
refresh-seed:
	php artisan migrate:refresh && php artisan db:seed
lint:
	composer phpcs
lint-fix:
	composer phpcbf
