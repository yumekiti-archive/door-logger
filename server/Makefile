UID := $(shell id -u)
GID := $(shell id -g)
USER := $(UID):$(GID)
dc := user=$(USER) docker-compose


.PHONY: init
init:
	$(dc) -f ./docker/docker-compose.yml up -d --build
	$(dc) -f ./docker/docker-compose.yml exec php composer install
	$(dc) -f ./docker/docker-compose.yml exec php cp .env.example .env
	$(dc) -f ./docker/docker-compose.yml exec php php artisan key:generate
	$(dc) -f ./docker/docker-compose.yml exec php php artisan migrate

.PHONY: up
up:
	$(dc) -f ./docker/docker-compose.yml up -d

.PHONY: down
down:
	$(dc) -f ./docker/docker-compose.yml down

.PHONY: rm
rm:
	$(dc) -f ./docker/docker-compose.yml down --rmi all

.PHONY: logs
logs:
	$(dc) -f ./docker/docker-compose.yml logs -f

.PHONY: shPHP
shPHP:
	$(dc) -f ./docker/docker-compose.yml exec php /bin/bash

.PHONY: shDB
shDB:
	$(dc) -f ./docker/docker-compose.yml exec db /bin/bash