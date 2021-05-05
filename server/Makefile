UID := $(shell id -u)
GID := $(shell id -g)
USER := $(UID):$(GID)
dc := user=$(USER) docker-compose

.PHONY: test
test:
	make ssl
	make init
	make npm
	make seed

.PHONY: init
init:
	rm -f ./docker/laravel-echo/laravel-echo-server.lock ; \
	$(dc) -f ./docker/docker-compose.yml up -d --build && \
	sleep 10 && \
	$(dc) -f ./docker/docker-compose.yml exec php /bin/bash -c "composer install" && \
	$(dc) -f ./docker/docker-compose.yml exec php /bin/bash -c "cp .env.example .env" && \
	$(dc) -f ./docker/docker-compose.yml exec php /bin/bash -c "php artisan key:generate" && \
	$(dc) -f ./docker/docker-compose.yml exec php /bin/bash -c "php artisan migrate" && \
	make npm

.PHONY: seed
seed:
	$(dc) -f ./docker/docker-compose.yml exec php php artisan db:seed

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

.PHONY: nvm
nvm:
	bash ./docker/nvm.sh

.PHONY: nodeupdate
nodeupdate:
	bash ./docker/nodeupdate.sh

.PHONY: npm
npm:
	$(dc) -f ./docker/docker-compose.yml exec node /bin/bash -c "npm install --prefix=/mnt/laravel/" && \
	$(dc) -f ./docker/docker-compose.yml exec node /bin/bash -c "npm run dev --prefix=/mnt/laravel/"

.PHONY: ssl
ssl:
	bash ./docker/ssl.sh