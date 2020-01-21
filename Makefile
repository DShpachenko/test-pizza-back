test:
	docker-compose exec app php ./vendor/bin/phpunit -v

hosts:
	echo "100.0.28.4 pizza.local" >> /etc/hosts

up:
	docker-compose up -d nginx

down:
	docker-compose stop

exec:
	docker-compose exec app bash

init:
	@make up; docker-compose exec app php artisan migrate:fresh --seed

linter:
	docker run --rm -v "$(CURDIR)":/workdir jakzal/phpqa:1.24-alpine sh /workdir/bin/entrypoint-linter.sh
