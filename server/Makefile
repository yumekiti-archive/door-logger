UID := $(shell id -u)
GID := $(shell id -g)
USER := $(UID):$(GID)
dc := user=$(USER) docker-compose


.PHONY: init
init:
	$(dc) -f ./docker/docker-compose.yml up -d --build && \
	$(dc) -f ./docker/docker-compose.yml exec php composer install && \
	$(dc) -f ./docker/docker-compose.yml exec php cp .env.example .env && \
	$(dc) -f ./docker/docker-compose.yml exec php php artisan key:generate && \
	$(dc) -f ./docker/docker-compose.yml exec php php artisan migrate && \
	cd ./laravel/ && \
	npm install && \
	npm run dev

.PHONY: seed
seed:
	$(dc) exec php php artisan db:seed

.PHONY: gpasswd
gpasswd:
	sudo groupadd docker && \
	sudo gpasswd -a $USER docker && \
	sudo reboot


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

.PHONY: pac
pac:
	sudo apt update && sudo apt -y upgrade &&  \
	sudo apt install docker docker.io docker-compose npm